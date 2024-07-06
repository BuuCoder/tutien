<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body>
<style>
    /* Overlay */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        transform: translate(calc(50vw - 50%));
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 11;
    }

    /* Popup */
    .popup {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 650px;
        width: 80%;
    }

    /* Heading */
    .popup h3 {
        margin-top: 0;
        margin-bottom: 20px;
    }

    /* Buttons */
    .popup button {
        padding: 10px 20px;
        margin: 10px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .popup button:hover {
        background-color: #0056b3;
    }

    @media (min-width: 768px) {
        .popup {
            width: 80%;
        }
    }

    @media (min-width: 1024px) {
        .popup {
            width: auto;
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
            <img src="{{ asset('/images/background/background_phong_canh_7.png') }}" alt="">
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
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('/images/components/button-duoc-vien.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/components/button-duoc-vien-active.png') }}"
                                 alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content content_practice">
                <div class="group_card duoc_vien">
                    <div class="card" id="card-mine">
                        <h3>Khai thác nguyên thạch</h3>
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
                                <img src="{{ asset('/images/garden/button-thu-hoach.png') }}" alt="Khai thác">
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Overlay and Popup -->
            <div class="overlay" id="confirmationPopup" style="z-index:11">
                <div class="popup">
                    <h3>Xác nhận</h3>
                    <p id="confirmationMessage"></p>
                    <button id="confirmYes">Có</button>
                    <button id="confirmNo">Không</button>
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
        const $countdownElement = $('#countdown-mine');
        const $mineButton = $('#mine-button');
        const $confirmationPopup = $('#confirmationPopup');
        const $confirmYes = $('#confirmYes');
        const $confirmNo = $('#confirmNo');

        function startCountdown($element) {
            let timeRemaining = 4 * 3600 - parseInt($element.data('end-time'));

            if (timeRemaining <= 0) {
                $mineButton.show();
                $element.text('00:00:00');
            } else {
                $mineButton.hide();
            }

            const interval = setInterval(function () {
                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    $element.text('00:00:00');
                    $mineButton.show();
                } else {
                    updateCountdown($element, timeRemaining);
                    timeRemaining--;
                }
            }, 1000);
        }

        function updateCountdown($element, timeRemaining) {
            const hours = Math.floor(timeRemaining / 3600);
            const minutes = Math.floor((timeRemaining % 3600) / 60);
            const seconds = timeRemaining % 60;
            $element.text(`${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
        }

        function performMining() {
            showPopup('Bạn có muốn khai thác nguyên thạch không?', function () {
                $.ajax({
                    url: '/api/v1/khai-thac-nguyen-thach',
                    type: 'POST',
                    data: $('#mine-form').serialize(),
                    success: function (response) {
                        if (response.status === 'success') {
                            showToast('success', response.message);
                            // Reset the countdown timer
                            let newTimeRemaining = 4 * 3600; // 4 hours
                            $('#countdown-mine').data('end-time', Math.floor(Date.now() / 1000) + newTimeRemaining);
                            startCountdown($countdownElement);
                        } else {
                            showToast('error', response.message);
                        }
                    },
                    error: function () {
                        showToast('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
                    }
                });
            });
        }

        function showPopup(message, callback) {
            $('#confirmationMessage').text(message);
            $confirmationPopup.css('display', 'flex'); // Show the popup

            $confirmYes.off('click').on('click', function () {
                callback();
                $confirmationPopup.css('display', 'none'); // Hide the popup after confirming
            });

            $confirmNo.off('click').on('click', function () {
                $confirmationPopup.css('display', 'none'); // Hide the popup when cancelling
            });
        }

        // Start the countdown on page load
        startCountdown($countdownElement);

        // Bind the mine button click event
        $mineButton.on('click', function () {
            performMining();
        });
    });
</script>
</body>
</html>
