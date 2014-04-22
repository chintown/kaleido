// "use strict";
function loadFlickr(word, $card) {
    $.ajax({
            url: 'http://www.chintown.org:9000/flickr/?query='+word
        })
        .done(function (response) {
            var $flickr = $('.flickr');
            $.each(response.result, function(idx, obj) {
                var $img = $('<img>').attr('src', obj.src);
                $flickr.append($('<li>').addClass('item').append($img));
            });
        });
}
function loadMap(word, $card) {
    $.ajax({
            url: 'http://www.chintown.org:9000/map/?query='+word
        })
        .done(function (response) {
            $('.map').append($(response.result));
        });
}
// -----
function loadResources(word, $card) {
    de.time('load', word, $card);
    loadFlickr(word, $card);
    loadMap(word, $card);
}
function bindEvents() {
    de.time();
}
function override_head() {
    $('#page_header').find('h3').text($('.word').text());
}
function init() {
    override_head()
    bindEvents();
    $('.card').each(function (idx, card) {
        loadResources($(card).find('.word').text(), $(card));
    });
    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});
