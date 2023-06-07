<?php
    //Recebendo dados do formulário
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $senha = $_POST['senha'];

   //Conectar ao banco de dados
   $connect = new mysqli('localhost', 'root', '','cadastro');
   //Verificar conexão
   if($connect->connect_error){
        die("Falha na conexão". $connect_error);
   }

   //Consultar o banco de dados e verificar se o email é existente
   $verificar = $connect->prepare("SELECT * FROM usuarios WHERE email = ?");
   $verificar->bind_param('s', $email);
   $verificar->execute();
   $verificar->store_result();
   
   //Vai conferir se o email existe
   if($verificar->num_rows > 0){
        //Se existir, ele vai armazenar o email e senha
        $verificar->bind_result($id, $emailArmazenado, $senhaArmazenada);
        $verificar->fetch();
        //Vai conferir a senha
        if(password_verify($senha, $senhaArmazenada)){
            //Caso o "Salvar dados" esteja marcado
            if(isset($_POST['salvar'])){
                setcookie('email', $emailArmazenado, time() + (86400 * 30), '/'); //Cookie vai durar por 30 dias
            } else {
                //Caso o "Salva dados" esteja desmarcado
                if(isset($_COOKIE['email'])){
                    setcookie('email', '', time() - 3600, '/');
                }
            }
            echo "<script>alert('Você logou');
            window.location.href='home.php'</script>";
            exit;
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
            header("Refresh: 0 ; telaInicial.php");
            exit;
        }
    } else {
        echo "<script>alert('Email incorreto!');</script>";
        header("Refresh: 0 ; telaInicial.php");
        exit;
    }
    $connect->close();
?>
