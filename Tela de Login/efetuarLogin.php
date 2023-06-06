<?php
    //Recebendo dados do formulário
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

   //Conectar ao banco de dados
   $connect = new mysqli('localhost', 'root', '','cadastro');
   //Verificar conexão
   if($connect->connect_error){
        die("Falha na conexão". $connect_error);
   }

   //Consultar o banco de dados e verificar se o email é existente
   $verificar = $connect->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
   $verificar->bind_param("ss", $email, $senha);
   $verificar->execute();
   $verificar->store_result();

   if($verificar->num_rows > 0){
        $verificar->bind_result($id, $email, $senhaArmazenada);
        $verificar->fetch();

        if(password_verify($senha, $senhaArmazenada)){
            //Verificar se a checkbox "Salvar dados" está marcada
            if(isset($_POST['salvar'])){
                setcookie('email', $email, time() + (86400 * 30), '/'); //Cookie válido por 30 dias
            } else {
                //Remove o cookie existente se houver
                if(isset($_COOKIE['email'])){
                    setcookie('email', '', time() - 3600, '/');
                }
            }
            echo "<script>alert('Você logou!');</script>";
            header("Location: home.php");
            exit;
        } else {
            echo "<script>alert('ERRO! Email ou senha incorreta');</script>";
            header("Refresh: 0 ; telaInicial.php");
            exit;
        }
    } else {
        echo "<script>alert('ERRO! Email ou senha incorreta');</script>";
        header("Refresh: 0 ; telainicial.php");
        exit;
   }

   //Fechar conexão com o banco de dados
   $connect->close();
?>
