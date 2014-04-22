// "use strict";
function initIscroll() {
    myScroll = new IScroll('.wrapper', { mouseWheel: true });
}
function loadFlickr(word, $card) {
    $.ajax({
            url: 'http://www.chintown.org:9000/flickr/?query='+word
        })
        .done(function (response) {
            var $flickr = $('<ul class="flickr"></ul>');
            $.each(response.result, function(idx, obj) {
                var $img = $('<img>').attr('src', obj.src);
                $flickr.append($('<li>').addClass('item').append($img));
            });
            $card.append($flickr);
            //initIscroll();
        });
}
function loadMap(word, $card) {
    $.ajax({
            url: 'http://www.chintown.org:9000/map/?query='+word
        })
        .done(function (response) {
            $card.append($('<div class="map"></div>').append($(response.result)));
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
function init() {
    bindEvents();
    $('.card').each(function (idx, card) {
        loadResources($(card).find('.word').text(), $(card));
    });
    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});
