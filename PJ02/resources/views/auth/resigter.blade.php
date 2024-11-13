<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resigter Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <!-- Hiển thị lỗi nếu có -->
        <span style="color: red;">{{ $errors->first('email') }}<br></span>
        <span style="color: red;">{{ $errors->first('password') }}<br></span>
        <span style="color: red;">{{ $errors->first('password_confirmation') }}<br></span>
        @include('message')

        <div class="wrapper">
            <div class="tittle"><span> Resigter Page </span></div>
            <!-- Form đăng ký -->
            <form action="{{ url('resigter_post') }}" method="post">
                {{ csrf_field() }}

                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" value="{{ old('name') }}" placeholder="Username" required name="name">
                </div>

                <div class="row">
                    <i class="fas fa-envelope"></i>
                    <input type="text" value="{{ old('email') }}" placeholder="Email" required name="email">
                </div>

                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required name="password">
                </div>

                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" required name="password_confirmation">
                </div>

                <div class="pass"> <a href="{{ url('forgot') }}">Forgot Password</a> </div>

                <div class="button input-register">
                    <input type="submit" value="Resigter">
                </div>

                <div class="signup-link"> Already have an account? <a href="{{ url('login') }}"> Login </a></div>
                <div class="signup-link"> Back to <a href="{{url('/')}}"> Welcome Page </a></div>
            </form>
        </div>
    </div>
</body>
</html>
