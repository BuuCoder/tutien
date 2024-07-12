<!DOCTYPE html>
<html lang="en">
@include('layout.header')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body::after {
        background-image: url('/images/background/background_phong_canh_23.jpg');
        background-size: cover;
    }
    .chatroom {
        width: 100%;
        display: flex;
        flex-direction: row;
        gap: 30px;
        padding: 20px;
        background: rgba(0, 0, 0, 0.6);
        margin-bottom: 50px;
        border-radius: 20px;
    }

    #chat {
        width: 100%;
        max-width: 100%;
        max-height: calc(100vh - 170px);
        background: url('/images/background/background_phong_canh_21.jpg');
        background-size: cover;
        background-position: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    #chat::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 1;
        top: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    #chat .title{
        width: 100%;
        background: rgba(0, 0, 0, 0.3);
        margin: 0;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 10px;
        font-family: "Great Vibes", cursive;
        font-size: 30px;
    }

    #messages {
        list-style: none;
        margin: 0;
        height: 100%;
        min-height: calc(100vh - 170px);
        overflow-y: auto;
        border-bottom: 1px solid #fff;
        z-index: 2;
        position: relative;
    }

    #messages::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.6);
        background-color: #fff;
    }

    #messages::-webkit-scrollbar {
        width: 3px;
        background-color: #F5F5F5;
    }

    #messages::-webkit-scrollbar-thumb {
        background-color: #FFF;
        background-image: -webkit-linear-gradient(90deg,
        rgb(60, 60, 60) 0%,
        rgba(60, 60, 60, 1) 25%,
        transparent 100%,
        rgba(60, 60, 60) 75%,
        transparent)
    }

    #messages li {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        width: fit-content;
        min-width: 250px;
        max-width: 70%;
        word-wrap: break-word;
    }

    .my-message {
        align-self: flex-start;
        text-align: right;
        margin-left: auto;
        color: #fff;
    }

    .my-message .message {
        background: rgba(0, 0, 0, 0.6);
        border: 2px solid #fff;
    }

    .other-message {
        align-self: flex-end;
        text-align: left;
        margin-right: auto;
        color: white;
    }

    .other-message .message{
        background: rgba(255, 255, 255, 0.7);
        color: black;
        border: 2px solid #ffffff;
    }

    .username {
        font-weight: bold;
    }

    .time {
        color: #bbb;
        font-size: 0.8em;
        margin-bottom: 5px;
    }

    .message {
        font-size: 15px;
        font-weight: 400;
        padding: 10px 15px;
        border-radius: 10px;
    }

    .status {
        font-size: 0.8em;
        color: #999;
        margin-top: 5px;
    }

    #message-container {
        display: flex;
        padding: 10px;
        border: none;
        z-index: 2;
        position: relative;
        gap: 10px;
    }

    #message {
        flex: 1;
        padding: 15px;
        border-radius: 10px;
        font-size: 1em;
        background: rgba(0, 0, 0, 0.5);
        color: #ffffff;
        border: 1px solid white;
        outline: none;
    }

    #message::placeholder{
        color: white;
        font-size: 14px;
    }

    #send {
        min-width: 65px!important;
        width: 65px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        color: #ff0000;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    #send:hover {
        background: #c8c8c8;
    }

    #send svg {
        width: 30px;
        height: 30px;
        fill: black;
    }

    @media (max-width: 765px){
        .chatroom{
            flex-direction: column;
            gap: 20px;
            margin-top: 100px;
            margin-bottom: 0;
            padding: 10px;
        }

        #chat, .banner{
            width: 100%;
        }
        #message{
            width: calc(100% - 20px);
            padding: 10px;
        }

        #send {
            min-width: 50px !important;
            width: 50px;
            height: 50px;
        }
        #send svg {
            width: 20px;
            height: 20px;
            fill: black;
        }
    }
</style>
<body>
<button class="musicButton" title="Nhạc nền">
    <img loading="lazy" class="open-music"
         src="{{ asset('images/components/open-music.png') }}"
         alt="Nhạc nền" title="Mở nhạc">
    <img loading="lazy" class="off-music"
         src="{{ asset('images/components/off-music.png') }}"
         alt="Nhạc nền" title="Tắt nhạc" style="display: none;">
</button>
<img loading="lazy" class="button_open show_button_open" width="40" height="40"
     src="{{ asset('images/components/button-open.png') }}"
     alt="Mở menu" title="Mở menu"
>
<img loading="lazy" class="logo_mobile" src="{{ asset('images/components/tu-tien-gioi-3.png') }}"
     alt="Tu Tiên Giới" title="Tu Tiên Giới">
