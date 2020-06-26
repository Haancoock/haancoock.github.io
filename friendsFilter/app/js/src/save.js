'use strict';

var saveButton = document.querySelector('.friends-filter__save');

var save = function (list) {

    saveButton.addEventListener('click', function () {
        saveSelectedFriends(list);
    });

    function saveSelectedFriends(list) {
        var selected = list.filter(function (item) {
            return item.selected === true;
        });
        var friendsJSON = JSON.stringify(selected, ['data', 'id'], 3);
        localStorage.setItem('friends', friendsJSON);
        alert('Сохранено!');
    }
};

module.exports = save;