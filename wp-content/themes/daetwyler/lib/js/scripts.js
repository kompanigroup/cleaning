;(function ($, window, undefined) {    var nav = $('#menu-main-menu').superfish({});    $('.ifb-face').matchHeight(false);    $(window).load(function() {        $('.ifb-face').matchHeight(false);    });    $(window).resize(function() {        $('.ifb-face').matchHeight(false);    });    $('#menu-toggler').sidr({        name: 'sidr-main',        side: 'left',        source: '#menu-off-canvas'    });    $('.home .flip-box-wrap').each( function() {        var link = jQuery(this).find('.flip_link').children('a');        $(this).find('.ifb-back').on( 'click', function() {            console.log('clicked');            window.location = link[0].href;        } );        console.log(link); // get the pathname    } );})(jQuery, this);