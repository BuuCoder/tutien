<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách huy hiệu và vật phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .badge, .item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .badge img, .item img {
            max-width: 50px;
            margin-right: 20px;
        }
        .badge:last-child, .item:last-child {
            border-bottom: none;
        }
        .badge-title, .item-title {
            font-size: 1.2em;
            margin: 0;
        }
        .badge-description, .item-description {
            margin: 5px 0 0 0;
            color: #555;
        }
        .badge-price, .item-price {
            color: #090;
            font-weight: bold;
        }
        .badge-buy, .item-buy {
            font-size: 0.9em;
            color: #999;
        }
        button {
            background: #000;
            border: none;
            outline: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Danh sách huy hiệu và vật phẩm</h1>
    <h2>Huy hiệu</h2>
    @foreach ($allBadges as $badgeId => $badge)
        <div class="badge">
            <div class="badge-content">
                @if ($badge['badge_image'])
                    <img src="{{ asset('images/badge/'. $badge['badge_type']. '/' . $badge['badge_image']) }}" alt="{{ $badge['badge_name'] }}" title="{{ $badge['badge_name'] }}">
                @endif
                <div>
                    <p class="badge-title">{{ $badge['badge_name'] }}</p>
                    <p class="badge-description">{{ $badge['badge_description'] }}</p>
                    <p class="badge-price">Giá: {{ $badge['badge_price'] }}</p>
                    @if (in_array($badgeId, $userBadges))
                        <button class="sell-badge" data-badge-id="{{ $badgeId }}">Bán</button>
                    @else
                        <button class="buy-badge" data-badge-id="{{ $badgeId }}">Mua ngay</button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <h2>Vật phẩm</h2>
    @foreach ($allItems as $itemId => $item)
        <div class="item">
            <div class="item-content">
                @if ($item['item_image'])
                    <img src="{{ asset('images/'. $item['item_type']. '/' . $item['item_image']) }}" alt="{{ $item['item_name'] }}" title="{{ $item['item_name'] }}">
                @endif
                <div>
                    <p class="item-title">{{ $item['item_name'] }}</p>
                    <p class="item-description">{{ $item['item_description'] }}</p>
                    <p class="item-price">Giá: {{ $item['item_price'] }}</p>
                    <p>Số lượng: <span class="item-quantity">{{ $userItems[$itemId] ?? 0 }}</span></p>
                    <br>
                    @if (isset($userItems[$itemId]) && $userItems[$itemId] > 0)
                        <button class="sell-item" data-item-id="{{ $itemId }}">Bán</button>
                    @endif
                    <button class="buy-item" data-item-id="{{ $itemId }}">Mua ngay</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script>
    $(document).ready(function() {
        function handleResponse(response, element) {
            if (response.status === 'success') {
                alert(response.message);
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
                alert(response.message);
            }
        }

        function handleError(response){
            alert(response.message);
        }

        function confirmAction(message, callback) {
            if (confirm(message)) {
                callback();
            }
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
