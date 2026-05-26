<?php
session_start();

require "Usuario.class.php";
$usuario = new Usuario();

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conn = $usuario->conecta();
    
    if($conn){
        $user = $usuario->checkUser($email);

        if(!$user){
            $user = $usuario->inserirUsuario($nome, $email, $senha);

            if($user){
                $_SESSION['nome'] = $nome;
                header("Location: home.php");
                exit;
            } else {
                echo "Erro ao cadastrar o usuário";
            }

        } else {
            echo "Usuário já cadastrado. Faça login";
            exit();
        }

    } else {
        echo "Banco indisponível, tente mais tarde!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <h2>Cadastro de Usuario</h2>
    <form action="" method ="post">
        <input type="text"     name = "nome"    placeholder = "Informe seu nome">  <br>
        <input type="text"     name = "email"   placeholder = "Informe o email">   <br>
        <input type="password" name = "senha"   placeholder = "Informe sua senha"> <br>
        <input type="submit"   name=  "botao"   value="Cadastrar">
    </form> 
    
</body>
</html>