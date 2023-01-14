<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>Authorization Form</title>
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<div class="container">
    @error('any_errors')
    {{$message}}
    @enderror
    <h2 class="center-align">Авторизация</h2>
    <form method="POST" action="{{route('auth')}}">
        @csrf
        <div class="input-field">
            <input id="client_name" type="text" class="validate" name="name">
            <label for="client_name">Имя/Email</label>
        </div>
        @error('name')
        {{$message}}
        @enderror
        <div class="input-field">
            <input id="client_password" type="password" class="validate" name="password">
            <label for="client_password">Пароль</label>
        </div>
        @error('password')
        {{$message}}
        @enderror
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">
                <i class="material-icons right">Войти</i>
            </button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
