'use strict';

var fillElement = function(element, data) {
    element.name.textContent = data.first_name;
    element.surname.textContent = data.last_name;
    var contentImage = element.avatar;
    var uploadImage = new Image();

    uploadImage.onload = function () {
        uploadImage.onerror = null;
        contentImage.src = data.photo_50;
    };

    uploadImage.onerror = function () {
        uploadImage.onload = null;
        contentImage.src = '';
    };

    uploadImage.src = data.photo_50;
};

module.exports = fillElement;