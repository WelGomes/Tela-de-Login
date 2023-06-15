<?php
    //Conectar ao banco de dados e verificar conexão
    include("conectarBancoDeDadosLoginECadastro.php");

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = htmlspecialchars($_POST['senha'], ENT_QUOTES);
    $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

    if($email == '' || $senha == ''){
        echo "<script>alert('Preencha os campos');</script>";
        header("Refresh: 0 ; telaDeRegistro.php");
    }

     //Verificar se existe esse email
     $verificar = $connect->prepare("SELECT email FROM usuarios WHERE email = ?");
     $verificar->bind_param('s', $email);
     $verificar->execute();
     $verificar->store_result();
     if($verificar->num_rows > 0){
         echo "<script>alert('Esse email já existe');</script>";
         header("Refresh: 0 ; telaDeRegistro.php");
         die();
     } else {
        $inserir = $connect->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $inserir->bind_param("ss", $email, $senhaCripto);
        $inserir->execute();

        if ($inserir->num_rows === 0) {
            echo "<script>alert('Email cadastrado com sucesso');
            window.location.href='telaInicial.php'</script>";
            exit;
        } else {
            echo "<script>Não foi possível cadastrar email</script>";
            header("Refresh: 0; telaDeRegistro.php");
            exit;
        }
    }
    $connect->close();
?>
