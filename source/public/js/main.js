$(document).ready(function () {
    const $buttonOpen = $('.button_open');
    const $buttonClose = $('.button_close');
    const $menuGameMobile = $('.menu_game_mobile');
    const $musicButton = $('.musicButton');
    const $backgroundMusic = $('#backgroundMusic')[0];
    const $openMusicImg = $('.open-music');
    const $offMusicImg = $('.off-music');
    const $toastPanel = $('.toast-panel');

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

    setTimeout(function () {
        $toastPanel.hide();
    }, 5000);

    $(document).on('click', '.close', function () {
        $toastPanel.hide();
    });

    var mouse = {x: 0, y: 0};
    var $dot = $('#dot');
    var $ball = $('#ball');

    gsap.set($dot, {xPercent: -50, yPercent: -50});
    gsap.set($ball, {xPercent: -50, yPercent: -50});

    $(document).on('mousemove', function (e) {
        mouse.x = e.clientX - 60;
        mouse.y = e.clientY - 30;

        gsap.to($dot, {x: mouse.x, y: mouse.y, duration: 0.05});
        gsap.to($ball, {x: mouse.x, y: mouse.y, duration: 0.2});
    });
});
