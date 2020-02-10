$(function () {
    let menu = $('.wrapper-menu');
    let height = menu.height() + menu.offset().top;

    $(window).scroll(function () {
        let top = $(document).scrollTop();
        if (top > height) {
            menu.addClass('fixed');
        } else {
            menu.removeClass('fixed');
        }
    })
});