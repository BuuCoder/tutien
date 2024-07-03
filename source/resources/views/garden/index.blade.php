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
                            <img class="active" src="{{ asset('/images/components/button-bao-danh-active.png') }}" alt="">
                        </a>
                    </li>
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('/images/components/button-duoc-vien.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/components/button-duoc-vien-active.png') }}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content content_practice">
                <div class="group_card duoc_vien">
                    @foreach($dataAllPot as $pot)
                        <div class="card">
                            <h3>{{ $pot->pot_name }}</h3>
                            @if($dataPortUser[$pot->pot_id]->pot_time_start == 0)
                                <p>00:00:00</p>
                                <small>Chưa có linh dược</small>
                                <img class="chaucay" src="{{ asset('/images/garden/chau-hoa-cuong.png') }}" alt="">
                                <form action="{{ route('grow') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                    <button type="submit">
                                        <img src="{{ asset('/images/garden/button-gieo-linh-duoc.png') }}" alt="">
                                    </button>
                                </form>
                            @elseif(($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time())
                                <p id="{{$pot->pot_id}}" class="countdown">{{ date('H:i:s', ($pot->pot_growth * 3600 - (time() - $dataPortUser[$pot->pot_id]->pot_time_start))) }}</p>
                                <small>Linh dược đang phát triển</small>
                                <img class="chaucay" src="{{ asset('/images/garden/hoa-dang-phat-trien.png') }}" alt="">
                                <div style="min-height: 50px"></div>
                            @else
                                <p>00:00:00</p>
                                <small>Linh dược trưởng thành</small>
                                <img class="chaucay" src="{{ asset('/images/garden/hoa.png') }}" alt="">
                                <form action="{{ route('harvest') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                    <button type="submit">
                                        <img src="{{ asset('/images/garden/button-thu-hoach.png') }}" alt="">
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
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
        const $countdownElements = $('.countdown');

        $countdownElements.each(function() {
            startCountdown($(this));
        });

        function startCountdown($element) {
            let timeRemaining = parseTime($element.text());
            console.log($element.text());

            // Cập nhật ngay lập tức
            updateCountdown($element, timeRemaining);

            const interval = setInterval(function() {
                timeRemaining--;
                updateCountdown($element, timeRemaining);

                if (timeRemaining < 0) {
                    clearInterval(interval);
                    $element.text('00:00:00');
                    performAction($element);
                }
            }, 1000);
        }

        function updateCountdown($element, timeRemaining) {
            const hours = Math.floor(timeRemaining / 3600);
            const minutes = Math.floor((timeRemaining % 3600) / 60);
            const seconds = timeRemaining % 60;
            $element.text(`${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
        }

        function parseTime(timeString) {
            const parts = timeString.split(':');
            const hours = parseInt(parts[0], 10);
            const minutes = parseInt(parts[1], 10);
            const seconds = parseInt(parts[2], 10);
            return hours * 3600 + minutes * 60 + seconds;
        }

        function performAction($element) {
            const formId = `form#form-${$element.attr('id')}`;
            const $formElement = $(formId);

            if ($formElement.length) {
                $formElement.show();
            } else {
                console.error(`Không tìm thấy form với id ${$element.attr('id')}`);
            }
        }
    });
</script>
</body>
</html>
