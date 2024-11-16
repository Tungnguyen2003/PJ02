<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="container">
        @include('message')
        <div class="wrapper">
            <div class="tittle"><span> Forgot Password Page </span></div>
            <form>
                    <div class="row">
                        <i class=" fas fa-user"></i>
                        <input type ="text" valua="" placeholder="Email" required name="email">
                    </div>
                    <div class="pass"> <a href="{{ url('login') }}">Login</a>
                    </div>
                    <div class="button input-register">
                        <input type="submit" value="Confirm">
                    </div>
                    <div class="signup-link"> Join Now? <a href="{{ url('resigter' ) }}"> Resigter </a></div>
                    <div class="signup-link"> Welcome Page? <a href="{{url('/')}}"> Welcome Page </a></div>
                    </div>
            </form>
        </div>
    </div>

</body>
</html>
