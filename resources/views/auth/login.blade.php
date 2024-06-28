<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Seu Estilo CSS Adicional -->
    <style>
        .login-container {
            /* Estilos personalizados */
            background-color: #f0f0f0;
            /* Adicione outros estilos conforme necessário */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-content {
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px; /* Ajuste conforme necessário */
            display: block;
            margin: 0 auto; /* Centraliza a logo horizontalmente */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #835eff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #6a3eff;
        }
        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #6a3eff;
            text-decoration: none;
        }
    </style>
</head>
<body class="login-container">
    <div class="login-content">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required autocomplete="current-password">
            </div>

            <button type="submit">Login</button>

            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                @endif
            </div>
        </form>
    </div>
</body>
</html>
