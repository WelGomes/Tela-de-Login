<?php
    //Conectar ao banco de dados e verificar conexão
    include("conectarBancoDeDadosLoginECadastro.php");
    session_start();

    session_destroy();

    header("Location: telaInicial.php");
?>