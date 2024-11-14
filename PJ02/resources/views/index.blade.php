<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    
    <div class="containet">
        <div class="wrapper">
            <div class="tittle"><span> Welcome Page </span></div>
            <form>
                <div class="signup-link"> Sign In? <a href="{{ url('login') }}"> Login </a></div>
                <div class="signup-link"> Join Now? <a href="{{ url('resigter' ) }}"> Resigter </a></div>
        </div>
    </div>
</body>
</html>