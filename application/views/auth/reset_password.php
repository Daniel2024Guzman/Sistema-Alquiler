<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Restablecer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #bdbdbd, #3d3d42);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        .input-group i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        button {
            background-color: #0caec4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #008c9e;
        }
        .container .info {
            margin-top: 15px;
            font-size: 12px;
            color: #666;
        }

        .container .info a {
            color: #3498db;
            text-decoration: none;
        }

        .container .info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Restablecer Contraseña</h1>
    <form method="POST" action=" ">
        <div class="input-group">
            <input type="password" id="newPassword" name="password" placeholder="Nueva Contraseña">
            <i class="fa fa-eye" id="togglePassword"></i>
        </div>
        <div class="input-group">
            <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirmar Contraseña">
            <i class="fa fa-eye" id="toggleConfirmPassword"></i> <br> <br>
    <!--    </div>
        @if (isset($error))
            <p style="color: red;">{{ $error }}</p>
            <br>
        @endif
        @if (isset($success))
            <p style="color: rgb(43, 212, 21);">{{ $success }}</p>
            <br>
        @endif-->

        <button type="submit">Restablecer</button>
    </form>
    <div class="info">
        <p>¿Recordaste tu contraseña? <a href="<?= base_url()?>Auth/login">Inicia sesión</a></p>
    </div>
</div>



</body>
</html>
