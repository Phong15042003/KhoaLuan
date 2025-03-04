<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('img/background.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="form-box login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <div class="input-box">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input id="password" type="password" name="password" required placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>or login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password_confirmation" required placeholder="Repeat Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Register</button>
                <p>or register with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Chào mừng đến với hệ thống quản lý chương trình đào tạo</h1>
                <p>Bạn không có tài khoản?</p>
                <button class="btn register-btn">Đăng ký</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Bạn đã có tài khoản?</p>
                <button class="btn login-btn">Đăng nhập</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>

</body>

</html>