
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .login-container{
            width: 350px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .input-group{
            margin-bottom: 20px;
        }

        .input-group input{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .input-group input:focus{
            border-color: #4facfe;
            box-shadow: 0px 0px 5px rgba(79,172,254,0.5);
        }

        .btn-login{
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4facfe;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #2196f3;
        }

    </style>

</head>

<body>

    <div class="login-container">

        <h2>Tela de Login</h2>

        <form method="POST" action="login.php">

            <div class="input-group">

                <input type="text"
                       name="nome"
                       placeholder="Digite seu nome"
                       required>

            </div>

            <div class="input-group">

                <input type="email"
                       name="email"
                       placeholder="Digite seu email"
                       required>

            </div>

            <div class="input-group">

                <input type="password"
                       name="senha"
                       placeholder="Digite sua senha"
                       required>

            </div>

            <input type="submit"
                   value="Entrar"
                   class="btn-login">

        </form>

    </div>

</body>

</html>

