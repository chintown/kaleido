// "use strict";

function fix_content_full_height() {
    de.time();
    var screen = $.mobile.getScreenHeight();

    var header = $(".ui-header").hasClass("ui-header-fixed") ? $(".ui-header").outerHeight()  - 1 : $(".ui-header").outerHeight();

    var footer = $(".ui-footer").hasClass("ui-footer-fixed") ? $(".ui-footer").outerHeight() - 1 : $(".ui-footer").outerHeight();

    /* content div has padding of 1em = 16px (32px top+bottom). This step
     can be skipped by subtracting 32px from content var directly. */
    var contentCurrent = $(".ui-content").outerHeight() - $(".ui-content").height();

    var content = screen - header - footer - contentCurrent;

    $(".ui-content").height(content);
}
function override_form_position() {
    $('#page_header').find('h3').remove();
    $('#search_form').appendTo($('#page_header'));
}
// -----
function bindEvents() {
    de.time();

    $('input[type="radio"]').on('click change', function () {
        de.log('submit');
        $('#search_form').submit();
    });

    override_form_position();
}
function init() {
    bindEvents();
    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});
