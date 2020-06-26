'use strict';

var Friend = require('./friend');

var renderFriends = function(friends) {
    var renderedFriends = [];
    var friendsJSON = localStorage.getItem('friends');
    if(friendsJSON) {
        friendsJSON = JSON.parse(friendsJSON);
        friends.forEach(function(friend, number) {
            var select = false;
            friendsJSON.forEach(function (item) {
                if(item.data.id === friend.id)
                    select = true;
            });
            renderedFriends.push(new Friend(friend, number, select));
            select = false;
        });
    } else {
        friends.forEach(function (friend, number) {
            renderedFriends.push(new Friend(friend, number));
        });
    }
    return renderedFriends;
};

module.exports = renderFriends;