$(document).ready(function () {
    const $buttonOpen = $('.button_open');
    const $buttonClose = $('.button_close');
    const $menuGameMobile = $('.menu_game_mobile');
    const $musicButton = $('.musicButton');
    const $backgroundMusic = $('#backgroundMusic')[0];
    const $openMusicImg = $('.open-music');
    const $offMusicImg = $('.off-music');

    $buttonOpen.on('click', function () {
        $menuGameMobile.addClass('show_menu_mobile');
        $buttonOpen.removeClass('show_button_open');
    });

    $buttonClose.on('click', function () {
        $menuGameMobile.removeClass('show_menu_mobile');
        $buttonOpen.addClass('show_button_open');
    });

    $musicButton.on('click', function () {
        if ($backgroundMusic.paused) {
            $backgroundMusic.play();
            $openMusicImg.hide();
            $offMusicImg.show();
        } else {
            $backgroundMusic.pause();
            $openMusicImg.show();
            $offMusicImg.hide();
        }
    });

    var mouse = {x: 0, y: 0};
    var $dot = $('#dot');
    var $ball = $('#ball');

    gsap.set($dot, {xPercent: -50, yPercent: -50});
    gsap.set($ball, {xPercent: -50, yPercent: -50});

    $(document).on('mousemove', function (e) {
        mouse.x = e.clientX;
        mouse.y = e.clientY - 10;

        gsap.to($dot, {x: mouse.x, y: mouse.y, duration: 0.05});
        gsap.to($ball, {x: mouse.x, y: mouse.y, duration: 0.02});
    });

    window.showToast = function(type, message) {
        let toastHtml = `<div class="toast-item ${type}">
            <div class="toast ${type}">
                <label for="t-${type}" class="close"></label>
                <h3>${type === 'success' ? 'Thành công!' : 'Không thành công!'}</h3>
                <p>${message}</p>
            </div>
        </div>`;

        let $toast = $(toastHtml);
        $('.toast-panel').append($toast);
        $toast.find('.toast').fadeIn();

        setTimeout(() => {
            $toast.fadeOut(() => {
                $toast.remove();
            });
        }, 3000);

        $toast.find('.close').on('click', function() {
            $toast.fadeOut(() => {
                $toast.remove();
            });
        });
    }

    if ($('.toast-panel .toast-item').length > 0) {
        setTimeout(() => {
            $('.toast-panel .toast-item').fadeOut(() => {
                $(this).remove();
            });
        }, 3000);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var menu = document.querySelector('.menu_practice ul');
    menu.scrollLeft = 0; // Đặt vị trí cuộn ban đầu
});
