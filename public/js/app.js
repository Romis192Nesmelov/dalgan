// window.stop();
window.phoneRegExp = /^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/gi;

$(document).ready(function () {
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

        if (win.scrollTop()) {
            window.menuScrollFlag = true;
            $('.section').each(function () {
                let scrollData = $(this).attr('data-scroll-destination');
                if ($(this).offset().top <= win.scrollTop() + 71 && scrollData) {
                    window.menuScrollFlag = false;
                    resetColorHrefsMenu();
                    $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
                }
            });

            if (windowScroll > $(window).height()) {
                onTopButton.fadeIn();
            } else onTopButton.fadeOut();
        } else {
            resetColorHrefsMenu();
            window.menuScrollFlag = false;
            $('a[data-scroll=home]').parents('li.nav-item').addClass('active');
        }
    });
}

const resetColorHrefsMenu = () => {
    $('li.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top - 71
    }, 1500, 'easeInOutQuint');
}
