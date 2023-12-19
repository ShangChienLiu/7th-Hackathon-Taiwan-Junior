/*
    Landed by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#header');
        if (!navbarCollapsible) {
            return;
        }
        // 最上面
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
            document.getElementById('header').style.backgroundColor = "transparent";
            var t = document.getElementById('header');
            t = t.getElementsByTagName('a');
            for (var i = 0; i < t.length; i++) {
                t[i].style.color = "white";
            }

            var tt = document.getElementById('header');
            // tt = tt.getElementsByTagName('a');
            tt = tt.getElementsByClassName('primary');
            // console.log(tt[0]);
            // tt[0].style:hover.color = "white";
            console.log(tt[0].style);
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
            document.getElementById('header').style.backgroundColor = "white";
            var t = document.getElementById('header');
            t = t.getElementsByTagName('a');
            for (var i = 0; i < t.length; i++) {
                t[i].style.color = "black";
            }
        }
    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#header');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#header',
            offset: 72,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

function myFraction() {
    // console.log(document.getElementById('born').value);

    if (document.getElementById('born').value != "") {
        var today = new Date();
        var birthDate = new Date(Date.parse(document.getElementById('born').value));
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        console.log(age);
        if (age < 18) {
            document.getElementById('parent_name').style.display = '';
            document.getElementById('parent_phone').style.display = '';
            document.getElementById('parent_relation').style.display = '';
        } else {
            document.getElementById('parent_name').style.display = 'none';
            document.getElementById('parent_phone').style.display = 'none';
            document.getElementById('parent_relation').style.display = 'none';
        }
    }
}


(function ($) {

    var $window = $(window),
        $body = $('body');

    // Breakpoints.
    breakpoints({
        xlarge: ['1281px', '1680px'],
        large: ['981px', '1280px'],
        medium: ['737px', '980px'],
        small: ['481px', '736px'],
        xsmall: [null, '480px']
    });

    // Play initial animations on page load.
    $window.on('load', function () {
        window.setTimeout(function () {
            $body.removeClass('is-preload');
        }, 100);
    });

    // Touch mode.
    if (browser.mobile)
        $body.addClass('is-touch');

    // Scrolly links.
    $('.scrolly').scrolly({
        speed: 2000
    });

    // Dropdowns.
    $('#nav > ul').dropotron({
        alignment: 'right',
        hideDelay: 350
    });

    // Nav.

    // Title Bar.
    $(
        '<div id="titleBar">' +
        '<a href="#navPanel" class="toggle"></a>' +
        '<span class="title">' + $('#logo').html() + '</span>' +
        '</div>'
    )
        .appendTo($body);

    // Panel.
    $(
        '<div id="navPanel">' +
        '<nav>' +
        $('#nav').navList() +
        '</nav>' +
        '</div>'
    )
        .appendTo($body)
        .panel({
            delay: 500,
            hideOnClick: true,
            hideOnSwipe: true,
            resetScroll: true,
            resetForms: true,
            side: 'left',
            target: $body,
            visibleClass: 'navPanel-visible'
        });

    // Parallax.
    // Disabled on IE (choppy scrolling) and mobile platforms (poor performance).
    if (browser.name == 'ie'
        || browser.mobile) {

        $.fn._parallax = function () {

            return $(this);

        };

    }
    else {

        $.fn._parallax = function () {

            $(this).each(function () {

                var $this = $(this),
                    on, off;

                on = function () {

                    $this
                        .css('background-position', 'center 0px');

                    $window
                        .on('scroll._parallax', function () {

                            var pos = parseInt($window.scrollTop()) - parseInt($this.position().top);

                            $this.css('background-position', 'center ' + (pos * -0.15) + 'px');

                        });

                };

                off = function () {

                    $this
                        .css('background-position', '');

                    $window
                        .off('scroll._parallax');

                };

                breakpoints.on('<=medium', off);
                breakpoints.on('>medium', on);

            });

            return $(this);

        };

        $window
            .on('load resize', function () {
                $window.trigger('scroll');
            });

    }

    // Spotlights.
    var $spotlights = $('.spotlight');

    $spotlights
        ._parallax()
        .each(function () {

            var $this = $(this),
                on, off;

            on = function () {

                var top, bottom, mode;

                // Use main <img>'s src as this spotlight's background.
                $this.css('background-image', 'url("' + $this.find('.image.main > img').attr('src') + '")');

                // Side-specific scrollex tweaks.
                if ($this.hasClass('top')) {

                    mode = 'top';
                    top = '-20%';
                    bottom = 0;

                }
                else if ($this.hasClass('bottom')) {

                    mode = 'bottom-only';
                    top = 0;
                    bottom = '20%';

                }
                else {

                    mode = 'middle';
                    top = 0;
                    bottom = 0;

                }

                // Add scrollex.
                $this.scrollex({
                    mode: mode,
                    top: top,
                    bottom: bottom,
                    initialize: function (t) { $this.addClass('inactive'); },
                    terminate: function (t) { $this.removeClass('inactive'); },
                    enter: function (t) { $this.removeClass('inactive'); },

                    // Uncomment the line below to "rewind" when this spotlight scrolls out of view.

                    //leave:	function(t) { $this.addClass('inactive'); },

                });

            };

            off = function () {

                // Clear spotlight's background.
                $this.css('background-image', '');

                // Remove scrollex.
                $this.unscrollex();

            };

            breakpoints.on('<=medium', off);
            breakpoints.on('>medium', on);

        });

    // Wrappers.
    var $wrappers = $('.wrapper');

    $wrappers
        .each(function () {

            var $this = $(this),
                on, off;

            on = function () {

                $this.scrollex({
                    top: 250,
                    bottom: 0,
                    initialize: function (t) { $this.addClass('inactive'); },
                    terminate: function (t) { $this.removeClass('inactive'); },
                    enter: function (t) { $this.removeClass('inactive'); },

                    // Uncomment the line below to "rewind" when this wrapper scrolls out of view.

                    //leave:	function(t) { $this.addClass('inactive'); },

                });

            };

            off = function () {
                $this.unscrollex();
            };

            breakpoints.on('<=medium', off);
            breakpoints.on('>medium', on);

        });

    // Banner.
    var $banner = $('#banner');

    $banner
        ._parallax();

})(jQuery);
