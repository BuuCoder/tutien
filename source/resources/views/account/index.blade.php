{{--<h3>Thông tin:</h3>--}}
{{--Tên: {{ $user['name'] }}--}}
{{--Tu vi: {{ $user['points'] }}--}}
{{--ID hệ thống: {{ $user['system_id'] }}--}}
{{--ID Cấp bậc: {{ $user['level_id'] }}--}}
{{--Nguyên thạch: {{ $user['money']}}--}}

{{--<h3>Huy hiệu</h3>--}}
{{--@if ($user['badge'])--}}
{{--    @foreach($user['badge'] as $badgeId)--}}
{{--        @php--}}
{{--            $badge_image = $allBadges[$badgeId]['badge_image'];--}}
{{--            $badge_name = $allBadges[$badgeId]['badge_name'];--}}
{{--            $badge_type = $allBadges[$badgeId]['badge_type'];--}}
{{--        @endphp--}}
{{--        @if ($badge_image)--}}
{{--            <img src="{{ asset('/images/badge/'.$badge_type.'/'. $badge_image) }}" alt="{{ $badge_name }}"--}}
{{--                 title="{{ $badge_name }}">--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--@endif--}}

{{--<h3>Vật Phẩm:</h3>--}}
{{--@if($user['item'])--}}
{{--    @foreach($user['item'] as $itemId => $itemQuantity)--}}
{{--        @php--}}
{{--            $item_image = $allItems[$itemId]['item_image'];--}}
{{--            $item_name = $allItems[$itemId]['item_name'];--}}
{{--        @endphp--}}
{{--        @if ($badge_image)--}}
{{--            <img src="{{ asset('/images/duocvien/' . $item_image) }}" alt="{{ $item_name }}" title="{{ $item_name }}">--}}
{{--            Số lượng: {{ $itemQuantity }}--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--@endif--}}
{{--<h3>Lịch sử:</h3>--}}


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu tiên giới - Tài khoản của bạn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
</head>
<body>
<img class="button_open show_button_open" width="40" height="40" src="{{ asset('/images/button-open.png') }}"
     alt="Mở menu"
     title="Mở menu">
<img class="logo_mobile" src="{{ asset('images/tu-tien-gioi-3.png') }}" alt="">
<div class="heading_game">
    <ul class="menu_game_mobile">
        <img class="button_close" width="40" height="40" src="{{ asset('/images/button-close.png') }}" alt="Đóng menu"
             title="Đóng menu">
        <li class="item_menu_game">
            <a href="" title="Thương hội"><img src="{{ asset('/images/button-thuong-hoi.png') }}" alt="Thương hội"
                                               title="Thương hội"></a>
        </li>
        <li class="item_menu_game">
            <a href="/diem-danh-hang-ngay" title="Tu luyện"><img src="{{ asset('/images/button-tu-luyen.png') }}"
                                                                 alt="Tu luyện" title="Tu luyện"></a>
        </li>
        <li class="item_menu_game">
            <a href="/" title="Chính điện"><img class="main" src="{{ asset('/images/button-chinh-dien.png') }}"
                                                alt="Chính điện"
                                                title="Chính điện"></a>
        </li>
        {{--        <li class="item_menu_game">--}}
        {{--            <a href="" title="Luận bàn"><img src="{{ asset('/images/button-luan-ban.png') }}" alt="Luận bàn" title="Luận bàn"></a>--}}
        {{--        </li>--}}
        <li class="item_menu_game active">
            <a href="/tai-khoan"><img src="{{ asset('images/button-tai-khoan.png') }}" alt=""></a>
            <a class="active" href="javascript:void(0)"><img class="main"
                                                             src="{{ asset('images/button-tai-khoan-active.png') }}"
                                                             alt=""></a>
        </li>
        <li class="item_menu_game">
            <a href="/dang-xuat" title="Đăng nhập"><img src="{{ asset('/images/button-dang-xuat.png') }}"
                                                        alt="Đăng xuất" title="Đăng xuất"></a>
        </li>
    </ul>