<div class="wrapper_game">
    <div class="heading_game">
        <ul class="menu_game">
            <li class="item_menu_game">
                <a href="/thuong-hoi" title="Thương Hội">
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
            <li class="item_menu_game active">
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
            @if(session()->get('user'))
                <li class="item_menu_game">
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
            @else
                <li class="item_menu_game">
                    <a href="">
                        <img loading="lazy" src="{{ asset('images/components/button-luan-ban.png') }}" alt="">
                    </a>
                    <a class="active" href="javascript:void(0)">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-luan-ban-active.png') }}" alt="">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap" title="Đăng Nhập">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-dang-nhap.png') }}"
                             alt="Đăng Nhập" title="Đăng Nhập">
                    </a>
                </li>
            @endif
        </ul>
        <ul class="menu_game_mobile">
            <img loading="lazy" class="button_close" width="40" height="40"
                 src="{{ asset('images/components/button-close.png') }}"
                 alt="Đóng Menu" title="Đóng Menu"
            >
            <li class="item_menu_game">
                <a href="/thuong-hoi" title="Thương Hội">
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
            <li class="item_menu_game active">
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
            @if(session()->get('user'))
                <li class="item_menu_game">
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
            @else
                <li class="item_menu_game">
                    <a href="">
                        <img loading="lazy" src="{{ asset('images/components/button-luan-ban.png') }}" alt="">
                    </a>
                    <a class="active" href="javascript:void(0)">
                        <img loading="lazy" class="main"
                             src="{{ asset('images/components/button-luan-ban-active.png') }}" alt="">
                    </a>
                </li>
                <li class="item_menu_game">
                    <a href="/dang-nhap" title="Đăng Nhập">
                        <img loading="lazy"
                             src="{{ asset('images/components/button-dang-nhap.png') }}"
                             alt="Đăng Nhập" title="Đăng Nhập">
                    </a>
                </li>
            @endif
        </ul>

        <div class="chatroom">
            <div id="chat">
                <div class="title">
                    Tiên Giới Hội Quán
                </div>
                <ul id="messages">
                    <!-- Messages will be displayed here -->
                </ul>
                <div id="message-container">
                    <input type="text" id="message" placeholder="Aa">
                    <button id="send">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.01 21L23 12L2.01 3V10L17 12L2.01 14V21Z"/>
                        </svg>
                    </button>
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
        const $messagesElement = $('#messages');
        const $messageElement = $('#message');
        const $sendButton = $('#send');
        const user = JSON.parse(localStorage.getItem('user')); // Assuming user info is stored in localStorage

        // Listen for broadcasted messages
        window.Echo.channel('chat')
            .listen('MessageSent', function(e) {
                console.log(e);
                const message = e.message;
                const messageClass = message.user_id === {{ session()->get("user")['user_id'] }} ? 'my-message' : 'other-message';
                const messageItem = `
                <span class="username">${message.user_name}</span>
                <span class="time">(${moment(message.created_at).format('DD-MM-YYYY H:mm:ss')})</span>
                <li class="${messageClass}">
                    <span class="message">${message.message}</span>
                </li>
            `;
                $messagesElement.append(messageItem);
                $messagesElement.scrollTop($messagesElement[0].scrollHeight);
            });

        // Fetch messages
        axios.get('/messages')
            .then(function(response) {
                response.data.forEach(function(data) {
                    const messageClass = data.user_id === {{ session()->get("user")['user_id'] }} ? 'my-message' : 'other-message';
                    const messageItem = `
                    <span class="username">${data.user_name}</span>
                    <span class="time">(${moment(data.created_at).format('DD-MM-YYYY H:mm:ss')})</span>
                    <li class="${messageClass}">
                        <span class="message">${data.message}</span>
                    </li>
                `;
                    $messagesElement.append(messageItem);
                });
                $messagesElement.scrollTop($messagesElement[0].scrollHeight);
            });

        // Send message
        $sendButton.on('click', function() {
            const message = $messageElement.val().trim();

            if (!message) {
                console.error('Message is empty');
                return;
            }

            // Display the sent message immediately with "Sending..." status
            const tempMessageItem = $(`
            <span class="username">{{ session()->get("user")['name'] }}</span>
            <span class="time">(${moment().format('DD-MM-YYYY H:mm:ss')})</span>
            <li class="my-message">
                <span class="message">${message}</span>
                <span class="status">Đang gửi...</span>
            </li>
        `);
            $messagesElement.append(tempMessageItem);
            $messagesElement.scrollTop($messagesElement[0].scrollHeight);

            $messageElement.val('');
            // Send the message via API
            axios.post('/messages', {
                message: message
            })
                .then(function(response) {
                    // Update the temporary message status to "Sent"
                    tempMessageItem.find('.status').text('Đã gửi');
                })
                .catch(function(error) {
                    console.error('Error sending message:', error);
                    // Update the temporary message status to show an error
                    tempMessageItem.find('.status').text('Gửi thất bại');
                });
        });

        // Allow sending message by pressing Enter key
        $messageElement.on('keypress', function(e) {
            if (e.key === 'Enter') {
                $sendButton.click();
            }
        });
    });

</script>
</body>
</html>

