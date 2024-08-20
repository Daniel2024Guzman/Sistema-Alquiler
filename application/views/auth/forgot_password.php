<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url()?>assets/img/favicon.ico" type="image/x-icon">
    <title>LOGIN</title>
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
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            padding: 30px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .container h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .container span {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            display: block;
        }

        .container input {
            background-color: #f1f1f1;
            border: none;
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 8px;
            width: 100%;
            margin: 10px 0;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .container input:focus {
            background-color: #e0e0e0;
        }

        .container button {
            background-color: #0caec4;
            color: #fff;
            font-size: 14px;
            padding: 12px 0;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button:hover {
            background-color: #0b95a7;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Has olvidado tu contraseña</h1>
        <span>Introduce tu correo electrónico</span>
        <form method="POST" action="<?= base_url()?>Auth/forgotPassword">
            <input id="email" placeholder="Email" type="email" name="email" required autofocus autocomplete="off" />
           <!-- @if (isset($error))
                <p style="color: red;">{{ $error }}</p>
            @endif
            @if (isset($success))
                <p style="color: rgb(43, 212, 21);">{{ $success }}</p>
            @endif-->
            <button type='submit'>Enviar</button>
        </form>
    </div>
</body>

</html>
