<!DOCTYPE html>
<html lang="en">
@include('layout.header');
<style>
    body {
        font-family: "Great Vibes", cursive;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 100%;
        margin: auto;
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        z-index: 3;
        color: #fff;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px 0;
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

    .badge-price img, .item-price img{
        width: 20px;
    }

    button {
        width: fit-content;
        background: #b3b3b3;
        border: none;
        outline: none;
        padding: 10px 30px;
        border-radius: 5px;
        color: #000;
        cursor: pointer;
    }
    button:hover{
        background: #fff;
        color: #000;
    }

    .sell-item, .sell-badge{
        background: #ff3131;
        color: #fff;
    }

    .buy-item, .buy-badge{
        background: #3183ff;
        color: #fff;
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

    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
        z-index: 20;
        border-radius: 5px;
    }

    .modal-content {
        text-align: center;
    }

    .modal-buttons {
        margin-top: 20px;
    }

    .modal-buttons button {
        margin: 0 10px;
        padding: 10px 20px;
        border: none;
        background: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .modal-buttons button:hover {
        background: #0056b3;
    }

    .modal-buttons button#confirmNo {
        background: #dc3545;
    }

    .modal-buttons button#confirmNo:hover {
        background: #c82333;
    }
    @media (max-width: 1190px) {
        .badge, .item {
            width: 48%;
        }
    }
    @media (max-width: 768px) {
        .badge, .item {
            width: 100%;
        }
    }
</style>
<body>
<h1>Danh sách huy hiệu và vật phẩm</h1>
<h2>Huy hiệu</h2>
<div class="container">
    @foreach ($allBadges as $badgeId => $badge)
        <div class="badge">
            <div class="badge-content">
                @if ($badge['badge_image'])
                    <img src="{{ asset('images/badge/'. $badge['badge_type']. '/' . $badge['badge_image']) }}" alt="{{ $badge['badge_name'] }}" title="{{ $badge['badge_name'] }}">
                @endif
                <p class="badge-title">{{ $badge['badge_name'] }}</p>
                <p class="badge-description">{{ $badge['badge_description'] }}</p>
                <p class="badge-price">
                    <span>
                        <img src="{{ asset('/images/gem/bach-ngoc.png') }}" alt="">
                    </span>
                    {{ $badge['badge_price'] }}
                </p>
                @if (in_array($badgeId, $userBadges))
                    <button class="sell-badge" data-badge-id="{{ $badgeId }}">Bán</button>
                @else
                    <button class="buy-badge" data-badge-id="{{ $badgeId }}">Mua ngay</button>
                @endif
            </div>
        </div>
    @endforeach
</div>
<h2>Vật phẩm</h2>
<div class="container">
    @foreach ($allItems as $itemId => $item)
        <div class="item">
            <div class="item-content">
                @if ($item['item_image'])
                    <img src="{{ asset('images/'. $item['item_type']. '/' . $item['item_image']) }}" alt="{{ $item['item_name'] }}" title="{{ $item['item_name'] }}">
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
                @if (isset($userItems[$itemId]) && $userItems[$itemId] > 0)
                    <button class="sell-item" data-item-id="{{ $itemId }}">Bán</button>
                @endif
                <button class="buy-item" data-item-id="{{ $itemId }}">Mua ngay</button>
            </div>
        </div>
    @endforeach
</div>
<div id="overlay" class="overlay"></div>
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <p id="confirmMessage"></p>
        <div class="modal-buttons">
            <button id="confirmYes">Yes</button>
            <button id="confirmNo">No</button>
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
        function handleResponse(response, element) {
            if (response.status === 'success') {
                showToast('success', response.message);
                if (element.hasClass('buy-badge')) {
                    element.removeClass('buy-badge').addClass('sell-badge').text('Bán');
                } else if (element.hasClass('sell-badge')) {
                    element.removeClass('sell-badge').addClass('buy-badge').text('Mua ngay');
                } else if (element.hasClass('buy-item')) {
                    let quantityElement = element.closest('.item-content').find('.item-quantity');
                    let quantity = parseInt(quantityElement.text()) + 1;
                    quantityElement.text(quantity);
                } else if (element.hasClass('sell-item')) {
                    let quantityElement = element.closest('.item-content').find('.item-quantity');
                    let quantity = parseInt(quantityElement.text()) - 1;
                    if (quantity <= 0) {
                        element.removeClass('sell-item').addClass('buy-item').text('Mua ngay');
                        quantityElement.text(0);
                    } else {
                        quantityElement.text(quantity);
                    }
                }
            } else {
                showToast('error', response.message);
            }
        }

        function handleError(response){
            showToast('error', response.message);
        }

        function confirmAction(message, callback) {
            $('#confirmMessage').text(message);
            $('#overlay, #confirmModal').fadeIn();

            $('#confirmYes').off('click').on('click', function() {
                callback();
                $('#overlay, #confirmModal').fadeOut();
            });

            $('#confirmNo, #overlay').off('click').on('click', function() {
                $('#overlay, #confirmModal').fadeOut();
            });
        }

        $(document).on('click', '.buy-badge', function() {
            var badgeId = $(this).data('badge-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn mua huy hiệu này?', function() {
                $.ajax({
                    url: '/api/v1/mua-huy-hieu',
                    type: 'POST',
                    data: {
                        badgeId: badgeId
                    },
                    success: function(response) {
                        handleResponse(response, element);
                    },
                    error: function(response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.sell-badge', function() {
            var badgeId = $(this).data('badge-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn bán huy hiệu này?', function() {
                $.ajax({
                    url: '/api/v1/ban-huy-hieu',
                    type: 'POST',
                    data: {
                        badgeId: badgeId
                    },
                    success: function(response) {
                        handleResponse(response, element);
                    },
                    error: function(response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.buy-item', function() {
            var itemId = $(this).data('item-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn mua vật phẩm này?', function() {
                $.ajax({
                    url: '/api/v1/mua-vat-pham',
                    type: 'POST',
                    data: {
                        itemId: itemId
                    },
                    success: function(response) {
                        handleResponse(response, element);
                    },
                    error: function(response) {
                        handleError(response)
                    }
                });
            });
        });

        $(document).on('click', '.sell-item', function() {
            var itemId = $(this).data('item-id');
            var element = $(this);
            confirmAction('Bạn có chắc chắn muốn bán vật phẩm này?', function() {
                $.ajax({
                    url: '/api/v1/ban-vat-pham',
                    type: 'POST',
                    data: {
                        itemId: itemId
                    },
                    success: function(response) {
                        handleResponse(response, element);
                    },
                    error: function(response) {
                        handleError(response)
                    }
                });
            });
        });
    });
</script>
</body>
</html>
