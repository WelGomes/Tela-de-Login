<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bancoDeDados = "cadastro";

    $connect = new mysqli($host, $usuario, $senha, $bancoDeDados);

    if($connect->connect_error){
        die("Falha na conexão". $connect_error);
    }
?>