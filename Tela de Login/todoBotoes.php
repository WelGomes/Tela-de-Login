<?php
    $connect = new mysqli("localhost", "root", "", "todo");
    if($connect->connect_error){
        die("Falha ao conectar com o banco de dados". $connect->connect_error);
    }

    if(isset($_POST['concluir'])){
        $id = $_POST['concluir'];
        $concluir = $connect->prepare("UPDATE lista SET concluir = 1 WHERE id = ?");
        $concluir->bind_param("i", $id);
        $concluir->execute();
        $linhasAfetadas = $concluir->affected_rows;
        if($linhasAfetadas > 0){
            $cor = "green";
            echo "<span style='color: " . $cor . "'>" . $id . "</span>";
        }
        header("Location: home.php");
    }

    if(isset($_POST['excluir'])){
        $id = $_POST['excluir'];
        $excluir = $connect->prepare("DELETE FROM lista WHERE id = ?");
        $excluir->bind_param("i", $id);
        $excluir->execute();
        header("Location: home.php");
    }


    
?>
