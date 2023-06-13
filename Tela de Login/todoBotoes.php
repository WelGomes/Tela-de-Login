<?php
    $connect = new mysqli("localhost", "root", "", "todo");
    if($connect->connect_error){
        die("Falha ao conectar com o banco de dados". $connect->connect_error);
    }

    if(isset($_POST['concluir'])){
        $concluir = $connect->prepare("UPDATE lista SET concluir = 1 WHERE concluir  = 0");
        $concluir->execute();
        header("Location: home.php");
        if ($_POST['concluir'] == 1) {
            $id = $_POST['tarefa'];
            echo "<span style='color: red;'>". $id. "</span>";
        }
    }

    if(isset($_POST['excluir'])){
        $id = $_POST['excluir'];
        $excluir = $connect->prepare("DELETE FROM lista WHERE id = ?");
        $excluir->bind_param("i", $id);
        $excluir->execute();
        header("Location: home.php");
    }

    
?>
