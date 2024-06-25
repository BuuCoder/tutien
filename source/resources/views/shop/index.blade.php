<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách huy hiệu</title>
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
        .badge {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .badge img {
            max-width: 50px;
            margin-right: 20px;
        }
        .badge:last-child {
            border-bottom: none;
        }
        .badge-title {
            font-size: 1.2em;
            margin: 0;
        }
        .badge-description {
            margin: 5px 0 0 0;
            color: #555;
        }
        .badge-price {
            color: #090;
            font-weight: bold;
        }
        .badge-buy {
            font-size: 0.9em;
            color: #999;
        }
        button{
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
    <h1>Danh sách huy hiệu</h1>
    @foreach ($allBadge as $badge)
        <div class="badge">
            <div class="badge-content">
                @if ($badge['badge_image'])
                    <img src="{{ asset('images/badge/'. $badge['badge_type']. '/' . $badge['badge_image']) }}" alt="{{ $badge['badge_name'] }}">
                @endif
                <div>
                    <p class="badge-title">{{ $badge['badge_name'] }}</p>
                    <p class="badge-description">{{ $badge['badge_description'] }}</p>
                    <p class="badge-price">Giá: {{ $badge['badge_price'] }}</p>
                    <button>Mua ngay</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
