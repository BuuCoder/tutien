<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu tiên - Game By MajinBuu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.bundle.min.css') }}">
</head>
<body>
<button class="musicButton" title="Nhạc nền">
    <img class="open-music" src="{{ asset('images/components/open-music.png') }}" alt="Nhạc nền" title="Mở nhạc">
    <img class="off-music" src="{{ asset('images/components/off-music.png') }}" alt="Nhạc nền" title="Tắt nhạc" style="display: none;">
</button>
<img class="button_open show_button_open" width="40" height="40" src="{{ asset('images/components/button-open.png') }}"
     alt="Mở menu" title="Mở menu">
<img class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}" alt="">
<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('images/components/button-thuong-hoi.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img
                        src="{{ asset('images/components/button-thuong-hoi-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="/diem-danh-hang-ngay"><img src="{{ asset('images/components/button-tu-luyen.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-tu-luyen-active.png') }}"
                                                                 alt=""></a>
            </li>
            <li class="item_menu_game main active">
                <a href="/"><img class="main" src="{{ asset('images/components/button-chinh-dien.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main"
                                                                 src="{{ asset('images/components/button-chinh-dien-active.png') }}"
                                                                 alt=""></a>
            </li>
            @if(session()->get('user'))
                <li class="item_menu_game">
                    <a href="/tai-khoan"><img src="{{ asset('images/components/button-tai-khoan.png') }}" alt=""></a>
                    <a class="active" href="javascript:void(0)"><img class="main"
                                                                     src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                                                                     alt=""></a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-xuat" title="Đăng nhập"><img src="{{ asset('/images/components/button-dang-xuat.png') }}"
                                                                alt="Đăng xuất" title="Đăng xuất"></a>
                </li>
            @else
                <li class="item_menu_game">
                    <a href=""><img src="{{ asset('images/components/button-luan-ban.png') }}" alt=""></a>
                    <a class="active" href="javascript:void(0)"><img class="main"
                                                                     src="{{ asset('images/components/button-luan-ban-active.png') }}"
                                                                     alt=""></a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap"><img src="{{ asset('images/components/button-dang-nhap.png') }}" alt=""></a>
                </li>
            @endif
        </ul>
        <ul class="menu_game_mobile">
            <img class="button_close" width="40" height="40" src="{{ asset('images/components/button-close.png') }}" alt="">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('images/components/button-thuong-hoi.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img
                        src="{{ asset('images/components/button-thuong-hoi-active.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="/diem-danh-hang-ngay"><img src="{{ asset('images/components/button-tu-luyen.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img src="{{ asset('images/components/button-tu-luyen-active.png') }}"
                                                                 alt=""></a>
            </li>
            <li class="item_menu_game active">
                <a href="/"><img class="main" src="{{ asset('images/components/button-chinh-dien.png') }}" alt=""></a>
                <a class="active" href="javascript:void(0)"><img class="main"
                                                                 src="{{ asset('images/components/button-chinh-dien-active.png') }}"
                                                                 alt=""></a>
            </li>
            @if(session()->get('user'))
                <li class="item_menu_game">
                    <a href="/tai-khoan"><img src="{{ asset('images/components/button-tai-khoan.png') }}" alt=""></a>
                    <a class="active" href="javascript:void(0)"><img class="main"
                                                                     src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                                                                     alt=""></a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-xuat"><img src="{{ asset('images/components/button-dang-xuat.png') }}" alt=""></a>
                </li>
            @else
                <li class="item_menu_game">
                    <a href=""><img src="{{ asset('images/components/button-luan-ban.png') }}" alt=""></a>
                    <a class="active" href="javascript:void(0)"><img class="main"
                                                                     src="{{ asset('images/components/button-luan-ban-active.png') }}"
                                                                     alt=""></a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap"><img src="{{ asset('images/components/button-dang-nhap.png') }}" alt=""></a>
                </li>
            @endif
        </ul>
        {{--        <div class="main_content">--}}
        {{--            <div class="character">--}}
        {{--                <img src="{{ asset('images/character-tutien.png') }}" alt="Nhân vật Tu tiên" title="Nhân vật Tu tiên">--}}
        {{--            </div>--}}
        {{--            <div class="title">--}}
        {{--                <img src="{{ asset('images/tu-tien-gioi-2.png') }}" alt="Tu tiên giới" title="Tu tiên giới">--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="main_board">
            <div class="left" id="left">
                <div class="top" id="top">
                    <div class="card">
                        <div class="swiper swiper-coverflow">
                            <div class="swiper-button-next btn-swiper"></div>
                            <div class="swiper-button-prev btn-swiper"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-5.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary is Event Holiday Holiday Summary is
                                                    Event Holiday Holiday Summary is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-6.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary is Event Holiday Holiday Summary is
                                                    Event Holiday Holiday Summary is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-1.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary is Event Holiday Holiday Summary is
                                                    Event Holiday Holiday Summary is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-4.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary is Event Holiday Holiday Summary is
                                                    Event Holiday Holiday Summary is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-3.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary is Event Holiday Holiday Summary is
                                                    Event Holiday Holiday Summary is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom" id="bottom">
                    <div class="card">
                        <div class="swiper swiper-coverflow">
                            <div class="swiper-button-next btn-swiper"></div>
                            <div class="swiper-button-prev btn-swiper"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-6.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-1.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-4.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="swiper swiper-coverflow">
                            <div class="swiper-button-next btn-swiper"></div>
                            <div class="swiper-button-prev btn-swiper"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-1.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-2.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-3.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img src="{{ asset('/images/banner/banner-4.jpg') }}" alt="">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is Event Holiday Summary?</p>
                                                <p>What is Event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right" id="right">
                <div class="card" style="display: flex; justify-content: flex-start; align-items: flex-start;">
                    <div class="container_table_rank">
                        <div class="table_rank">
                            <table cellspacing="0" cellpadding="0">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i <= 29; $i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>
                                            <div class="user">
                                                <img src="{{ asset('/images/banner/banner-7.jpg') }}"> <span>Majinbuu Tu Tiên</span>
                                            </div>
                                        </td>
                                        <td>{{1000000 - 10223 * $i}}</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<script src="{{ asset("js/swiper.bundle.min.js") }}"></script>
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

    var swiper = new Swiper(".swiper-coverflow", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 300,
            modifier: 2,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 4000,

        },
    });

    function matchHeight() {
        const top = document.getElementById('top');
        const bottom = document.getElementById('bottom');

        const right = document.getElementById('right');

        const totalHeight = top.offsetHeight + bottom.offsetHeight;
        right.style.height = `${totalHeight}px`;
    }

    window.onload = matchHeight;
    window.onresize = matchHeight;

    setTimeout(function () {
        document.querySelector('.toast-panel').style.display = 'none';
    }, 5000)

    document.querySelector('.close').addEventListener('click', function () {
        document.querySelector('.toast-panel').style.display = 'none';
    });
</script>

</body>
</html>
