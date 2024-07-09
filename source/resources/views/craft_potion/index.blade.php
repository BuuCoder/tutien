<!DOCTYPE html>
<html>
<head>
    <title>Phong Luyện Đan</title>
</head>
<body>
<h1>Phong Luyện Đan</h1>

@foreach($furnaces as $furnaceId => $furnace)
    <div class="furnace">
        <h2>{{ $furnace['name'] }}</h2>
        <img src="{{ $furnace['image'] }}" alt="{{ $furnace['name'] }}">
        @if($furnaceStatus[$furnaceId]['status'] == 'available')
            <button onclick="showCraftPopup({{ $furnaceId }})">Luyện Đan</button>
        @elseif($furnaceStatus[$furnaceId]['status'] == 'crafting')
            <p>Đang luyện {{ $furnaceStatus[$furnaceId]['potion'] }}. Thời gian còn lại: {{ $furnaceStatus[$furnaceId]['remaining_time'] }} giây</p>
        @elseif($furnaceStatus[$furnaceId]['status'] == 'completed')
            <button>Nhận Đan Dược</button>
        @endif
    </div>
@endforeach

<div id="craft-popup" style="display: none;">
    <h2>Chọn loại đan dược</h2>
    <form id="craft-form">
        @csrf
        <input type="hidden" name="furnace_id" id="craft-furnace-id">
        <select name="potion_id">
            @foreach($potions as $potionId => $potion)
                <option value="{{ $potionId }}">{{ $potion['name'] }}</option>
            @endforeach
        </select>
        <button type="submit">Bắt đầu luyện</button>
    </form>
</div>

<script>
    function showCraftPopup(furnaceId) {
        document.getElementById('craft-furnace-id').value = furnaceId;
        document.getElementById('craft-popup').style.display = 'block';
    }
</script>
</body>
</html>
