<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bancoDeDados = "todo";

    $connect = new mysqli($host, $usuario, $senha, $bancoDeDados);

    if($connect->connect_error){
        die("Falha ao conectar com o banco de dados". $connect->connect_error);
    }
?>