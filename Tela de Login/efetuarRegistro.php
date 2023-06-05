<?php

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = htmlspecialchars($_POST['senha'], ENT_QUOTES);
    $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

    //Criar conexão
    $connect = new mysqli('localhost', 'root', '', 'cadastro');
    
    //Verificar a conexão
    if($connect->connect_error) {
        die("Falha na conexão: ".$connect->connect_error);
    }
    
    $query_select = "SELECT email FROM usuarios WHERE email = '$email'";
    $select = $connect->query($query_select);
    if($select-> num_rows > 0) {
        echo "<script>alert('Esse email já existe');</script>";
        header("Refresh: 0 ; telaDeRegistro.php");
        die();
        
    } else {
        $query = "INSERT INTO usuarios (email, senha) VALUE ('$email', '$senhaCripto')";
        if($email == '' || $senha == '') {
            echo "<script>alert('Preencha todos os campos!');</script>";
            header("Refresh: 0 ; telaDeRegistro.php");
        } else if($connect->query($query) === TRUE) {
            echo "<script>alert('Usuário cadastrado com sucesso!'); 
            window.location.href='telaInicial.php';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar esse usuário');</script>";
            header("Refresh: 0 ; telaDeRegistro");
        }
    }

?>