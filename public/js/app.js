$(document).ready(function () {
    let sr = ScrollReveal();
    sr.reveal('#top-line', {duration:1500});
    sr.reveal('#top-image', {duration:2000});
    sr.reveal('.container, footer', {duration:2500});

    bindFancybox();
    windowScroll();

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        e.preventDefault();
        let self = $(this);
        if (!window.menuScrollFlag) {
            gotoScroll(self.attr('data-scroll'));
        }
    });

    if (window.scrollAnchor) {
        window.menuScrollFlag = true;
        gotoScroll(window.scrollAnchor);
    }
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
                if ($(this).offset().top <= win.scrollTop() + 221 && scrollData) {
                    resetColorHrefsMenu();
                    $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
                }
            });

            if (windowScroll > $(window).height()) {
                onTopButton.fadeIn();
            } else onTopButton.fadeOut();
        } else {
            resetColorHrefsMenu();

            $('a[data-scroll=home]').parents('li.nav-item').addClass('active');
        }
    });
}

const resetColorHrefsMenu = () => {
    $('li.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top - 221
    }, 1500, function () {
        window.menuScrollFlag = false;
    });
}
