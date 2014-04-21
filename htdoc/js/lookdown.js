// "use strict";

// -----
function bindEvents() {
    de.time();
}
function init() {
    bindEvents();

    $('.bucket').trans3d({
        rotateX: '-40deg'
    });

    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});
