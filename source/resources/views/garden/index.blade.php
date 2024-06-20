<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu tiên - Game By MajinBuu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
</head>
<body>
<img class="button_open show_button_open" width="40" height="40" src="{{ asset('/images/button-open.png') }}" alt="">
<button class="musicButton" title="Nhạc nền">
    <img class="open-music" src="{{ asset('/images/open-music.png') }}" alt="Nhạc nền" title="Mở nhạc">
    <img class="off-music" src="{{ asset('/images/off-music.png') }}" alt="Nhạc nền" title="Tắt nhạc" style="display: none;">
</button>

<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-thuong-hoi.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-tu-luyen.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game main">
                <a href=""><img class="main" src="{{ asset('/images/button-chinh-dien.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-luan-ban.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="./login.html"><img src="{{ asset('/images/button-dang-nhap.png') }}" alt=""></a>
            </li>
        </ul>
        <ul class="menu_game_mobile">
            <img class="button_close" width="40" height="40" src="{{ asset('/images/button-close.png') }}" alt="">
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-thuong-hoi.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-tu-luyen.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href=""><img class="main" src="{{ asset('/images/button-chinh-dien.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href=""><img src="{{ asset('/images/button-luan-ban.png') }}" alt=""></a>
            </li>
            <li class="item_menu_game">
                <a href="./login.html"><img src="{{ asset('/images/button-dang-nhap.png') }}" alt=""></a>
            </li>
        </ul>
        <div class="banner_tuluyen">
            <img src="{{ asset('/images/background_phong_canh_7.png') }}" alt="">
        </div>
        <div class="container_tuluyen">
            <div class="menu_tuluyen">
                <ul>
                    <li>
                        <a href="{{ route('checkin') }}">
                            <img src="{{ asset('/images/button-bao-danh.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/button-bao-danh-active.png') }}" alt="">
                        </a>
                    </li>
                    <li class="active">
                        <a href="">
                            <img src="{{ asset('/images/button-duoc-vien.png') }}" alt="">
                            <img class="active" src="{{ asset('/images/button-duoc-vien-active.png') }}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content content_tuluyen">
                <div class="group_card duoc_vien">
                    @foreach($dataAllPot as $pot)
                        <div class="card">
                            <h3>{{ $pot->pot_name }}</h3>
                            @if($dataPortUser[$pot->pot_id]->pot_time_start == 0)
                                <p>00:00:00</p>
                                <small>Chưa có linh dược</small>
                                <img class="chaucay" src="{{ asset('/images/duocvien/chau-hoa-cuong.png') }}" alt="">
                                <form action="{{ route('grow') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                    <button type="submit">
                                        <img src="{{ asset('/images/duocvien/button-gieo-linh-duoc.png') }}" alt="">
                                    </button>
                                </form>
                            @elseif(($dataPortUser[$pot->pot_id]->pot_time_start + $pot->pot_growth * 3600) > time())
                                <p id="{{$pot->pot_id}}" class="countdown">{{ date('H:i:s', ($pot->pot_growth * 3600 - (time() - $dataPortUser[$pot->pot_id]->pot_time_start))) }}</p>
                                <small>Linh dược đang phát triển</small>
                                <img class="chaucay" src="{{ asset('/images/duocvien/hoa-dang-phat-trien.png') }}" alt="">
                                <form id="form-{{$pot->pot_id}}" action="{{ route('harvest') }}" method="POST" style="display: none">
                                    @csrf
                                    <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                    <button type="submit">Thu hoạch</button>
                                </form>
                            @else
                                <p>00:00:00</p>
                                <small>Linh dược trưởng thành</small>
                                <img class="chaucay" src="{{ asset('/images/duocvien/hoa.png') }}" alt="">
                                <form action="{{ route('harvest') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $pot->pot_id }}" name="potId">
                                    <button type="submit">
                                        <img src="{{ asset('/images/duocvien/button-thu-hoach.png') }}" alt="">
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast-panel">
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
</div>
<div class="footer">
    <img src="{{ asset('/images/tu-tien-gioi-3.png') }}" alt="">
    <p>Được tạo bởi Majinbuu &copy; Copy right 2024 </p>
    <p>Chúc các bạn tham gia chơi vui vẻ nhé!</p>
</div>
<audio id="backgroundMusic" loop>
    <source src="./audio/batpham.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<script>
    // Lấy các phần tử button_open và button_close
    const buttonOpen = document.querySelector('.button_open');
    const buttonClose = document.querySelector('.button_close');
    const menuGameMobile = document.querySelector('.menu_game_mobile');

    // Xử lý sự kiện khi click vào button_open
    buttonOpen.addEventListener('click', function () {
        menuGameMobile.classList.add('show_menu_mobile'); // Thêm class show_menu_mobile
        buttonOpen.classList.remove('show_button_open'); // Thêm class show_menu_mobile
    });

    // Xử lý sự kiện khi click vào button_close
    buttonClose.addEventListener('click', function () {
        menuGameMobile.classList.remove('show_menu_mobile'); // Xóa class show_menu_mobile
        buttonOpen.classList.add('show_button_open'); // Thêm class show_menu_mobile
    });

    const musicButton = document.querySelector('.musicButton');
    const backgroundMusic = document.getElementById('backgroundMusic');
    const openMusicImg = document.querySelector('.open-music');
    const offMusicImg = document.querySelector('.off-music');

    // Xử lý sự kiện khi người dùng bấm vào nút nhạc nền
    musicButton.addEventListener('click', function () {
        if (backgroundMusic.paused) {
            backgroundMusic.play();
            openMusicImg.style.display = 'none';
            offMusicImg.style.display = 'block';
        } else {
            backgroundMusic.pause();
            openMusicImg.style.display = 'block';
            offMusicImg.style.display = 'none';
        }
    });

    setTimeout(function () {
        document.querySelector('.toast-panel').style.display = 'none';
    },5000)


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
</body>
</html>
