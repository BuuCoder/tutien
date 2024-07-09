<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<style>
    .container {
        font-family: "Great Vibes", cursive;
        max-width: 100%;
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 3;
        color: #fff;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px 0;
    }

    .container h1, .container h2 {
        width: 100%;
        text-align: center;
    }

    .container.title{
        background: rgba(0, 0, 0, 0.8);
    }

    .badge, .item {
        width: 30%;
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        padding: 20px;
    }

    .badge img, .item img {
        max-width: 80px;
    }

    .badge:last-child, .item:last-child {
        border-bottom: none;
    }

    .badge-content, .item-content {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .badge-title, .item-title {
        font-size: 1.2em;
        margin: 0;
    }

    .badge-description, .item-description {
        margin: 5px 0 0 0;
        font-size: 18px;
        font-weight: 400;
        color: #fff;
        text-align: justify;
    }

    .badge-price, .item-price {
        color: #fff;
        font-family: "Bebas Neue", sans-serif;
        font-size: 20px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    .badge-price img, .item-price img {
        width: 20px;
    }

    .group_button {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
    .group_button button{
        width: 120px;
        background: none;
        outline: none;
        border: none;
        cursor: pointer;
    }
    .group_button button img{
        max-width: 100%;
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 10;
    }

    .modal {
        width: 80%;
        max-width: 400px;
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        font-family: "Great Vibes", cursive;
        transform: translate(-50%, -50%);
        background: url('/images/background/background_thong_bao.jpg');
        background-size: cover;
        background-position: center;
        padding: 20px;
        z-index: 20;
        border-radius: 5px;
    }

    .modal-content {
        text-align: center;
        font-size: 20px;
        color: #fff;
    }

    .modal-buttons {
        margin-top: 20px;
        display: flex;
        justify-content: space-evenly;
        gap: 40px;
    }

    .modal-buttons button {
        max-width: 120px;
        background: none;
        border: none;
        outline: none;
    }

    .modal-buttons button img{
        width: 100%;
    }

    @media (max-width: 1190px) {
        .badge, .item {
            width: 48%;
        }
    }

    @media (max-width: 768px) {
        .modal{
            width: 80%;
        }
        .container {
            margin-top: 10px;
        }

        .badge, .item {
            width: 100%;
        }
        .badge img, .item img {
            max-width: 50px;
        }
        .badge-description, .item-description {
            font-size: 12px;
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
            <li class="item_menu_game active">
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
            <li class="item_menu_game active">
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
        <div class="" style="padding: 20px">
            <div class="container title" style="margin-top: 80px;">
                <h1>Thương Hội</h1>
            </div>
            <div class="container title">
                <h2>Huy hiệu</h2>
            </div>
            <div class="container">
                @foreach ($allBadges as $badgeId => $badge)
                    <div class="badge">
                        <div class="badge-content">
                            @if ($badge['badge_image'])
                                <img src="{{ asset('images/badge/'. $badge['badge_type']. '/' . $badge['badge_image']) }}"
                                     alt="{{ $badge['badge_name'] }}" title="{{ $badge['badge_name'] }}">
                            @endif
                            <p class="badge-title">{{ $badge['badge_name'] }}</p>
                            <p class="badge-description">{{ $badge['badge_description'] }}</p>
                            <p class="badge-price">
                                <span>
                                    <img src="{{ asset('/images/gem/bach-ngoc.png') }}" alt="">
                                </span>
                                {{ $badge['badge_price'] }}
                            </p>
                            <div class="group_button">
                                @if (in_array($badgeId, $userBadges))
                                    <button class="sell-badge" data-badge-id="{{ $badgeId }}">
                                        <img src="{{ asset('/images/components/button-ban.png') }}" alt="">
                                    </button>
                                @else
                                    <button class="buy-badge" data-badge-id="{{ $badgeId }}">
                                        <img src="{{ asset('/images/components/button-mua.png') }}" alt="">
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container title">
                <h2>Vật phẩm</h2>
            </div>
            <div class="container">
            @foreach ($allItems as $itemId => $item)
                <div class="item">
                    <div class="item-content">
                        @if ($item['item_image'])
                            <img src="{{ asset('images/'. strtolower($item['item_type']). '/' . $item['item_image']) }}"
                                 alt="{{ $item['item_name'] }}" title="{{ $item['item_name'] }}">
                        @endif
                        <p class="item-title">{{ $item['item_name'] }}</p>
                        <p class="item-description">{{ $item['item_description'] }}</p>
                        <p class="item-price">
                            <span>
                                <img src="{{ asset('/images/gem/bach-ngoc.png') }}" alt="">
                            </span>
                            {{ $item['item_price'] }}
                        </p>
                        <p>Số lượng: <span class="item-quantity">{{ $userItems[$itemId] ?? 0 }}</span></p>
                        <br>
                        <div class="group_button">
                            <button class="buy-item" data-item-id="{{ $itemId }}">
                                <img src="{{ asset('/images/components/button-mua.png') }}" alt="">
                            </button>
                            @if (isset($userItems[$itemId]) && $userItems[$itemId] > 0)
                                <button class="sell-item" data-item-id="{{ $itemId }}" style="">
                                    <img src="{{ asset('/images/components/button-ban.png') }}" alt="">
                                </button>
                            @else
                                <button class="sell-item" data-item-id="{{ $itemId }}" style="display:none;">
                                    <img src="{{ asset('/images/components/button-ban.png') }}" alt="">
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
<div id="overlay" class="overlay"></div>
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <p id="confirmMessage"></p>
        <div class="modal-buttons">
            <button id="confirmYes"><img src="{{ asset('/images/components/button-dong-y.png') }}" alt=""></button>
            <button id="confirmNo"><img src="{{ asset('/images/components/button-khong.png') }}" alt=""></button>
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
        function handleResponse(response, element) {
            if (response.status === 'success') {
                showToast('success', response.message);
                if (element.hasClass('buy-badge')) {
                    element.removeClass('buy-badge').addClass('sell-badge').find('img').attr('src', '/images/components/button-ban.png');
                } else if (element.hasClass('sell-badge')) {
                    element.removeClass('sell-badge').addClass('buy-badge').find('img').attr('src', '/images/components/button-mua.png');
                } else if (element.hasClass('buy-item')) {
                    let quantityElement = element.closest('.item-content').find('.item-quantity');
                    let quantity = parseInt(quantityElement.text()) + 1;
                    quantityElement.text(quantity);
                    if (quantity === 1) {
                        element.siblings('.sell-item').show();
                    }
                } else if (element.hasClass('sell-item')) {
                    let quantityElement = element.closest('.item-content').find('.item-quantity');
                    let quantity = parseInt(quantityElement.text()) - 1;
                    quantityElement.text(quantity);
                    if (quantity <= 0) {
                        element.hide();
                        element.siblings('.buy-item').show();
                        quantityElement.text(0);
                    } else {
                        quantityElement.text(quantity);
                    }
                }
            } else {
                showToast('error', response.message);
            }
        }

        function handleError(response) {
            showToast('error', response.message);
        }

        function confirmAction(message, callback) {
            $('#confirmMessage').text(message);
            $('#overlay, #confirmModal').fadeIn();

            $('#confirmYes').off('click').on('click', function () {
                callback();
                $('#overlay, #confirmModal').fadeOut();
            });

            $('#confirmNo, #overlay').off('click').on('click', function () {
                $('#overlay, #confirmModal').fadeOut();
            });
        }

        $(document).on('click', '.buy-badge', function () {
            var badgeId = $(this).data('badge-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn mua huy hiệu này?', function () {
                $.ajax({
                    url: '/api/v1/mua-huy-hieu',
                    type: 'POST',
                    data: {
                        badgeId: badgeId
                    },
                    success: function (response) {
                        handleResponse(response, element);
                    },
                    error: function (response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.sell-badge', function () {
            var badgeId = $(this).data('badge-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn bán huy hiệu này?', function () {
                $.ajax({
                    url: '/api/v1/ban-huy-hieu',
                    type: 'POST',
                    data: {
                        badgeId: badgeId
                    },
                    success: function (response) {
                        handleResponse(response, element);
                    },
                    error: function (response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.buy-item', function () {
            var itemId = $(this).data('item-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn mua vật phẩm này?', function () {
                $.ajax({
                    url: '/api/v1/mua-vat-pham',
                    type: 'POST',
                    data: {
                        itemId: itemId
                    },
                    success: function (response) {
                        handleResponse(response, element);
                    },
                    error: function (response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.sell-item', function () {
            var itemId = $(this).data('item-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn bán vật phẩm này?', function () {
                $.ajax({
                    url: '/api/v1/ban-vat-pham',
                    type: 'POST',
                    data: {
                        itemId: itemId
                    },
                    success: function (response) {
                        handleResponse(response, element);
                    },
                    error: function (response) {
                        handleError(response)
                    }
                });
            });
        });
    });
</script>
</body>
</html>
