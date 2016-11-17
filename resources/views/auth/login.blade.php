<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/login.css') }}" />
</head>
<body>

<div class="container">
    <div class="card card-container">
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <strong class="text-center">{{ Session::get('error') }}</strong>
            </div>
        @endif
        <img id="profile-img" class="profile-img-card" src="{{ asset('resources/assets/images/logo.png') }}" />
        <p id="profile-name" class="profile-name-card">DOH DTR</p>
        <form class="form-signin" action="{{ asset('/signin') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="username">
                    <span class="help-block hidden">
                        <strong>User your username</strong>
                    </span>
            </div>
            <div class="form-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" >
                    <span class="help-block hidden">
                        <strong>Use your password</strong>
                    </span>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
<script src="{{ asset('resources/assets/js/jquery/jquery.js') }}"></script>
<script src="{{ asset('resources/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/script.js') }}"></script>
</body>
</html>