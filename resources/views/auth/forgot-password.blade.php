<!-- resources/views/auth/forgot-password.blade.php -->

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
        .forgot-password-container {
            /* Estilos personalizados */
            background-color: #f0f0f0;
            /* Adicione outros estilos conforme necessário */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .forgot-password-content {
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
        .back-to-login {
            text-align: center;
            margin-top: 20px;
        }
        .back-to-login a {
            color: #6a3eff;
            text-decoration: none;
        }
    </style>
</head>
<body class="forgot-password-container">
    <div class="forgot-password-content">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </div>
        <h2>Esqueceu sua senha?</h2>
        <p>Informe seu endereço de e-mail registrado para receber instruções de redefinição de senha.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Seu e-mail registrado" required autocomplete="email" autofocus>
            </div>

            <button type="submit">Enviar Link de Redefinição de Senha</button>
        </form>

        <div class="back-to-login">
            <a href="{{ route('login') }}">Voltar para o login</a>
        </div>
    </div>
</body>
</html>
