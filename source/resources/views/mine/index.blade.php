<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body>
<style>
    body::after {
        /*background: url('/images/background/background_phong_canh_10.jpg');*/
        background-size: cover;
        background-position: center;
    }

    .content_mine {
        /*background: rgba(0, 0, 0, 0.2);*/
        height: 100%;
        min-height: 500px;
        position: relative;
        z-index: 0;
    }

    .content_mine::after {
        content: '';
        position: absolute;
        left: 0;
        height: 100%;
        width: 100%;
        background: url('/images/background/background_phong_canh_20.jpg');
        background-size: cover;
        background-position: top center;
        z-index: -1;
    }

    .content_mine {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .content_mine img {
        width: 90%;
        color: #fff;
        font-size: 40px;
    }

    .content_mine .countdown {
        font-size: 30px;
        color: #fff;
    }

    .content_mine button {
        width: 180px;
        border: none;
        outline: none;
        background: none;
        cursor: pointer;
    }

    .content_mine button img {
        width: 100%;
    }

    body::after {
        background-image: url('/images/background/background_phong_canh_20.jpg');
        background-size: cover;
    }

    @media (max-width: 1200px) {
        .content{
            width: 100%;
        }
    }


    @media (min-width: 1024px) {
        .content_mine img {
            width: 40%;
            color: #fff;
            font-size: 40px;
        }

        .content_mine button {
            width: 250px;
        }

        body::after {
            background-image: url('/images/background/background_phong_canh_16.jpg');
            background-size: cover;
        }

        .content_mine::after {
            content: '';
            position: absolute;
            left: 0;
            height: 100%;
            width: 100%;
            background: url('/images/background/background_phong_canh_16.jpg');
            background-size: cover;
            background-position: top center;
            z-index: -1;
        }
    }
</style>
<button class="musicButton" title="Nhạc nền">
    <img loading="lazy" class="open-music"
         src="{{ asset('images/components/open-music.png') }}"
         alt="Nhạc nền" title="Mở nhạc">
    <img loading="lazy" class="off-music"
         src="{{ asset('images/components/off-music.png') }}"
         alt="Nhạc nền" title="Tắt nhạc" style="display: none;">
</button>
<img loading="lazy" class="button_open show_button_open" width="40" height="40"
     src="{{ asset('images/components/button-open.png') }}"
     alt="Mở menu" title="Mở menu"
>
<img loading="lazy" class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}"
     alt="Tu Tiên Giới" title="Tu Tiên Giới">
