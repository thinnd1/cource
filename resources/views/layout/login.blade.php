<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form class="form-signin" action="{{ route('postLogin') }}" method="post">
        @csrf

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label for="inputUsername">Login</label>
            <input type="text" name="login" class="form-control username" value="{{ old("login") }}" aria-describedby="emailHelp" placeholder="Login type">
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="mdp" class="form-control password" placeholder="Password type">
            @error('mdp')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <a href="{{ route('signup') }}">Đăng ký tài khoản</a>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

</body>
</html>
