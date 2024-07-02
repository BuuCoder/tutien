<!doctype html>
<html lang="en">
@include('layout.header')
<body>
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
<img loading="lazy" class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}" alt="Tu Tiên Giới"
     title="Tu Tiên Giới">
<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href="" title="Thương Hội">
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
            <li class="item_menu_game">
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
            <li class="item_menu_game main active">
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
                <a href="" title="Thương Hội">
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
            <li class="item_menu_game">
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
            <li class="item_menu_game main active">
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
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-5.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary is event Holiday Summary is
                                                    event Holiday Summary is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-6.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary is event Holiday Summary is
                                                    event Holiday Summary is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-1.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary is event Holiday Summary is
                                                    event Holiday Summary is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-4.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary is event Holiday Summary is
                                                    event Holiday Summary is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-3.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SUMMARY</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary is event Holiday Summary is
                                                    event Holiday Summary is event Holiday Summary</p>
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
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-6.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-1.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-4.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
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
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-1.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-2.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-3.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card_item">
                                            <img loading="lazy" src="{{ asset('/images/banner/banner-4.jpg') }}"
                                                 alt="EVENT HOLIDAY SUMMARY" title="EVENT HOLIDAY SUMMARY">
                                            <div class="content">
                                                <h3>EVENT HOLIDAY SPRING</h3>
                                                <p>What is event Holiday Summary?</p>
                                                <p>What is event Holiday Summary</p>
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
                                                <img loading="lazy"
                                                     src="{{ asset('/images/banner/banner-7.jpg') }}"
                                                     alt="Majinbuu Tu Tiên" title="Majinbuu Tu Tiên">
                                                <span>Majinbuu Tu Tiên</span>
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
@include('layout.toast')
@include('layout.footer')


<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script src="{{ asset('js/gsap-3.9.1.min.js') }}"></script>
<script src="{{ asset("js/swiper.bundle.min.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>

<script>
    $(document).ready(function () {
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
            const $top = $('#top');
            const $bottom = $('#bottom');
            const $right = $('#right');

            const totalHeight = $top.outerHeight() + $bottom.outerHeight();

            $right.css('height', `${totalHeight}px`);
        }

        $(window).on('load', matchHeight);
        $(window).on('resize', matchHeight);
    });
</script>

</body>
</html>
