(function(modules) { // webpackBootstrap
    var installedModules = {};


    	function __webpack_require__(moduleId) {

        		if(installedModules[moduleId])
        			return installedModules[moduleId].exports;

        		var module = installedModules[moduleId] = {
             			exports: {},
             			id: moduleId,
             			loaded: false
             		};

         		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

         		module.loaded = true;

         		return module.exports;
    	}


     	__webpack_require__.m = modules;

     	__webpack_require__.c = installedModules;

     	__webpack_require__.p = "";

     	return __webpack_require__(0);
     })
 ([

   function(module, exports, __webpack_require__) {

        'use strict';


        var renderFriends = __webpack_require__(1);


        var renderedFriends = [];


        var search = __webpack_require__(5);


        var save = __webpack_require__(6);


        var dragManager = __webpack_require__(7);


        new Promise(function(resolve) {
            if (document.readyState === 'complete') {
                resolve();
            } else {
                window.onload = resolve;
            }
        }).then(function() {
            return new Promise(function(resolve, reject) {
                VK.init({
                    apiId: 5582471
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




        /***/ },
    /* 1 */
    /***/ function(module, exports, __webpack_require__) {

        'use strict';


        var Friend = __webpack_require__(2);


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


        /***/ },
    /* 2 */
    /***/ function(module, exports, __webpack_require__) {

        'use strict';

        var getElement = __webpack_require__(3).getElement;

        var getContainer = __webpack_require__(3).getContainer;

        var fillElement = __webpack_require__(4);


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


        /***/ },
    /* 3 */
    /***/ function(module, exports) {

        'use strict';

        var templateElement = document.querySelector('template');


        var elementToClone;

        // Если браузер не поддерживает тег 'template'
        if ('content' in templateElement) {
            elementToClone = templateElement.content.querySelector('.friends-filter__item');
        } else {
            elementToClone = templateElement.querySelector('.friends-filter__item');
        }

        var getElement = function() {
            // Клонируем шаблонный элемент
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


       },

    function(module, exports) {

        'use strict';


        var fillElement = function(element, data) {
            element.name.textContent = data.first_name;
            element.surname.textContent = data.last_name;
            var contentImage = element.avatar;
            // Добавляем фото
            var uploadImage = new Image();

            // Обработчик загрузки
            uploadImage.onload = function () {
                uploadImage.onerror = null;
                contentImage.src = data.photo_50;
            };

            // Обработчик ошибки
            uploadImage.onerror = function () {
                uploadImage.onload = null;
                contentImage.src = '';
            };

            uploadImage.src = data.photo_50;
        };

        module.exports = fillElement;

        },

     function(module, exports) {

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


        module.exports = search;

     },

     function(module, exports) {

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

         },

     function(module, exports) {

        'use strict';


        var DragManager = new function() {

            var dragObject = {};


            function onMouseDown(e) {
                if (e.which != 1)
                    return;

                var elem = e.target.closest('.friends-filter__item');
                if (!elem)
                    return;

                dragObject.elem = elem;

                dragObject.downX = e.pageX;
                dragObject.downY = e.pageY;

                return false;
            }


            function onMouseMove(e) {
                if (!dragObject.elem)
                    return;

                if (!dragObject.avatar) {
                    var moveX = e.pageX - dragObject.downX;
                    var moveY = e.pageY - dragObject.downY;

                    if (Math.abs(moveX) < 3 && Math.abs(moveY) < 3) {
                        return;
                    }


                    dragObject.avatar = createAvatar();

                    var coords = getCoords(dragObject.avatar);
                    dragObject.shiftX = dragObject.downX - coords.left;
                    dragObject.shiftY = dragObject.downY - coords.top;

                    startDrag(e);
                }

                dragObject.avatar.style.left = e.pageX - dragObject.shiftX + 'px';
                dragObject.avatar.style.top = e.pageY - dragObject.shiftY + 'px';

                return false;
            }


            function onMouseUp(e) {
                if (dragObject.avatar) {
                    finishDrag(e);
                }

                dragObject = {};
            }

            function finishDrag(e) {
                var dropElem = findDroppable(e);
                dragObject.avatar.rollback();

                if (dropElem)
                    dragObject.elem.btn.click();
            }

            function createAvatar() {
                var avatar = dragObject.elem;
                avatar.old = {
                    parent: avatar.parentNode,
                    nextSibling: avatar.nextSibling,
                    position: avatar.position || '',
                    left: avatar.left || '',
                    top: avatar.top || '',
                    zIndex: avatar.zIndex || ''
                };

                avatar.rollback = function() {
                    avatar.old.parent.insertBefore(avatar, avatar.old.nextSibling);
                    avatar.style.position = avatar.old.position;
                    avatar.style.left = avatar.old.left;
                    avatar.style.top = avatar.old.top;
                    avatar.style.zIndex = avatar.old.zIndex
                };

                return avatar;
            }

            function startDrag() {
                var avatar = dragObject.avatar;

                document.body.appendChild(avatar);
                avatar.style.zIndex = 100;
                avatar.style.position = 'absolute';
            }

            function findDroppable(event) {
                dragObject.avatar.hidden = true;

                var elem = document.elementFromPoint(event.clientX, event.clientY);

                dragObject.avatar.hidden = false;

                if (elem == null) {
                    return null;
                }

                if(dragObject.avatar.old.parent.classList.contains('friends-filter__items--selected')) {
                    return elem.closest('.friends-filter__items--all');
                } else {
                    return elem.closest('.friends-filter__items--selected');
                }

            }

            document.onmousemove = onMouseMove;
            document.onmouseup = onMouseUp;
            document.onmousedown = onMouseDown;
        };

        function getCoords(elem) {
            var box = elem.getBoundingClientRect();

            return {
                top: box.top + pageYOffset,
                left: box.left + pageXOffset
            };
        }

        module.exports = DragManager;

       }
     ]);