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


<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body>
<img class="button_open show_button_open" width="40" height="40" src="{{ asset('/images/components/button-open.png') }}"
     alt="Mở menu"
     title="Mở menu">
<img class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}" alt="">
<div class="heading_game">
    <ul class="menu_game_mobile">
        <img class="button_close" width="40" height="40" src="{{ asset('/images/components/button-close.png') }}" alt="Đóng menu"
             title="Đóng menu">
        <li class="item_menu_game">
            <a href="" title="Thương hội"><img src="{{ asset('/images/components/button-thuong-hoi.png') }}" alt="Thương hội"
                                               title="Thương hội"></a>
        </li>
        <li class="item_menu_game">
            <a href="/diem-danh-hang-ngay" title="Tu luyện"><img src="{{ asset('/images/components/button-tu-luyen.png') }}"
                                                                 alt="Tu luyện" title="Tu luyện"></a>
        </li>
        <li class="item_menu_game">
            <a href="/" title="Chính điện"><img class="main" src="{{ asset('/images/components/button-chinh-dien.png') }}"
                                                alt="Chính điện"
                                                title="Chính điện"></a>
        </li>
        {{--        <li class="item_menu_game">--}}
        {{--            <a href="" title="Luận bàn"><img src="{{ asset('/images/components/button-luan-ban.png') }}" alt="Luận bàn" title="Luận bàn"></a>--}}
        {{--        </li>--}}
        <li class="item_menu_game active">
            <a href="/tai-khoan"><img src="{{ asset('images/components/button-tai-khoan.png') }}" alt=""></a>
            <a class="active" href="javascript:void(0)"><img class="main"
                                                             src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                                                             alt=""></a>
        </li>
        <li class="item_menu_game">
            <a href="/dang-xuat" title="Đăng nhập"><img src="{{ asset('/images/components/button-dang-xuat.png') }}"
                                                        alt="Đăng xuất" title="Đăng xuất"></a>
        </li>
    </ul>
</div>
<div class="wrapper_account">
    <div class="top_account">
        <img class="cover" src="{{ asset('/images/background/background_phong_canh_account.jpg') }}" alt="">
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
            <div class="box_name">
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
                <div class="" style="width: 100%;">
                    <h2>Vật Phẩm Của Bạn</h2>
                    <p style="font-size: 14px; padding: 10px 0; color: white; display: flex; flex-direction: row; gap: 3px; justify-content: center; align-items: center;  background: rgba(0,0,0,0.6); border-radius: 8px">
                        Nguyên Tiên Thạch: <span style="font-family: 'Bebas Neue';">{{$user['money']}}</span>
                        <img width="18" src="{{ asset('/images/gem/bach-ngoc.png') }}" alt="Tiên nguyên thạch" title="Tiên nguyên thạch">
                    </p>
                </div>

                @foreach($user['item'] as $itemId => $itemQuantity)
                    @if($itemQuantity > 0)
                        <div class="square">
                            <img src="{{ asset('/images/'.strtolower($allItems[$itemId]['item_type']).'/'. $allItems[$itemId]['item_image']) }}" alt="">
                            <div class="quantity">{{$itemQuantity}}</div>
                        </div>
                    @endif
                @endforeach
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
@include('layout.toast')
@include('layout.footer')

<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script src="{{ asset('js/gsap-3.9.1.min.js') }}"></script>
<script src="{{ asset("js/main.js") }}"></script>

<script>
    $(document).ready(function() {
        let scrollTimeout;

        $(window).on('scroll', function() {
            const $button = $('.button_open');

            $button.css('opacity', 1);

            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }

            scrollTimeout = setTimeout(function() {
                $button.css('opacity', 0);
            }, 4000);
        });
    });
</script>
</body>
</html>