<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href="/thuong-hoi" title="Thương Hội">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-thuong-hoi.png') }}"
                         alt="Thương Hội" title="Thương Hội">
                </a>
                <a class="active" href="javascript:void(0)" title="Thương Hội">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-thuong-hoi-active.png') }}"
                         alt="Thương Hội" title="Thương Hội">
                </a>
            </li>
            <li class="item_menu_game active">
                <a href="/bao-danh-hang-ngay" title="Tu Luyện">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-tu-luyen.png') }}"
                         alt="Tu Luyện" title="Tu Luyện">
                </a>
                <a class="active" href="javascript:void(0)" title="Tu Luyện">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-tu-luyen-active.png') }}"
                         alt="Tu Luyện" title="Tu Luyện">
                </a>
            </li>
            <li class="item_menu_game main">
                <a href="/" title="Chính Điện">
                    <img loading="lazy" class="main"
                         src="{{ asset('images/components/button-chinh-dien.png') }}"
                         alt="Chính Điện" title="Chính Điện">
                </a>
                <a class="active" href="javascript:void(0)" title="Chính Điện">
                    <img loading="lazy" class="main"
                         src="{{ asset('images/components/button-chinh-dien-active.png') }}"
                         alt="Chính Điện" title="Chính Điện">
                </a>
            </li>
            @if(session()->get('user'))
                <li class="item_menu_game">
                    <a href="/tai-khoan" title="Tài Khoản">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-tai-khoan.png') }}"
                             alt="Tài Khoản" title="Tài Khoản">
                    </a>
                    <a class="active" href="javascript:void(0)" title="Tài Khoản">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                             alt="Tài Khoản" title="Tài Khoản">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-xuat" title="Đăng xuất">
                        <img loading="lazy"
                             src="{{ asset('/images/components/button-dang-xuat.png') }}"
                             alt="Đăng xuất" title="Đăng xuất">
                    </a>
                </li>
            @else
                <li class="item_menu_game">
                    <a href="">
                        <img loading="lazy" src="{{ asset('images/components/button-luan-ban.png') }}" alt="">
                    </a>
                    <a class="active" href="javascript:void(0)">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-luan-ban-active.png') }}" alt="">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap" title="Đăng Nhập">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-dang-nhap.png') }}"
                             alt="Đăng Nhập" title="Đăng Nhập">
                    </a>
                </li>
            @endif
        </ul>
        <ul class="menu_game_mobile">
            <img loading="lazy" class="button_close" width="40" height="40"
                 src="{{ asset('images/components/button-close.png') }}"
                 alt="Đóng Menu" title="Đóng Menu"
            >
            <li class="item_menu_game">
                <a href="/thuong-hoi" title="Thương Hội">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-thuong-hoi.png') }}"
                         alt="Thương Hội" title="Thương Hội">
                </a>
                <a class="active" href="javascript:void(0)" title="Thương Hội">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-thuong-hoi-active.png') }}"
                         alt="Thương Hội" title="Thương Hội">
                </a>
            </li>
            <li class="item_menu_game active">
                <a href="/bao-danh-hang-ngay" title="Tu Luyện">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-tu-luyen.png') }}"
                         alt="Tu Luyện" title="Tu Luyện">
                </a>
                <a class="active" href="javascript:void(0)" title="Tu Luyện">
                    <img loading="lazy"
                         src="{{ asset('images/components/button-tu-luyen-active.png') }}"
                         alt="Tu Luyện" title="Tu Luyện">
                </a>
            </li>
            <li class="item_menu_game main">
                <a href="/" title="Chính Điện">
                    <img loading="lazy" class="main"
                         src="{{ asset('images/components/button-chinh-dien.png') }}"
                         alt="Chính Điện" title="Chính Điện">
                </a>
                <a class="active" href="javascript:void(0)" title="Chính Điện">
                    <img loading="lazy" class="main"
                         src="{{ asset('images/components/button-chinh-dien-active.png') }}"
                         alt="Chính Điện" title="Chính Điện">
                </a>
            </li>
            @if(session()->get('user'))
                <li class="item_menu_game">
                    <a href="/tai-khoan" title="Tài Khoản">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-tai-khoan.png') }}"
                             alt="Tài Khoản" title="Tài Khoản">
                    </a>
                    <a class="active" href="javascript:void(0)" title="Tài Khoản">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                             alt="Tài Khoản" title="Tài Khoản">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-xuat" title="Đăng xuất">
                        <img loading="lazy"
                             src="{{ asset('/images/components/button-dang-xuat.png') }}"
                             alt="Đăng xuất" title="Đăng xuất">
                    </a>
                </li>
            @else
                <li class="item_menu_game">
                    <a href="">
                        <img loading="lazy" src="{{ asset('images/components/button-luan-ban.png') }}" alt="">
                    </a>
                    <a class="active" href="javascript:void(0)">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-luan-ban-active.png') }}" alt="">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap" title="Đăng Nhập">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-dang-nhap.png') }}"
                             alt="Đăng Nhập" title="Đăng Nhập">
                    </a>
                </li>
            @endif
        </ul>
        <div class="banner_practice">
            <img src="{{ asset('images/background/background_phong_canh_6.jpg') }}" alt="Báo danh hằng ngày"
                 alt="Báo danh hằng ngày">
        </div>
            <div class="container_practice">
                <div class="menu_practice">
                    <ul>
                        <li>
                            <a href="{{ route('checkin') }}">
                                <img src="{{ asset('/images/components/button-bao-danh.png') }}" alt="">
                                <img class="active" src="{{ asset('/images/components/button-bao-danh-active.png') }}"
                                     alt="">
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('garden')}}">
                                <img src="{{ asset('/images/components/button-duoc-vien.png') }}" alt="">
                                <img class="active" src="{{ asset('/images/components/button-duoc-vien-active.png') }}"
                                     alt="">
                            </a>
                        </li>
                        <li class="active">
                            <a href="">
                                <img src="{{ asset('/images/components/button-linh-son.png') }}" alt="">
                                <img class="active" src="{{ asset('/images/components/button-linh-son-active.png') }}"
                                     alt="">
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('craft_potion')}}">
                                <img src="{{ asset('/images/components/button-luyen-dan.png') }}" alt="">
                                <img class="active" src="{{ asset('/images/components/button-luyen-dan-active.png') }}"
                                     alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content content_practice">
                    <div class="content_mine">
                        <img src="{{ asset('/images/components/khai-thac-nguyen-thach.png') }}" alt="">
                        <p id="countdown-mine" class="countdown" data-end-time="{{ time() - $time }}">
                            @if((time() - $time) >= 4 * 3600)
                                00:00:00
                            @else
                                {{ gmdate('H:i:s', 4 * 3600 - (time() - $time)) }}
                            @endif
                        </p>
                        <form id="mine-form" class="mine-form">
                            @csrf
                            <input type="hidden" value="{{ session('user')['user_id'] }}" name="userId">
                            <button type="button" id="mine-button" style="display: none;">
                                <img src="{{ asset('/images/components/button-khai-thac.png') }}" alt="Khai thác">
                            </button>
                        </form>
                    </div>
                    <div class="remind_checkin">
                        <img src="{{ asset('images/components/han_lap_bao_danh.png') }}" alt="Hàn Lập nhắc báo danh"
                             title="Hàn Lập nhắc báo danh">
                    </div>
                </div>
            </div>
    </div>
