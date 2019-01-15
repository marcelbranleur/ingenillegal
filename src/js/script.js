$(document).ready(function() {
    $('#menu-toggle, #menu > ul > li > a').click(function(e) {
        var $toggle = $(this);
        var $menu = $('#' + $(this).attr('aria-controls'));

        if ($menu.attr('aria-hidden') == 'true') {
            $('body').addClass('open');
            $menu.attr('aria-hidden', 'false');
            $toggle.attr('aria-expanded', 'true');

        }
        else if ($menu.attr('aria-hidden') == 'false') {
            $('body').removeClass('open');
            $menu.attr('aria-hidden', 'true');
            $toggle.attr('aria-expanded', 'faremove');
        }
    });

    $('#close, #menu > ul > li > a').click(function(e) {
        var $toggle = $(this);
        var $menu = $('#menu');


         if ($menu.attr('aria-hidden') == 'false') {
            $('body').removeClass('open');
            $menu.attr('aria-hidden', 'true');
            $toggle.attr('aria-expanded', 'faremove');
        }
    });

});

$(document).ready(function() {
    $('#lang-toggle, #lang > ul > li > a').click(function(e) {
        var $toggleLang = $(this);
        var $lang = $('#' + $(this).attr('aria-controls'));

        if ($lang.attr('aria-hidden') == 'true') {
            $('body').addClass('open-lang');
            $lang.attr('aria-hidden', 'false');
            $toggleLang.attr('aria-expanded', 'true');

        }
        else if ($lang.attr('aria-hidden') == 'false') {
            $('body').removeClass('open-lang');
            $lang.attr('aria-hidden', 'true');
            $toggleLang.attr('aria-expanded', 'faremove');
        }
    });

    $('#close-lang, #lang > ul > li > a').click(function(e) {
        var $toggleLang = $(this);
        var $lang = $('#lang');


         if ($lang.attr('aria-hidden') == 'false') {
            $('body').removeClass('open-lang');
            $lang.attr('aria-hidden', 'true');
            $toggleLang.attr('aria-expanded', 'faremove');
        }
    });

});

// lang

