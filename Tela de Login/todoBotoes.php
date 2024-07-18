<?php
    // Conectar ao banco de dados e verificar conexão
    include("conectarBancoDeDadosToDo.php");

    if(isset($_POST['concluir'])){
        $id = $_POST['concluir'];
        
        $tarefaClicada = $connect->prepare("SELECT id FROM lista WHERE id = ?");
        $tarefaClicada->bind_param("i", $id);
        $tarefaClicada->execute();
        
        $result = $tarefaClicada->get_result();

        $concluirValor = 0;
        
        foreach($result as $row){
            $concluirValor = $row['concluir'];
        }

        $concluir = $connect->prepare("UPDATE lista SET concluir = ? WHERE id = ?");
        $novoValorConcluir = $concluirValor == 0 ? 1 : 0;
        $concluir->bind_param("ii", $novoValorConcluir, $id);
        $concluir->execute();

        $linhasAfetadas = $concluir->affected_rows;

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
