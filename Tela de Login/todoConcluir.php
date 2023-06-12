
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
        if ($concluir->execute()) {
            echo "Tarefa marcada como concluída com sucesso.";
        } else {
            echo "Erro ao marcar tarefa como concluída: " . $concluir->error;
        }
    }
?>