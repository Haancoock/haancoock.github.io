'use strict';

var templateElement = document.querySelector('template');
var elementToClone;

// 'template' старые браузеры
if ('content' in templateElement) {
    elementToClone = templateElement.content.querySelector('.friends-filter__item');
} else {
    elementToClone = templateElement.querySelector('.friends-filter__item');
}

var getElement = function() {
    var element = elementToClone.cloneNode(true);
    element.avatar = element.querySelector('.friends-filter__avatar');
    element.surname = element.querySelector('.friends-filter__surname');
    element.name = element.querySelector('.friends-filter__name');
    element.btn = element.querySelector('.friends-filter__btn');
    return element;
};

var getContainer = function (select) {
    var container = null;
    if(select) {
        container = document.querySelector('.friends-filter__items--selected');
    } else {
        container = document.querySelector('.friends-filter__items--all');
    }
    return container;
};

module.exports = {
    getElement: getElement,
    getContainer: getContainer
};