<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu tiên giới - Đăng nhập - Game By MajinBuu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
</head>
<body>
<div class="wrapper_login">
    <div class="container_login">
        <a href="#" title="Trang chủ">
            <img class="title" src="{{ asset("images/tu-tien-gioi-3.png") }}" alt="Tu tiên giới" title="Tu tiên giới">
        </a>

        <form method="POST" class="form-login" action="{{ route('login') }}">
            @csrf
            <img width="300" height="auto" src="{{ asset("images/bac-dau-co-tinh-vuc.png") }}" alt="Bắc Đẩu cổ tinh vực"
                 title="Bắc Đẩu cổ tinh vực">
            <div class="group_input">
                <img class="icon" height="30" src="{{ asset("images/username.png") }}" alt="">
                <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Tên tài khoản">
            </div>

            <div class="group_input">
                <img class="icon" height="30" src="{{ asset("images/password.png") }}" alt="">
                <input type="password" id="password" name="password" placeholder="Mật khẩu">
            </div>

            <div class="group_button">
                <button class="submit" title="Đăng nhập">
                    <img src="{{ asset("images/button-dang-nhap.png") }}" alt="Đăng nhập" title="Đăng nhập">
                </button>
                <a href="/dang-nhap/google" target="_parent" class="btn-google" title="Đăng nhập Google">
                    <img src="{{ asset("images/button-dang-nhap-google.png") }}" alt="Đăng nhập Google" title="Đăng nhập Google">
                </a>
            </div>
        </form>
    </div>
</div>
<div class="toast-panel">
    @if(session('success'))
        <div class="toast-item success">
            <div class="toast success">
                <label for="t-success" class="close"></label>
                <h3>Thành công!</h3>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="toast-item error">
            <div class="toast error">
                <label for="t-error" class="close"></label>
                <h3>Lỗi!</h3>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif
</div>
</body>
</html>

