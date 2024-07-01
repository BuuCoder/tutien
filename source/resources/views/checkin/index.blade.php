<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu tiên - Game By MajinBuu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
</head>
<img class="button_open show_button_open" width="40" height="40" src="{{ asset('images/components/button-open.png') }}" alt="">
<button class="musicButton" title="Nhạc nền">
    <img class="open-music" src="{{ asset('images/components/open-music.png') }}" alt="Nhạc nền" title="Mở nhạc">
    <img class="off-music" src="{{ asset('images/components/off-music.png') }}" alt="Nhạc nền" title="Tắt nhạc" style="display: none;">
</button>
<img class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}" alt="">
<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('images/components/button-thuong-hoi.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-thuong-hoi-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game active">
                <a href="/diem-danh-hang-ngay"><img src="{{ asset('images/components/button-tu-luyen.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-tu-luyen-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game main">
                <a href="/"><img class="main" src="{{ asset('images/components/button-chinh-dien.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-chinh-dien-active.png') }}" alt=""></a>
            </li>
{{--            <li class="item_menu_game">--}}
{{--                <a href=""><img src="{{ asset('images/components/button-luan-ban.png') }}" alt=""></a>--}}
{{--                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-luan-ban-active.png') }}" alt=""></a>--}}
{{--            </li>--}}
            <li class="item_menu_game">
                <a href="/tai-khoan"><img src="{{ asset('images/components/button-tai-khoan.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-tai-khoan-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="/dang-xuat" title="Đăng nhập"><img src="{{ asset('/images/components/button-dang-xuat.png') }}" alt="Đăng xuất" title="Đăng xuất"></a>
            </li>
        </ul>
        <ul class="menu_game_mobile">
            <img class="button_close" width="40" height="40" src="{{ asset('images/components/button-close.png') }}" alt="">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('images/components/button-thuong-hoi.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-thuong-hoi-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game active">
                <a href="/diem-danh-hang-ngay"><img src="{{ asset('images/components/button-tu-luyen.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-tu-luyen-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="/"><img class="main" src="{{ asset('images/components/button-chinh-dien.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-chinh-dien-active.png') }}" alt=""></a>
            </li>
{{--            <li class="item_menu_game">--}}
{{--                <a href=""><img src="{{ asset('images/components/button-luan-ban.png') }}" alt=""></a>--}}
{{--                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-luan-ban-active.png') }}" alt=""></a>--}}
{{--            </li>--}}
            <li class="item_menu_game">
                <a href="/tai-khoan"><img src="{{ asset('images/components/button-tai-khoan.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main" src="{{ asset('images/components/button-tai-khoan-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="/dang-xuat" title="Đăng nhập"><img src="{{ asset('/images/components/button-dang-xuat.png') }}" alt="Đăng xuất" title="Đăng xuất"></a>
            </li>
        </ul>

        <div class="banner_tuluyen">
            <img src="{{ asset('images/background/background_phong_canh_6.jpg') }}" alt="">
        </div>

        <div class="container_tuluyen">
            <div class="menu_tuluyen">
                <ul>
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('images/components/button-bao-danh.png') }}" alt="">
                            <img class="active" src="{{ asset('images/components/button-bao-danh-active.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('garden') }}">
                            <img src="{{ asset('images/components/button-duoc-vien.png') }}" alt="">
                            <img class="active" src="{{ asset('images/components/button-duoc-vien-active.png') }}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content content_bao_danh">
                <div class="container_baodanh dark">
                    <div class="date">
                        <div class="row">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif">{{ $i }}</div>
                            @endfor
                        </div>
                        <div class="row">
                            @for($i = 6; $i <= 10; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif">{{ $i }}</div>
                            @endfor
                        </div>
                        <div class="row">
                            @for($i = 11; $i <= 15; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif">{{ $i }}</div>
                            @endfor
                        </div>
                        <form class="row" action="{{ route('checkin') }}" method="POST">
                            @csrf
                            <button class="glow-on-hover" type="submit">
                                <img src="{{ asset('images/components/button-bao-danh.png') }}" alt="">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="nhacbaodanh">
                    <img src="{{ asset('images/components/han_lap_bao_danh.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast-panel">
    @if (session('success'))
        <div class="toast-item success">
            <div class="toast success">
                <label for="t-success" class="close"></label>
                <h3>Thành công!</h3>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="toast-item error">
            <div class="toast error">
                <label for="t-error" class="close"></label>
                <h3>Lỗi!</h3>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif
</div>
<div class="footer">
    <img src="{{ asset('images/components/tu-tien-gioi-3.png') }}" alt="">
    <p>Được tạo bởi Majinbuu &copy; Copy right 2024 </p>
    <p>Chúc các bạn tham gia chơi vui vẻ nhé!</p>
</div>
<audio id="backgroundMusic" loop>
    <source src="{{ asset('audio/batpham.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<script>
    // Lấy các phần tử button_open và button_close
    const buttonOpen = document.querySelector('.button_open');
    const buttonClose = document.querySelector('.button_close');
    const menuGameMobile = document.querySelector('.menu_game_mobile');

    // Xử lý sự kiện khi click vào button_open
    buttonOpen.addEventListener('click', function () {
        menuGameMobile.classList.add('show_menu_mobile'); // Thêm class show_menu_mobile
        buttonOpen.classList.remove('show_button_open'); // Thêm class show_menu_mobile
    });

    // Xử lý sự kiện khi click vào button_close
    buttonClose.addEventListener('click', function () {
        menuGameMobile.classList.remove('show_menu_mobile'); // Xóa class show_menu_mobile
        buttonOpen.classList.add('show_button_open'); // Thêm class show_menu_mobile
    });

    const musicButton = document.querySelector('.musicButton');
    const backgroundMusic = document.getElementById('backgroundMusic');
    const openMusicImg = document.querySelector('.open-music');
    const offMusicImg = document.querySelector('.off-music');

    // Xử lý sự kiện khi người dùng bấm vào nút nhạc nền
    musicButton.addEventListener('click', function () {
        if (backgroundMusic.paused) {
            backgroundMusic.play();
            openMusicImg.style.display = 'none';
            offMusicImg.style.display = 'block';
        } else {
            backgroundMusic.pause();
            openMusicImg.style.display = 'block';
            offMusicImg.style.display = 'none';
        }
    });

    setTimeout(function () {
        document.querySelector('.toast-panel').style.display = 'none';
    },3000)

    document.querySelector('.close').addEventListener('click', function () {
        document.querySelector('.toast-panel').style.display = 'none';
    });
</script>
</body>
</html>

