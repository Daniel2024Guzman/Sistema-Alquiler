<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/login.css">
    <link rel="icon" href="<?= base_url()?>assets/img/favicon.ico" type="image/x-icon">
    <title>LOGIN</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="<?= base_url()?>Auth/login">
                <h1>Iniciar session</h1>
                <br><br>
                <span>contraseña y correo electrónico</span>
                <input id="email" placeholder="Email" type="email" name="email" required autofocus autocomplete="username" />
                <input id="password" placeholder="Password" type="password" name="contraceña" required autocomplete="current-password" />
                <a href="<?= base_url('Auth/forgotPassword') ?>">¿Olvidaste tu contraseña?</a>
<!--es comúnmente utilizado para mostrar mensajes de error o advertencias en aplicaciones web desarrolladas con Laravel.-->
                @if (isset($error))
                    <p style="color: blue;">{{ $error }}</p>
                @endif
                <button type='submit' >INICIAR SESSION</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>CONSTRUCTORA GUZMAN</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>