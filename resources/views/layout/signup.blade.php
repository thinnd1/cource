<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <title> Đặng ký </title>
</head>
<body>
<div class="container">
    <h2>Đăng ký thành viên</h2>
    <form class="form-signup" action="{{ route('signup') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inputUsername">Tên Đăng Nhập*</label>
            <input type="text" name="username" class="form-control username" value="{{ old("username") }}" id="inputUsername"
                   placeholder="Nhập tên đăng nhập">
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputRole">Role</label>
            <select name="user_type" class="form-control">
                <option value="etudiant">Etudiant</option>
                <option value="enseignant">Enseignant</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputPassword">Mật Khẩu*</label>
            <input type="password" name="mdp" class="form-control password" value="{{ old("mdp") }}" id="inputPassword"
                   placeholder="Nhập mật khẩu">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <p>Đã có tài khoản, <a href="{{ route('login') }}">Đăng nhập</a></p>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>

</body>
</html>
