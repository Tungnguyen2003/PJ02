<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resigter Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="containet">
        <div class="wrapper">
            <div class="tittle"><span> Resigter Page </span></div>
            <form>
                    <div class="row">
                        <i class=" fas far-user"></i>
                        <input type ="text" valua="" placeholder="Username" required name="name">
                    </div>
                    <div class="row">
                        <i class=" fas far-user"></i>
                        <input type ="text" valua="" placeholder="Email" required name="email">
                    </div>
                    <div class="row">
                        <i class=" fas far-user"></i>
                        <input type ="text" valua="" placeholder="Password" required name="password">
                    </div>
                    <div class="row">
                        <i class=" fas far-user"></i>
                        <input type ="text" valua="" placeholder="Comfirm Password" required name="comfirm password">
                    </div>
                    <div class="pass"> <a href="">Forgot Password</a></div>
                    <div class="button input-register">
                        <input type="submit" value="Resigter">
                    </div>
                    <div class="signup-link"> Sign In?</div>
            </form>
        </div>
    </div>

</body>
</html>
