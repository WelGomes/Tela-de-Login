<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="telaDeRegistro.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
    <title>Registro</title>
</head>
<body>
      <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 border border-2 border-black bg-light">
            <div class="row">
              <div class="col text-center my-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
              </div>
            </div>
            <form action="efetuarRegistro.php" method="post">
              <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-black" name="email" id="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input type="password" class="form-control border-black" name="senha" id="senha" placeholder="Senha">
                        <label for="senha">Senha</label>
                    </div>
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