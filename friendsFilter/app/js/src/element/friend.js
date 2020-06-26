'use strict';

var getElement = require('./getElement').getElement;
var getContainer = require('./getElement').getContainer;
var fillElement = require('./fillElement');
var Friend = function (data, number, selected) {
    this.data = data;
    this.element = getElement();
    this.number = number;
    this.selected = selected || false;
    this.container = getContainer(this.selected);
    fillElement(this.element, this.data);
    this.create.call(this, this.container);
    this.element.btn.addEventListener('click', this.onClick.bind(this));
};

Friend.prototype= {
    onClick: function () {
        this.selected = !this.selected;
        this.container = getContainer(this.selected);
        this.create(this.container, this.container.children[this.number]);
    },
    create: function (container, nextSibling) {
        nextSibling = nextSibling || null;
        container.insertBefore(this.element, nextSibling);
    }
};

module.exports = Friend;