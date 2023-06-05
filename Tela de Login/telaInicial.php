<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="telaInicial.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
    <title>Tela de Login</title>
</head>
<body>
      <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 border border-2 border-black bg-light">
            <div class="row">
              <div class="col text-center my-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi        bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              </div>
            </div>
            <form action="efetuarLogin.php" method="post">
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3 ">
                    <input type="email" class="form-control border-black shadow-none" name="email" id="email"  placeholder="nome@exemplo.com">
                    <label for="email">Endereço de email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control border-black shadow-none" name="senha" id="senha" placeholder="senha">
                    <label for="senha">Senha</label>
                  </div>
                </div>
              </div>
              <div class="row my-3">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input border border-black bg-black" type="checkbox" name="salvar" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Salvar Dados
                    </label>
                  </div>
                </div>
                <div class="col-4">
                    <a class="icon-link icon-link-hover link-success" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="telaDeRegistro.php">
                        <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"></use></svg>
                        Registre-se
                    </a>
                </div>
              </div>
              <div class="row my-3">
                <div class="col mb-2">
                  <div class="d-grid gap-2">
                    <button class="btn btn-outline-dark p-2 mb-2" type="submit">Enviar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>