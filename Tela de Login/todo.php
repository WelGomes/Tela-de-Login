<?php
    $connect = new mysqli("localhost", "root", "", "todo");
    if($connect->connect_error){
        die("Falha ao conectar com o banco de dados". $connect->connect_error);
    }

    if(isset($_POST['tarefas'])){
        $tarefas = filter_var($_POST['tarefas'], FILTER_SANITIZE_STRING);
        $inserir = $connect->prepare("INSERT INTO lista (tarefas) VALUE (?)");
        $inserir->bind_param("s", $tarefas);
        $inserir->execute();
    }
    header("Location: home.php");
?>