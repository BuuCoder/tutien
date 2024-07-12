<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<style>

    body::after {
        background-image: url('/images/background/background_phong_canh_17.jpg');
        background-size: cover;
    }

    .content{
        min-height: 750px;
    }

    .furnace_container {
        width: 100%;
        height: fit-content;
        display: flex;
        flex-wrap: wrap;
        min-height: 500px;
        justify-content: space-around;
        padding: 20px 0;
        background: url('/images/background/background_phong_canh_17.jpg');
        background-size: cover;
        background-position: center center;
    }

    .furnace {
        background: rgba(0, 0, 0, 0.4);
        width: 30%;
        margin-bottom: 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        color: white;
        padding: 10px 20px;
        font-family: "Great Vibes", cursive;
        gap: 10px;
        border-radius: 10px;
    }

    .furnace p {
        font-size: 18px;
    }

    .furnace .countdown {
        font-size: 25px;
        font-family: "Bebas Neue", sans-serif;
        color: #00fb7e;
    }

    .furnace button, #craft-form button {
        background: none;
        border: none;
        outline: none;
    }

    .furnace button img {
        width: 180px;
    }

    .popup {
        width: 80%;
        max-width: 800px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.8);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 5;
        display: none;
        font-family: "Great Vibes", cursive;
        color: white;
    }

    .popup h2 {
        text-align: center;
        font-size: 25px;
        margin-bottom: 10px;
    }

    .potion-options {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .potion-option {
        cursor: pointer;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .potion-option img {
        width: 100px;
    }

    .potion-option.selected {
        border-color: #ffcd07;
        background: rgba(255, 255, 255, 0.4);
    }

    #craft-form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    #craft-form button img {
        width: 100%;
        max-width: 180px;
    }

    @media (max-width: 1200px) {
        .content{
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .furnace {
            width: 47%;
        }

        .potion-options {
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        body::after {
            background-image: url('/images/background/background_phong_canh_19.jpg');
            background-size: cover;
        }

        .furnace_container {
            background: none;
            padding: 10px;
        }

        .content{
            padding: 0;
        }

        .furnace {
            width: 100%;
            justify-content: flex-start;
            gap: 5px;
        }

        .furnace img {
            width: 60%;
        }

        .furnace button img {
            width: 110px;
        }

        .popup {
            width: 100%;
            height: 100vh;
            padding-top: 100px;
        }

        .container_practice{
            margin-bottom: 100px;
        }
    }
</style>
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
            <img src="{{ asset('images/background/background_phong_canh_6.jpg') }}" alt="Báo danh hằng ngày"
                 alt="Báo danh hằng ngày">
        </div>
        <div class="banner_practice">
            <img src="{{ asset('/images/background/background_phong_canh_11.png') }}" alt="">
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
                    <li class="">
                        <a href="{{route('mine_cave')}}">
                            <img src="{{ asset('/images/components/button-linh-son.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/components/button-linh-son-active.png') }}"
                                 alt="">
                        </a>
                    </li>
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('/images/components/button-luyen-dan.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/components/button-luyen-dan-active.png') }}"
                                 alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class=" furnace_container">
                    @foreach($furnaceStatus as $furnaceId => $status)
                        @php
                            $furnace = $furnaces[$furnaceId];
                        @endphp
                        <div class="furnace" id="furnace-{{ $furnaceId }}">
                            <h2>{{ $furnace['name'] }}</h2>
                            <img src="{{ asset('./images/alchemy_furnace/'.$furnace['image']) }}"
                                 alt="{{ $furnace['name'] }}">
                            @if($status['status'] == 'available')
                                <button onclick="showCraftPopup({{ $furnaceId }})" id="craft-button-{{ $furnaceId }}">
                                    <img src="{{ asset('/images/components/button-luyen-dan.png') }}" alt="">
                                </button>
                            @elseif($status['status'] == 'crafting')
                                <p class="des_furnace">Đang luyện {{ $status['potion'] }}. <br> Thời gian còn lại:</p>
                                <span id="countdown-{{ $furnaceId }}" class="countdown"
                                      data-remaining-time="{{ $status['remaining_time'] }}">{{ gmdate('H:i:s', $status['remaining_time']) }}</span>
                            @elseif($status['status'] == 'completed')
                                <button onclick="collectPotion({{ $furnaceId }})">
                                    <img src="{{ asset('/images/components/button-nhan-dan-duoc.png') }}" alt="">
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="remind_checkin">
                    <img src="{{ asset('images/components/vuong_lam_luyen_dan.png') }}" alt="Hàn Lập nhắc báo danh"
                         title="Hàn Lập nhắc báo danh">
                </div>
            </div>

            <div id="craft-popup" class="popup">
                <h2>Chọn Đan Dược</h2>
                <div class="potion-options">
                    @foreach($potions as $potionId => $potion)
                        <div class="potion-option" data-potion-id="{{ $potionId }}"
                             onclick="selectPotion({{ $potionId }})">
                            <img src="{{ asset('/images/potion/'.$potion['image']) }}" alt="">
                            {{ $potion['name'] }}
                        </div>
                    @endforeach
                </div>
                <form id="craft-form" onsubmit="submitCraftForm(event)">
                    @csrf
                    <input type="hidden" name="furnace_id" id="craft-furnace-id">
                    <input type="hidden" name="potion_id" id="selected-potion-id">
                    <button type="submit">
                        <img src="{{ asset('/images/components/button-bat-dau-luyen-dan.png') }}" alt="">
                    </button>
                    <button type="button" onclick="closeCraftPopup()">
                        <img src="{{ asset('/images/components/button-dong.png') }}" alt="">
                    </button>
                </form>
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
    const potions = @json($potions);
    const furnaces = @json($furnaces);

    function showCraftPopup(furnaceId) {
        $('#craft-furnace-id').val(furnaceId);
        $('#craft-popup').show();
    }

    function closeCraftPopup() {
        $('#craft-popup').hide();
    }

    function selectPotion(potionId) {
        $('.potion-option').removeClass('selected');
        $('[data-potion-id=' + potionId + ']').addClass('selected');
        $('#selected-potion-id').val(potionId);
    }

    function submitCraftForm(event) {
        event.preventDefault();
        const furnaceId = $('#craft-furnace-id').val();
        const potionId = $('#selected-potion-id').val();
        if (potionId === "") {
            showToast('error', 'Vui lòng chọn đan dược trước khi bắt đầu luyện đan');
        } else {
            $.ajax({
                url: '/api/v1/luyen-dan-duoc',
                type: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify({
                    furnace_id: furnaceId,
                    potion_id: potionId
                }),
                success: function (response) {
                    if (response.status === "success") {
                        showToast('success', 'Bắt đầu luyện đan dược thành công!');
                        $('#craft-popup').hide();
                        updateFurnaceStatus(furnaceId, potionId);
                    } else {
                        showToast('error', response.message);
                    }
                },
                error: function () {
                    showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
                }
            });
        }
    }

    function collectPotion(furnaceId) {
        $.ajax({
            url: '/api/v1/nhan-dan-duoc',
            type: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: JSON.stringify({
                furnace_id: furnaceId
            }),
            success: function (response) {
                if (response.status === "success") {
                    showToast('success', 'Đã nhận đan dược thành công!');
                    resetFurnaceStatus(furnaceId);
                } else {
                    showToast('error', response.message);
                }
            },
            error: function () {
                showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    }

    function updateFurnaceStatus(furnaceId, potionId) {
        const potion = potions[potionId];
        const furnace = furnaces[furnaceId];
        const craftingTime = potion['crafting_time'] * 3600 * (1 - furnace['time_reduction_percentage'] / 100);

        const furnaceElement = $('#furnace-' + furnaceId);

        $('#craft-button-' + furnaceId).hide();

        if (furnaceElement.find('.des_furnace').length === 0) {
            furnaceElement.append('<p class="des_furnace">Đang luyện ' + potions[potionId].name + '. Thời gian còn lại:</p>');
        } else {
            furnaceElement.find('.des_furnace').text('Đang luyện ' + potions[potionId].name + '. Thời gian còn lại:');
        }

        if (furnaceElement.find('#countdown-' + furnaceId).length === 0) {
            furnaceElement.append('<span id="countdown-' + furnaceId + '" class="countdown" data-remaining-time="' + craftingTime + '">' + formatTime(craftingTime) + '</span>');
        } else {
            const countdownElement = $('#countdown-' + furnaceId);
            countdownElement.data('remaining-time', craftingTime);
            countdownElement.text(formatTime(craftingTime));
        }
    }

    function resetFurnaceStatus(furnaceId) {
        const furnaceElement = $('#furnace-' + furnaceId);

        furnaceElement.find('.countdown').remove();
        furnaceElement.find('.des_furnace').remove();
        furnaceElement.find('button').remove();

        if (furnaceElement.find('#craft-button-' + furnaceId).length === 0) {
            furnaceElement.append('<button id="craft-button-' + furnaceId + '" onclick="showCraftPopup(' + furnaceId + ')"><img src="{{ asset('/images/components/button-luyen-dan.png') }}" alt=""></button>');
        } else {
            furnaceElement.find('#craft-button-' + furnaceId).show();
        }
    }

    function formatTime(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const secs = seconds % 60;
        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    function updateCountdown() {
        $('.countdown').each(function () {
            let remainingTime = parseInt($(this).data('remaining-time'));

            if (remainingTime > 0) {
                remainingTime--;
                $(this).data('remaining-time', remainingTime);

                const hours = Math.floor(remainingTime / 3600);
                const minutes = Math.floor((remainingTime % 3600) / 60);
                const seconds = remainingTime % 60;

                $(this).text(`${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
            } else {
                $(this).closest('.furnace').find('.des_furnace').remove();
                $(this).closest('.furnace').find('.countdown').replaceWith('<button onclick="collectPotion(' + $(this).closest('.furnace').attr('id').split('-')[1] + ')"><img src="{{ asset('/images/components/button-nhan-dan-duoc.png') }}" alt=""></button>');
            }
        });
    }

    $(document).ready(function () {
        setInterval(updateCountdown, 1000);
    });
</script>
</body>
</html>