</div>
<div class="wrapper_account">
    <div class="top_account">
        <img class="cover" src="{{ asset('/images/background_phong_canh_account.jpg') }}" alt="">
    </div>
    <div class="container_account">
        <div class="account">
            <div class="avatar {{ $allRanks[$user['level_id']]['rank_class_name'] }}">
                <img src="{{ asset('/images/banner/avt.png') }}" alt="">
            </div>
            <div class="name_account">
                <img style="height: 70px" src="{{ asset('/images/honglenhbai.gif') }}" alt="">
                <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}">{{ $user['name'] }}</p>
            </div>
            <div class="bangten">
                <div
                    class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}">{{ $allRanks[$user['level_id']]['rank_name'] }}</div>
            </div>
            {{--             <div class="badge friend">--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/laotiennhan.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/haunghe.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/thienthan.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/thienthan2.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/sugia.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/sugiahacam.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/hoathachsi.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 70px" src="{{ asset('/images/tiennhancuoihac.gif') }}" alt=""></div>--}}
            {{--             </div>--}}
            {{--             <div class="badge jewelry">--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif2.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif3.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif4.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif5.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif6.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif7.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif8.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif9.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/newgif10.gif') }}" alt=""></div>--}}
            {{--             </div>--}}
            {{--             <div class="badge fire">--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa1.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa2.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa3.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa8.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa4.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa5.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa6.gif') }}" alt=""></div>--}}
            {{--               <div class=""><img style="height: 30px" src="{{ asset('/images/dihoa7.gif') }}" alt=""></div>--}}
            {{--             </div>--}}
            <div class="left_box name_account">
                <div class="line name"><span class="label">Danh Xưng </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}">{{ $user['name'] }}</p>
                </div>
                <div class="line tuvi"><span class="label">Tu vi </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}"><span class="num">{{ $user['points'] }}/{{ $allRanks[$user['level_id']]['rank_milestone'] }}</span>
                        ({{ $allRanks[$user['level_id']]['rank_name'] }})</p>
                </div>
                <div class="line tuoitho"><span class="label">Tuổi thọ </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}"><span class="num">198</span> tuổi
                    </p>
                </div>
                <div class="line tamphap">
                    <span class="label">Đạo Pháp </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}"
                       style="text-align:center; word-break: break-word">
                        {{ $user['description'] }}
                    </p>
                </div>
            </div>
        </div>
        <div class="item_container">
            <div class="item">
                <h2>Vật Phẩm Của Bạn</h2>
                <div class="square">
                    <img src="{{ asset('/images/duocvien/linh-duoc-hoa.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/duocvien/linh-duoc-moc.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/duocvien/linh-duoc-kim.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/duocvien/linh-duoc-tho.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/duocvien/linh-duoc-thuy.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/bach-ngoc.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/hac-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-hoa-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-hoang-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-hong-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-moc-thach.png') }}"">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-tho-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
                <div class="square">
                    <img src="{{ asset('/images/nguyenthach/nguyen-thuy-thach.png') }}" alt="">
                    <div class="quantity">1000</div>
                </div>
            </div>
            <div class="item">
                <h2>Lịch Sử Nhận Thưởng</h2>
                <div class="log">
                    <table>
                        <thead>
                        <tr>
                            <td>Thời gian</td>
                            <td>Nội dung</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi thu hoạch cây abc</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi thu hoạch cây abc</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi thu hoạch cây abc</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        <tr>
                            <td>26/06/2024 10:20:46</td>
                            <td>Nhận được 20 tu vi khi báo danh</td>
                        </tr>
                        </tbody>
                    </table>
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
<div id="dot"></div>
<div id="ball"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

<script>
    const buttonOpen = document.querySelector('.button_open');
    const buttonClose = document.querySelector('.button_close');
    const menuGameMobile = document.querySelector('.menu_game_mobile');

    buttonOpen.addEventListener('click', function () {
        menuGameMobile.classList.add('show_menu_mobile');
        buttonOpen.classList.remove('show_button_open');
    });

    buttonClose.addEventListener('click', function () {
        menuGameMobile.classList.remove('show_menu_mobile');
        buttonOpen.classList.add('show_button_open');
    });

    var mouse = {x: 0, y: 0};
    var dot = document.getElementById("dot");
    var ball = document.getElementById("ball");

    gsap.set(dot, {xPercent: -50, yPercent: -50});
    gsap.set(ball, {xPercent: -50, yPercent: -50});

    document.addEventListener("mousemove", (e) => {
        mouse.x = (e.clientX - 60);
        mouse.y = e.clientY - 30;

        gsap.to(dot, {x: mouse.x, y: mouse.y, duration: 0.05});

        gsap.to(ball, {x: mouse.x, y: mouse.y, duration: 0.2});
    });
    let scrollTimeout;

    window.addEventListener('scroll', () => {
        const button = document.querySelector('.button_open');

        button.style.opacity = 1;

        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }

        scrollTimeout = setTimeout(() => {
            button.style.opacity = 0;
        }, 4000);
    });

    setTimeout(function () {
        document.querySelector('.toast-panel').style.display = 'none';
    }, 5000)

    document.querySelector('.close').addEventListener('click', function () {
        document.querySelector('.toast-panel').style.display = 'none';
    });

</script>
</body>
</html>
