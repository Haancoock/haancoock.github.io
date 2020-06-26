'use strict';

var searchInputAll = document.querySelector('.friends-filter__search--all');

var searchInputSelected = document.querySelector('.friends-filter__search--selected');

var search = function (data) {

    searchInputAll.addEventListener('input', function () {
        var value = searchInputAll.value;
        searchFriend(data, value, false);
    });

    searchInputSelected.addEventListener('input', function () {
        var value = searchInputSelected.value;
        searchFriend(data, value, true);
    });


    function searchFriend(data, value, selected) {
        data.forEach(function (item) {
            if(item.selected === selected) {
                if(item.data.first_name.toLowerCase().indexOf(value.toLowerCase()) !== -1
                    || item.data.last_name.toLowerCase().indexOf(value.toLowerCase()) !== -1){
                    item.element.style.display = 'block';
                } else {
                    item.element.style.display = 'none';
                }
            }
        });
    }
};

