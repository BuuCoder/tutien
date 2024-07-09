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
                    <li class="">
                        <a href="{{route('mine_cave')}}">
                            <img src="{{ asset('/images/components/button-linh-son.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/components/button-linh-son-active.png') }}"
                                 alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content content_practice">
                <div class="group_card garden">
                    @foreach($dataAllPot as $pot)
                        <div class="card" id="card-{{ $pot->pot_id }}">
                            <h3>{{ $pot->pot_name }}</h3>
                            <p id="countdown-{{$pot->pot_id}}" class="countdown">
                                @if($dataPortUser[$pot->pot_id]->pot_time_start == 0)
                                    00:00:00
                                @elseif(($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time())
                                    {{ date('H:i:s', ($pot->pot_growth * 3600 - (time() - $dataPortUser[$pot->pot_id]->pot_time_start))) }}
                                @else
                                    00:00:00
                                @endif
                            </p>

                            @if($dataPortUser[$pot->pot_id]->pot_time_start == 0)
                                <small>Chưa có linh dược</small>
                                <img class="chaucay" src="{{ asset('/images/garden/chau-hoa-cuong.png') }}" alt="">
                            @elseif(($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time())
                                <small>Linh dược đang phát triển</small>
                                <img class="chaucay" src="{{ asset('/images/garden/hoa-dang-phat-trien.png') }}" alt="">
                            @else
                                <small>Linh dược trưởng thành</small>
                                <img class="chaucay" src="{{ asset('/images/garden/hoa.png') }}" alt="">
                            @endif

                            <form id="grow-form-{{ $pot->pot_id }}" class="grow-form" style="{{ $dataPortUser[$pot->pot_id]->pot_time_start != 0 ? 'display:none;' : '' }}">
                                @csrf
                                <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                <button type="button" class="grow-button" data-pot-id="{{ $pot->pot_id }}">
                                    <img src="{{ asset('/images/garden/button-gieo-linh-duoc.png') }}" alt="">
                                </button>
                            </form>

                            <form id="harvest-form-{{ $pot->pot_id }}" class="harvest-form" style="{{ ($dataPortUser[$pot->pot_id]->pot_time_start == 0 || ($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time()) ? 'display:none;' : '' }}">
                                @csrf
                                <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                <button type="button" class="harvest-button" data-pot-id="{{ $pot->pot_id }}">
                                    <img src="{{ asset('/images/garden/button-thu-hoach.png') }}" alt="">
                                </button>
                            </form>

                            <input type="hidden" class="pot-growth" value="{{ $pot->pot_growth }}">
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
            const timeText = $(this).text();
            if (timeText.trim() !== '00:00:00') {
                startCountdown($(this));
            }
        });

        function startCountdown($element) {
            let timeRemaining = parseTime($element.text());

            updateCountdown($element, timeRemaining);

            const interval = setInterval(function() {
                timeRemaining--;
                updateCountdown($element, timeRemaining);

                if (timeRemaining <= 0) {
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
            const potId = $element.attr('id').split('-')[1];
            $(`#harvest-form-${potId}`).show();
            $(`#card-${potId} small`).text('Linh dược trưởng thành');
            $(`#card-${potId} .chaucay`).attr('src', '/images/garden/hoa.png');
        }

        $('.grow-button').on('click', function() {
            const potId = $(this).data('pot-id');
            const potGrowth = $(`#card-${potId} .pot-growth`).val();
            $.ajax({
                url: '/api/v1/gieo-linh-duoc',
                type: 'POST',
                data: $(`#grow-form-${potId}`).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        showToast('success', response.message);
                        $(`#grow-form-${potId}`).hide();
                        const timeGrowth = formatTime(potGrowth * 3600);
                        const $countdownElement = $(`#countdown-${potId}`);
                        $countdownElement.text(timeGrowth);
                        if (timeGrowth !== '00:00:00') {
                            startCountdown($countdownElement);
                        }
                        $(`#card-${potId} small`).text('Linh dược đang phát triển');
                        $(`#card-${potId} .chaucay`).attr('src', '/images/garden/hoa-dang-phat-trien.png');
                    } else {
                        showToast('error', response.message);
                    }
                },
                error: function() {
                    showToast('error', 'Gieo hạt không thành công');
                }
            });
        });

        $('.harvest-button').on('click', function() {
            const potId = $(this).data('pot-id');
            $.ajax({
                url: '/api/v1/thu-hoach',
                type: 'POST',
                data: $(`#harvest-form-${potId}`).serialize(),
                success: function(response) {
                    if (response.status === "success") {
                        showToast('success', response.message);
                        $(`#harvest-form-${potId}`).hide();
                        $(`#grow-form-${potId}`).show();
                        $(`#countdown-${potId}`).text('00:00:00');
                        $(`#card-${potId} small`).text('Chưa có linh dược');
                        $(`#card-${potId} .chaucay`).attr('src', '/images/garden/chau-hoa-cuong.png');
                    } else {
                        showToast('error', response.message);
                    }
                },
                error: function() {
                    showToast('error', 'Thu hoạch không thành công');
                }
            });
        });
    });

    function formatTime(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const remainingSeconds = seconds % 60;
        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
    }
</script>
</body>
</html>
