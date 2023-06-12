
<?php
    $connect = new mysqli("localhost", "root", "", "todo");
    if($connect->connect_error){
        die("Falha ao conectar com o banco de dados". $connect->connect_error);
    }

    if(isset($_POST['excluir'])){
        $id = $_POST['excluir'];
        $concluir = $connect->prepare("DELETE FROM lista WHERE id = ?");
        $concluir->bind_param("i", $id);
        $concluir->execute();
        if ($connect->query($sql) === TRUE) {
            echo "Linha excluída com sucesso.";
        } else {
            echo "Erro ao excluir linha: " . $connect->conect_error;
        }
    }
?>