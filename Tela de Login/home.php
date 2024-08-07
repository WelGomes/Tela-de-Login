<?php
  session_start();

  // Verifica se a variável de sessão está definida e se o usuário está logado
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
      // Redireciona o usuário para a página de login ou exibe uma mensagem de erro
      header("Location: telaInicial.php");
      exit;
  }

  // Restante do código da página protegida aqui
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleToDo.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>To - do List</title>
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-black">
        <div class="col-11">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <form class="d-flex" role="search" action="finalizarSessao.php" method="post">
                  <button class="btn btn-outline-danger" type="submit" title="Finalizar sessão">X</button>
                </form>
              </li>
            </ul>
          </div>
        </nav>

      <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 border border-success bg-light">
            <div class="row">
              <div class="col text-center my-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                </svg>
              </div>
            </div>
            <form action="todoAdicionar.php" method="post">
              <div class="row">
                <div class="col-sm-9">
                    <input class="form-control form-control-lg border-success" type="text" placeholder="Informe a tarefa" aria-label=".form-control-lg example" name="tarefas" id="tarefas">
                </div>
                <div class="col mb-4">
                    <button type="submit" class="btn btn-outline-success" name="adicionar" id="adicionar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                </div>
              </div>
            </form>
            <div class="container text-center">
              <div class="row align-items-center">
                <table class= 'col mb-3'>
                     <?php
                      include("conectarBancoDeDadosToDo.php");

                      // Executa uma consulta SQL para selecionar todas as linhas da tabela 'lista'
                      $result = $connect->query("SELECT * FROM lista");
                      // Loop através de cada linha retornada pela consulta
                      while($row = $result->fetch_assoc()){ ?>
                        <!--Define a cor do texto como verde se a tarefa estiver concluída, ou preta se não estiver-->         
                        <tr><td class="h5" style= "color: <?php echo $row['concluir'] == 0 ? 'black' : 'green'?>"><?php echo $row['tarefa']; ?></td><td>
                        <form action="todoBotoes.php" method="post">
                          <button class="btn btn-outline-success" type="submit" name='concluir' value='<?php echo $row['id'];?>'>Concluir</button>
                          <button class="btn btn-outline-danger " type="submit" name='excluir' value='<?php echo $row['id'];?>'>Excluir</button>
                        </form>
                      <?php
                      }
                      ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
