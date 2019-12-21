// Go to Top Page & Scroll Navbar Effet
$(document).ready(function () {
    $('body').append('<button id="toTop" class="btn btn-outline-primary btn-round" title="Go to Top Page"><span class="btn-inner--icon"><i class="ni ni-bold-up"></i></span></button>');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 260) {
            $('#toTop').fadeIn();
            $('#navbar-main').addClass('scroll-navbar');
            $('ul.navbar-nav li.nav-item a.btn-outline-primary').removeClass('btn-outline-primary').addClass('btn-success')
        } else {
            $('#toTop').fadeOut();
            $('#navbar-main').removeClass('scroll-navbar');
            $('ul.navbar-nav li.nav-item a.btn-success').removeClass('btn-success').addClass('btn-outline-primary')
        }
    });
    $('#toTop').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
});

