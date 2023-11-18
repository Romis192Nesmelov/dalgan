// window.stop();
window.phoneRegExp = /^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/gi;

$(document).ready(function () {
    $.mask.definitions['n'] = "[7-8]";
    $('input[name=phone]').mask("+n(999)999-99-99");
    window.messageModal = $('#message-modal');

    // let wow = new WOW({
    //     boxClass:     'wow',
    //     animateClass: 'animated',
    //     offset:       0,
    //     mobile:       true,
    //     live:         true,
    // });
    // wow.init();

    var sr = ScrollReveal();
    sr.reveal('#top-line', {duration:1000});
    sr.reveal('#slider', {duration:2000});
    sr.reveal('.section, footer', {duration:2500});

    bindFancybox();
    windowScroll();

    if (window.toScroll) {
        setTimeout(function () {
            gotoScroll(window.toScroll)
        },1000);
    }

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        e.preventDefault();
        let self = $(this);
        if (!window.menuScrollFlag) {
            gotoScroll(self.attr('data-scroll'));
        }
    });

    $('#slider').owlCarousel(owlSettings(
        0,
        true,
        5000,
        {0: {items: 1}},
        true
    ));
});

const bindFancybox = () => {
    // Fancybox init
    $('.fancybox').fancybox({
        'autoScale': true,
        'touch': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 500,
        'speedOut': 300,
        'autoDimensions': true,
        'centerOnScroll': true
    });
}

const  windowScroll = () => {
    let onTopButton = $('#on-top-button');

    $(window).scroll(function() {
        let windowScroll = $(window).scrollTop(),
            win = $(this);

        // fixingMainMenu(windowScroll);

        window.menuScrollFlag = true;
        $('.section').each(function () {
            let scrollData = $(this).attr('data-scroll-destination');
            if (!win.scrollTop()) {
                resetColorHrefsMenu();
                window.menuScrollFlag = false;
            } else if ($(this).offset().top <= win.scrollTop() + 200 && scrollData) {
                window.menuScrollFlag = false;
                resetColorHrefsMenu();
                $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
            }
        });

        if (windowScroll > $(window).height()) {
            onTopButton.fadeIn();
        } else onTopButton.fadeOut();
    });
}

const resetColorHrefsMenu = () => {
    $('li.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top/* - (scroll === 'home' ? 0 : 72)*/
    }, 1500, 'easeInOutQuint');
}

// const fixingMainMenu = (windowScroll, firstCall) => {
//     let topLine = $('#top-line');
//
//     if (windowScroll > 55 && !parseInt(topLine.css('top')) && $(window).width() > 992) {
//         topLine.addClass('top-fix').animate({'top':0}, 'slow');
//     } else topLine.removeClass('top-fix');
// }

const owlSettings = (margin, nav, timeout, responsive, autoplay) => {
    let navButtonBlack1 = '<img src="/images/arrow_left.svg" />',
        navButtonBlack2 = '<img src="/images/arrow_right.svg" />';

    return {
        margin: margin,
        loop: autoplay,
        nav: nav,
        autoplay: autoplay,
        autoplayTimeout: timeout,
        dots: nav,
        responsive: responsive,
        navText: [navButtonBlack1, navButtonBlack2]
    }
}
