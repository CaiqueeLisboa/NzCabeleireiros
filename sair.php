<?php
    session_start();   
    unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['telefone_fixo'],
        $_SESSION['telefone_celular'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioSenha']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    //redirecionar o usuario para a página de login
    header("Location:login/login.php");
?>
