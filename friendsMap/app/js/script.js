function vkApi(method, options) {
    if(options.v){
        options.v = '5.95';
    }

    return new Promise((resolve, reject)=>{
        VK.api(method, options, data =>{
            if(data.error){
                reject(new Error(data.error.error_msg));
            }else{
                resolve(data.response);
            }
        });
    });
}

function vkInit(){
    return new Promise((resolve, reject) =>{
        VK.init({
            apiId:7005128
        });

        VK.Auth.login( data => {
            if(data.session){
                resolve();
            } else{
                reject(new Error('cant Auth'));
            }
        }, 2);
    });
}

function geocode(address){
    return ymaps.geocode(address).then(result =>{
        const points = result.geoObjects.toArray();

        if(points.length){
            return points[0].geometry.getCoordinates();
        }
    });
}

let myMap;
let clusterer;


new Promise(resolve => ymaps.ready(resolve))
    .then(()=> vkInit())
    .then(()=> vkApi('friends.get', {fields: 'city, country', v: '5.95'}))
    .then(friends =>{
        myMap = new ymaps.Map('map',{
            center: [55.76, 37.64],
            zoom: 5
        },{
            searchControlProvider: 'yandex#search'
        });
        clusterer = new ymaps.Clusterer({
            preset: 'islands#inverted#VioletClusterIcons',
            clusterDisableClickZoom: true,
            openBalloonOnClick: false
        });

        myMap.geoObjects.add(clusterer);
        console.log(friends.items);
        return friends.items;
    })
    .then(friends =>{
        const promises = friends
            .filter(friend => friend.country && friend.country.title)
            .map(friend =>{
                let parts = friend.country.title;

                if(friend.city){
                    parts += '' + friend.city.title;
                }

                return parts;
            })
            .map(string => geocode(string));
        return Promise.all(promises);
    })
    .then(coords =>{
        const placemarks = coords.map(coord =>{
            return new ymaps.Placemark(coord, {}, {preset: 'islands#blueHomeCircleIcon'})
        });

        clusterer.add(placemarks);
    })
    .catch(e => alert('error' + e.message));