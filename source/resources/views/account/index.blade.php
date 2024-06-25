<h3>Thông tin:</h3>
Tên: {{ $user['name'] }}
Tu vi: {{ $user['points'] }}
ID hệ thống: {{ $user['system_id'] }}
ID Cấp bậc: {{ $user['level_id'] }}
Nguyên thạch: {{ $user['money']}}

<h3>Huy hiệu</h3>

@foreach($user['badge'] as $badgeId)
    @php
        $badge_image = $allBadges[$badgeId]['badge_image'];
        $badge_name = $allBadges[$badgeId]['badge_name'];
        $badge_type = $allBadges[$badgeId]['badge_type'];
    @endphp
    @if ($badge_image)
        <img src="{{ asset('images/badge/'.$badge_type.'/'. $badge_image) }}" alt="{{ $badge_name }}" title="{{ $badge_name }}">
    @endif
@endforeach

<h3>Vật Phẩm:</h3>

@foreach($user['item'] as $itemId => $itemQuantity)
    @php
        $item_image = $allItems[$itemId]['item_image'];
        $item_name = $allItems[$itemId]['item_name'];
    @endphp
    @if ($badge_image)
        <img src="{{ asset('images/duocvien/' . $item_image) }}" alt="{{ $item_name }}" title="{{ $item_name }}">
        Số lượng: {{ $itemQuantity }}
    @endif
@endforeach

<h3>Lịch sử:</h3>
