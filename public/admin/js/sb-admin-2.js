(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        };

        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

})(jQuery); // End of use strict

function IT_eqpt_waited_check_update_notpass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/IT_eqpt/upload_progress',
        type: 'POST',
        data: { "id": id, "value": "-1" },
        success: function () {
            alert("已移除該資料！");
            window.location.reload();
        }
    });
}

function IT_eqpt_waited_check_update_pass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/IT_eqpt/upload_progress',
        type: 'POST',
        data: { "id": id, "value": "+1" },
        success: function () {
            alert("已通過該筆資料！");
            window.location.reload();
        }
    });
}


function FindVolunteer_waited_check_update_notpass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/FindVolunteer/upload_progress',
        type: 'POST',
        data: { "id": id, "value": "-1" },
        success: function () {
            alert("已移除該資料！");
            window.location.reload();
        }
    });
}

function FindVolunteer_waited_check_update_pass(id) {
    let para = id.split('/');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/FindVolunteer/upload_progress',
        type: 'POST',
        data: { "id": para[0], "value": para[1] },
        success: function () {
            alert("已通過該筆資料！");
            window.location.reload();
        }
    });
}

function BeVolunteer_waited_check_update_notpass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/BeVolunteer/upload_level',
        type: 'POST',
        data: { "id": id, "value": "-1" },
        success: function () {
            alert("已移除該資料！");
            window.location.reload();
        }
    });
}

function BeVolunteer_waited_check_update_pass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/BeVolunteer/upload_level',
        type: 'POST',
        data: { "id": id, "value": "1" },
        success: function () {
            alert("已通過該筆資料！");
            window.location.reload();
        }
    });
}

function BeVolunteer_levelup_update_notpass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/BeVolunteer/upload_level',
        type: 'POST',
        data: { "id": id, "value": "-1" },
        success: function () {
            alert("已移除該資料！");
            window.location.reload();
        }
    });
}

function BeVolunteer_levelup_update_pass(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/BeVolunteer/upload_level',
        type: 'POST',
        data: { "id": id, "value": "2" },
        success: function () {
            alert("已通過該筆資料！");
            window.location.reload();
        }
    });
}

function resign_volunteer(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/BeVolunteer/resign',
        type: 'POST',
        data: { "id": id },
        success: function () {
            alert("已刪除該筆資料！");
            window.location.reload();
        }
    });
}
