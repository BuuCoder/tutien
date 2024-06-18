@if (session('success'))
    <div class="toast-item success">
        <div class="toast success">
            <label for="t-success" class="close"></label>
            <h3>Thành công!</h3>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="toast-item error">
        <div class="toast error">
            <label for="t-error" class="close"></label>
            <h3>Lỗi!</h3>
            <p>{{ session('error') }}</p>
        </div>
    </div>
@endif
@foreach($dataAllPot as $pot)
    <div class="card">
        <h1>{{ $pot->pot_name }}</h1>
        @if($dataPortUser[$pot->pot_id]->pot_time_start == 0)
            <p>00:00:00</p>
            <form action="{{ route('grow') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                <button type="submit">Gieo linh dược</button>
            </form>
        @elseif(($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time())
            <p id="{{$pot->pot_id}}" class="countdown">{{ date('H:i:s', ($pot->pot_growth * 3600 - (time() - $dataPortUser[$pot->pot_id]->pot_time_start))) }}</p>
            <form id="form-{{$pot->pot_id}}" action="{{ route('harvest') }}" method="POST" style="display: none">
                @csrf
                <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                <button type="submit">Thu hoạch</button>
            </form>
        @else
            <p>00:00:00</p>
            <form action="{{ route('harvest') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                <button type="submit">Thu hoạch</button>
            </form>
        @endif
    </div>
@endforeach


<script>
    // Lấy danh sách tất cả các phần tử <p> có class "countdown"
    const countdownElements = document.querySelectorAll('.countdown');

    // Duyệt qua từng phần tử và bắt đầu đếm ngược
    countdownElements.forEach(function(element) {
        startCountdown(element);
    });

    // Hàm bắt đầu đếm ngược cho từng phần tử
    function startCountdown(element) {
        let timeRemaining = parseTime(element.textContent);
        console.log(element.textContent);
        const interval = setInterval(function() {
            // Chuyển đổi thời gian còn lại thành định dạng hh:mm:ss
            const hours = Math.floor(timeRemaining / 3600);
            const minutes = Math.floor((timeRemaining % 3600) / 60);
            const seconds = timeRemaining % 60;
            element.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Giảm thời gian còn lại đi 1 giây
            timeRemaining--;

            // Kiểm tra nếu đếm ngược kết thúc
            if (timeRemaining < 0) {
                clearInterval(interval);
                element.textContent = '00:00:00';
                performAction(element);
            }
        }, 1000); // Mỗi giây (1000ms)
    }

    // Hàm chuyển đổi định dạng hh:mm:ss thành tổng số giây
    function parseTime(timeString) {
        const parts = timeString.split(':');
        const hours = parseInt(parts[0], 10);
        const minutes = parseInt(parts[1], 10);
        const seconds = parseInt(parts[2], 10);
        return hours * 3600 + minutes * 60 + seconds;
    }

    // Hàm thực hiện action khi đếm ngược kết thúc cho từng phần tử
    function performAction(element) {
        const formId = `form#form-${element.id}`;
        const formElement = document.querySelector(formId);

        if (formElement) {
            formElement.style.display = "block";
        } else {
            console.error(`Không tìm thấy form với id ${element.id}`);
        }
    }
</script>