</div>

@include('layout.toast')
@include('layout.footer')

<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script src="{{ asset('js/gsap-3.9.1.min.js') }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
<script>
    $(document).ready(function () {
        const $mineButton = $('#mine-button');

        function startCountdown() {
            $element = $('#countdown-mine');
            let timeRemaining = 4 * 3600 - parseInt($element.data('end-time'));

            if (timeRemaining <= 0) {
                $mineButton.show();
                $element.text('00:00:00');
            } else {
                $mineButton.hide();
                updateCountdown($element, timeRemaining);

                const interval = setInterval(function () {
                    if (timeRemaining <= 0) {
                        clearInterval(interval);
                        $element.text('00:00:00');
                        $mineButton.show();
                    } else {
                        timeRemaining--;
                        updateCountdown($element, timeRemaining);
                    }
                }, 1000);
            }
        }

        function updateCountdown($element, timeRemaining) {
            const hours = Math.floor(timeRemaining / 3600);
            const minutes = Math.floor((timeRemaining % 3600) / 60);
            const seconds = timeRemaining % 60;
            $element.text(`${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
        }

        function performMining() {
            $.ajax({
                url: '/api/v1/khai-thac-nguyen-thach',
                type: 'POST',
                data: $('#mine-form').serialize(),
                success: function (response) {
                    if (response.status === 'success') {
                        showToast('success', response.message);
                        $('#countdown-mine').text("04:00:00").data('end-time', 0);
                        startCountdown();
                    } else {
                        showToast('error', response.message);
                    }
                },
                error: function () {
                    showToast('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
                }
            });
        }

        startCountdown();

        $mineButton.on('click', function () {
            performMining();
        });
    });
</script>
</body>
</html>
