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
function setup_sentences() {
    $('.sentence').css('width', $(window).width()*0.9 - 50);
}
function setup_pronunciation() {
    $('#page_header').find('h3').on('click', function () {
        var s = encodeURI($(this).text());
        var url = "http://api.ispeech.org/api/rest?speed=0&apikey=14b3d2ea838a6930a59d5f7aaaa5e8c3&action=convert&voice=usenglishfemale&format=mp3&e=audio.mp3&text=" + s;
        var $player = $('#player');
        if ($player.length === 0) {
            $player = $('<audio>').attr('id', 'player');
            $('body').append($player);
        }
        $player.attr('src', url);
        $player.get(0).play();
    });
}
function setup_tip_control() {
    $('.meaning, .tip').hide();
    $('.card_flipper').on('click', function() {

        $('.map, .flickr, .sentences').toggle();
        $('.meaning, .tip').toggle();
    });
}
function setup_answer_control() {
    $('#answer_control').prependTo($('div[data-role="footer"]'));

    var word = encodeURI($('.word').text());
    var level = parseInt(getLinkParam('level'), 10);
    var num = parseInt(getLinkParam('num'), 10);
    var sidx = parseInt(getLinkParam('sidx'), 10);
    var nextIdx = sidx;
    if (num == 2) {
        nextIdx = 0;
    } else if (sidx == (num - 1)) {
        nextIdx = 0;
    }
    var nextUrl = 'card.php?level='+level+'&num='+(num-1)+'&sidx='+nextIdx;
    var callback = function(action) {
        var url = "http://www.chintown.org/lookup/api.php?target="+action+"&level="+level+"&word="+word;
        $.ajax({
            url: url,
            success: function (response) {
                window.location.href = nextUrl;
            } ,
            error: function () {
                window.location.href = nextUrl;
            }
        });
    };
    $('#answer_good').on('click', function () {
        callback('_move');
    });
    $('#answer_bad').on('click', function () {
        callback('_reset');
    });
}
function setup_pagers() {
    $('#page_header').prepend($('#prev'));
    $('#page_header').append($('#next'));
}
function override_head() {
    $('#page_header').find('h3').text($('.word').text());
}
function init() {
    override_head();
    setup_pagers();
    setup_answer_control();
    setup_tip_control();
    setup_pronunciation();
    setup_sentences();
    bindEvents();
    $('.card').each(function (idx, card) {
        loadResources($(card).find('.word').text(), $(card));
    });
    de.time('INITIALIZATION DONE');
}
$(document).ready(function() {
    init();
});
