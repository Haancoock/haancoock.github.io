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