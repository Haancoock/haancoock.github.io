'use strict';

var renderFriends = require('./element/renderFriends');

var renderedFriends = [];

var search = require('./search');

var save = require('./save');

var dragManager = require('./dragManager');


new Promise(function(resolve) {
    if (document.readyState === 'complete') {
        resolve();
    } else {
        window.onload = resolve;
    }
}).then(function() {
    return new Promise(function(resolve, reject) {
        VK.init({
            apiId: 7005128
        });

        VK.Auth.login(function(response) {
            if (response.session) {
                resolve(response);
            } else {
                reject(new Error('Не удалось авторизоваться'));
            }
        }, 2);
    });
}).then(function() {
    return new Promise(function (resolve, reject) {
        VK.api('friends.get', {'fields': 'photo_50', 'v': '5.53'}, function (response) {
            if (response.error) {
                reject(new Error(response.error.error_msg));
            } else {
                resolve(response);
            }
        });
    })
}).then(function (response) {
    var friends = response.response.items;
    renderedFriends = renderFriends(friends);

    search(renderedFriends);

    save(renderedFriends);

    dragManager();

}, function() {
    alert('Ошибка!')
});
