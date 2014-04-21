// "use strict";

// -----
function bindEvents() {
    de.time();
    $('.headline').on('click', function() {
        $(this).find('.en, .ch').toggle();
    });

//    var pressTimer;
//    $(".headline")
//        .on('mouseup', function(){
//            clearTimeout(pressTimer);
//            return false;
//        })
//        .on('mousedown', function(){
//            var _self = this;
//            pressTimer = window.setTimeout(function() {
//                window.location.href = 'lookup.php?query='+$(_self).find('.query').text();
//            }, 2000);
//            return false;
//        });
}
function init() {
    bindEvents();
    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});