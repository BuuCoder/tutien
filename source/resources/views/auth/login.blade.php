<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body>
<div class="wrapper_login">
    <div class="container_login">
        <a href="#" title="Trang chủ">
            <img class="title" src="{{ asset("images/components/tu-tien-gioi-3.png") }}" alt="Tu tiên giới"
                 title="Tu tiên giới">
        </a>
        <form method="POST" class="form-login" action="{{ route('login') }}">
            @csrf
            <img width="300" height="auto" src="{{ asset("images/components/bac-dau-co-tinh-vuc.png") }}"
                 alt="Bắc Đẩu cổ tinh vực"
                 title="Bắc Đẩu cổ tinh vực">
            <div class="group_input">
                <img class="icon" height="30" src="{{ asset("images/components/username.png") }}"
                     alt="Tên tài khoản"
                     title="Tên tài khoản">
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                       placeholder="Tên tài khoản">
            </div>

            <div class="group_input">
                <img class="icon" height="30" src="{{ asset("images/components/password.png") }}"
                     alt="Mật khẩu"
                     title="Mật khẩu">
                <input type="password" id="password" name="password" placeholder="Mật khẩu">
            </div>

            <div class="group_button">
                <button class="submit" title="Đăng nhập">
                    <img src="{{ asset("images/components/button-dang-nhap.png") }}"
                         alt="Đăng nhập"
                         title="Đăng nhập">
                </button>
                <a href="/dang-nhap/google" target="_parent" class="btn-google" title="Đăng nhập Google">
                    <img src="{{ asset("images/components/button-dang-nhap-google.png") }}"
                         alt="Đăng nhập Google"
                         title="Đăng nhập Google">
                </a>
            </div>
        </form>
    </div>
</div>
@include('layout.toast')
<script>
    document.querySelector('.close').addEventListener('click', function () {
        document.querySelector('.toast-panel').style.display = 'none';
    });
</script>
</body>
</html>

