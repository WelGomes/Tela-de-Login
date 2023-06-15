<?php
    // Conectar ao banco de dados e verificar conexão
    include("conectarBancoDeDadosToDo.php");


    if(isset($_POST['tarefas'])){
        $tarefas = filter_var($_POST['tarefas'], FILTER_SANITIZE_STRING);
        $inserir = $connect->prepare("INSERT INTO lista (tarefa, concluir) VALUE (?, 0)");
        $inserir->bind_param("s", $tarefas);
        $inserir->execute();
    }
    header("Location: home.php");
?>
