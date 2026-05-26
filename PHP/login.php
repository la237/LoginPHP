<?php
session_start();

require "Usuario.class.php";

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $usuario->conecta();

    if($usuario->checkUser($email)){

        if($usuario->checkPass($email, $senha)){
            $_SESSION['nome'] = $nome;
            header("Location: home.php");
            exit;
        } else {
            echo "Senha incorreta!";
        }

    } else {

        $usuario->inserirUsuario($nome, $email, $senha);
        $_SESSION['nome'] = $nome;
        header("Location: home.php");
        exit;
    }

} else {
    echo "Preencha todos os campos!";
}
?>