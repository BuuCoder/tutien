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
        <img loading="lazy" class="button_close" width="40" height="40"
             src="{{ asset('images/components/button-close.png') }}"
             alt="Đóng Menu" title="Đóng Menu"
        >
        <li class="item_menu_game">
            <a href="" title="Thương Hội">
                <img loading="lazy"
                     src="{{ asset('images/components/button-thuong-hoi.png') }}"
                     alt="Thương Hội" title="Thương Hội">
            </a>
            <a class="active" href="javascript:void(0)" title="Thương Hội">
                <img loading="lazy"
                     src="{{ asset('images/components/button-thuong-hoi-active.png') }}"
                     alt="Thương Hội" title="Thương Hội">
            </a>
        </li>
        <li class="item_menu_game">
            <a href="/bao-danh-hang-ngay" title="Tu Luyện">
                <img loading="lazy"
                     src="{{ asset('images/components/button-tu-luyen.png') }}"
                     alt="Tu Luyện" title="Tu Luyện">
            </a>
            <a class="active" href="javascript:void(0)" title="Tu Luyện">
                <img loading="lazy"
                     src="{{ asset('images/components/button-tu-luyen-active.png') }}"
                     alt="Tu Luyện" title="Tu Luyện">
            </a>
        </li>
        <li class="item_menu_game main">
            <a href="/" title="Chính Điện">
                <img loading="lazy" class="main"
                     src="{{ asset('images/components/button-chinh-dien.png') }}"
                     alt="Chính Điện" title="Chính Điện">
            </a>
            <a class="active" href="javascript:void(0)" title="Chính Điện">
                <img loading="lazy" class="main"
                     src="{{ asset('images/components/button-chinh-dien-active.png') }}"
                     alt="Chính Điện" title="Chính Điện">
            </a>
        </li>
        <li class="item_menu_game active">
            <a href="/tai-khoan" title="Tài Khoản">
                <img loading="lazy"
                     src="{{ asset('images/components/button-tai-khoan.png') }}"
                     alt="Tài Khoản" title="Tài Khoản">
            </a>
            <a class="active" href="javascript:void(0)" title="Tài Khoản">
                <img loading="lazy" class="main"
                     src="{{ asset('images/components/button-tai-khoan-active.png') }}"
                     alt="Tài Khoản" title="Tài Khoản">
            </a>
        </li>
        <li class="item_menu_game">
            <a href="/dang-xuat" title="Đăng xuất">
                <img loading="lazy"
                     src="{{ asset('/images/components/button-dang-xuat.png') }}"
                     alt="Đăng xuất" title="Đăng xuất">
            </a>
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

            @if ($user['badge'])
                <div class="badge friend">
                    @foreach($user['badge'] as $badgeId)
                        @php
                            $badge_image = $allBadges[$badgeId]['badge_image'];
                            $badge_name = $allBadges[$badgeId]['badge_name'];
                            $badge_type = $allBadges[$badgeId]['badge_type'];
                        @endphp
                        @if ($badge_image && $badge_type == "friend")
                            <img src="{{ asset('/images/badge/'.$badge_type.'/'. $badge_image) }}"
                                 alt="{{ $badge_name }}"
                                 title="{{ $badge_name }}">
                        @endif
                    @endforeach
                </div>
                <div class="badge jewelry">
                    @foreach($user['badge'] as $badgeId)
                        @php
                            $badge_image = $allBadges[$badgeId]['badge_image'];
                            $badge_name = $allBadges[$badgeId]['badge_name'];
                            $badge_type = $allBadges[$badgeId]['badge_type'];
                        @endphp
                        @if ($badge_image && $badge_type == "jewelry")
                            <img src="{{ asset('/images/badge/'.$badge_type.'/'. $badge_image) }}"
                                 alt="{{ $badge_name }}"
                                 title="{{ $badge_name }}">
                        @endif
                    @endforeach
                </div>
                <div class="badge fire">
                    @foreach($user['badge'] as $badgeId)
                        @php
                            $badge_image = $allBadges[$badgeId]['badge_image'];
                            $badge_name = $allBadges[$badgeId]['badge_name'];
                            $badge_type = $allBadges[$badgeId]['badge_type'];
                        @endphp
                        @if ($badge_image && $badge_type == "fire")
                            <img src="{{ asset('/images/badge/'.$badge_type.'/'. $badge_image) }}"
                                 alt="{{ $badge_name }}"
                                 title="{{ $badge_name }}">
                        @endif
                    @endforeach
                </div>
            @endif
            <div class="left_box name_account">
                <div class="line name"><span class="label">Danh Xưng </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}">{{ $user['name'] }}</p>
                </div>
                <div class="line point"><span class="label">Tu vi </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}"><span class="num">{{ $user['points'] }}/{{ $allRanks[$user['level_id']]['rank_milestone'] }}</span>
                        ({{ $allRanks[$user['level_id']]['rank_name'] }})</p>
                </div>
                <div class="line longevity"><span class="label">Tuổi thọ </span>
                    <p class="{{ $allRanks[$user['level_id']]['rank_class_name'] }}"><span class="num">198</span> tuổi
                    </p>
                </div>
                <div class="line maxim">
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
                    <p class="money">
                        Nguyên Tiên Thạch: <span class="num">{{$user['money']}}</span>
                        <img width="18" src="{{ asset('/images/gem/bach-ngoc.png') }}" alt="Tiên nguyên thạch"
                             title="Tiên nguyên thạch">
                    </p>
                </div>

                @foreach($user['item'] as $itemId => $itemQuantity)
                    @if($itemQuantity > 0)
                        <div class="square">
                            <img
                                src="{{ asset('/images/'.strtolower($allItems[$itemId]['item_type']).'/'. $allItems[$itemId]['item_image']) }}"
                                alt="">
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
                        @if(empty($logData))
                            <tr>
                                <td colspan="2" style="text-align:center">Chưa có lịch sử nào.</td>
                            </tr>
                        @else
                            @foreach($logData as $log)
                                <tr>
                                    <td>{{ date('d/m/Y H:i:s', $log['created_at']) }}</td>
                                    <td>{{ $log['description'] }}</td>
                                </tr>
                            @endforeach
                        @endif
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
    $(document).ready(function () {
        let scrollTimeout;

        $(window).on('scroll', function () {
            const $button = $('.button_open');

            $button.css('opacity', 1);

            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }

            scrollTimeout = setTimeout(function () {
                $button.css('opacity', 0);
            }, 4000);
        });
    });
</script>
</body>
</html>
