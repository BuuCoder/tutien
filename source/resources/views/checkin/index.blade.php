<!DOCTYPE html>
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
            <img src="{{ asset('images/background/background_phong_canh_6.jpg') }}" alt="Báo danh hằng ngày" alt="Báo danh hằng ngày">
        </div>

        <div class="container_practice">
            <div class="menu_practice">
                <ul>
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('images/components/button-bao-danh.png') }}"
                                 alt="Báo Danh" title="Báo Danh">
                            <img class="active" src="{{ asset('images/components/button-bao-danh-active.png') }}"
                                 alt="Báo Danh" title="Báo Danh">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('garden') }}">
                            <img src="{{ asset('images/components/button-duoc-vien.png') }}"
                                 alt="Dược Viên" title="Dược Viên">
                            <img class="active" src="{{ asset('images/components/button-duoc-vien-active.png') }}"
                                 alt="Dược Viên" title="Dược Viên">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mine_cave') }}">
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
            <div class="content content_checkin">
                <div class="container_checkin dark">
                    <div class="date">
                        <div class="row">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif" data-index="{{ $i }}">{{ $i }}</div>
                            @endfor
                        </div>
                        <div class="row">
                            @for($i = 6; $i <= 10; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif" data-index="{{ $i }}">{{ $i }}</div>
                            @endfor
                        </div>
                        <div class="row">
                            @for($i = 11; $i <= 15; $i++)
                                <div class="date_item @if($countCheckIn >= $i) active @endif" data-index="{{ $i }}">{{ $i }}</div>
                            @endfor
                        </div>
                        <form id="checkin-form" class="row">
                            @csrf
                            <button class="glow-on-hover" type="button" id="checkin-button">
                                <img src="{{ asset('images/components/button-bao-danh.png') }}" alt="Báo Danh" title="Báo Danh">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="remind_checkin">
                    <img src="{{ asset('images/components/han_lap_bao_danh.png') }}" alt="Hàn Lập nhắc báo danh" title="Hàn Lập nhắc báo danh">
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
    $(document).ready(function() {
        $('#checkin-button').on('click', function() {
            let $button = $(this);
            $button.attr("disabled", true);
            $.ajax({
                url: '/api/v1/diem-danh-hang-ngay',
                type: 'POST',
                data: $('#checkin-form').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        showToast('success', response.message);
                        let activeItem = $('.date_item.active').last();
                        let nextIndex = parseInt(activeItem.data('index')) + 1;

                        if (nextIndex > 15) {
                            $('.date_item').removeClass('active');
                            $('.date_item[data-index="1"]').addClass('active');
                        } else {
                            $('.date_item[data-index="' + nextIndex + '"]').addClass('active');
                        }
                    } else {
                        showToast('error', response.message);
                    }
                    $button.attr("disabled", false);
                },
                error: function() {
                    showToast('error', 'Điểm danh không thành công');
                }
            });
        });
    });
</script>
</body>
</html>

