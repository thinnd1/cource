<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <title> Register </title>
</head>
<body>
<div class="container">
    <h2>Register User </h2>
    <form class="form-signup" action="{{ route('signup') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inputUsername">Login*</label>
            <input type="text" name="username" class="form-control username" value="{{ old("username") }}" id="inputUsername"
                   placeholder="Entrez votre nom">
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputPassword">Password*</label>
            <input type="password" name="mdp" class="form-control password" value="{{ old("mdp") }}" id="inputPassword"
                   placeholder="Entrez votre password">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputFormation">Formation</label>
            <select name="formation_id" class="form-control">
                @foreach($formation as $format)
                    <option value="{{ $format->id }}">{{ $format->intitule }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="inputRole">Role</label>
            <select name="user_type" class="form-control">
                <option value="etudiant">Etudiant</option>
                <option value="enseignant">Enseignant</option>
            </select>
        </div>

        <p>Deja registe, <a href="{{ route('login') }}"> Login </a></p>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</div>

</body>
</html>
