<?php
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $emailUsuario = 'welbert.@gmail.com';
    $senhaUsuario = 123;

    if($email == '' ||  $senha == '') {
        echo "<script>alert('ERRO! Insira o email ou senha corretamente!');</script>";
        header("Refresh: 0 ; index.php");
    } else if($email != $emailusuario && $senha != $senhaUsuario) {
        echo "<script>alert('Email ou senha inválido');</script>";
        header("Refresh: 0 ; index.php");
    } else {
        echo "<script>alert('Logado');</script>";
        header("Location: https://www.youtube.com");
    }
?>
