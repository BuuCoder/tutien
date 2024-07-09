<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .furnace_container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    .furnace {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
        padding: 20px;
        width: 300px;
        text-align: center;
    }

    .furnace img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .furnace button {
        background: #007bff;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        margin-top: 10px;
        padding: 10px 20px;
        font-size: 16px;
    }

    .furnace button:hover {
        background: #0056b3;
    }

    #craft-popup {
        width: 80%;
        max-width: 600px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        left: 50%;
        padding: 20px;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
    }

    #craft-popup h2 {
        margin-top: 0;
    }

    #craft-popup select,
    #craft-popup button {
        display: block;
        margin: 10px 0;
        width: 100%;
        padding: 10px 20px;
    }

    #craft-popup button {
        background: #28a745;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        padding: 10px 0;
        font-size: 16px;
    }

    #craft-popup button:hover {
        background: #218838;
    }

    #craft-popup button[type="button"] {
        background: #dc3545;
    }

    #craft-popup button[type="button"]:hover {
        background: #c82333;
    }
</style>
<body>

<div class="furnace_container" style="z-index: 30">
    <h1>Phòng Luyện Đan</h1>
    @foreach($furnaceStatus as $furnaceId => $status)
        @php
            $furnace = $furnaces[$furnaceId];
        @endphp
        <div class="furnace" id="furnace-{{ $furnaceId }}">
            <h2>{{ $furnace['name'] }}</h2>
            <img src="{{ asset('./images/alchemy_furnace/'.$furnace['image']) }}" alt="{{ $furnace['name'] }}">
            @if($status['status'] == 'available')
                <button onclick="showCraftPopup({{ $furnaceId }})">Luyện Đan</button>
            @elseif($status['status'] == 'crafting')
                <p class="des_furnace">Đang luyện {{ $status['potion'] }}. Thời gian còn lại:
                </p>
                <span id="countdown-{{ $furnaceId }}"
                      class="countdown"
                      data-remaining-time="{{ $status['remaining_time'] }}">{{ gmdate('H:i:s', $status['remaining_time']) }}</span>
            @elseif($status['status'] == 'completed')
                <button onclick="collectPotion({{ $furnaceId }})">Nhận Đan Dược</button>
            @endif
        </div>
    @endforeach

    <div id="craft-popup" style="display: none;">
        <h2>Chọn loại đan dược</h2>
        <form id="craft-form" onsubmit="submitCraftForm(event)">
            @csrf
            <input type="hidden" name="furnace_id" id="craft-furnace-id">
            <select name="potion_id" id="potion-id">
                @foreach($potions as $potionId => $potion)
                    <option value="{{ $potionId }}">{{ $potion['name'] }}</option>
                @endforeach
            </select>
            <button type="submit">Bắt đầu luyện</button>
            <button type="button" onclick="closeCraftPopup()">Đóng</button>
        </form>
    </div>
</div>
@include('layout.toast')
@include('layout.footer')

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/gsap-3.9.1.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    function showCraftPopup(furnaceId) {
        $('#craft-furnace-id').val(furnaceId);
        $('#craft-popup').show();
    }

    function closeCraftPopup() {
        $('#craft-popup').hide();
    }

    function submitCraftForm(event) {
        event.preventDefault();
        const furnaceId = $('#craft-furnace-id').val();
        const potionId = $('#potion-id').val();

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
                    location.reload();
                } else {
                    showToast('error', response.message);
                }
            },
            error: function () {
                showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
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
                    location.reload();
                } else {
                    showToast('error', response.message);
                }
            },
            error: function () {
                showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    }

    function updateCountdown() {
        $('.countdown').each(function() {
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
                $(this).closest('.furnace').find('.countdown').replaceWith('<button onclick="collectPotion(' + $(this).closest('.furnace').attr('id').split('-')[1] + ')">Nhận Đan Dược</button>');
            }
        });
    }

    $(document).ready(function() {
        setInterval(updateCountdown, 1000);
    });
</script>
</body>
</html>
