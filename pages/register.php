<?php 

  require_once '../config/config.php';
  require_once '../funcoes/sessao/verificaSessao.php';

  if(isset($_GET['success']))
    echo '<div class="alert alert-danger alert-dismissible" role="alert">Usuário não foi cadastrado!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
  
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- Bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Reset Css -->
    <link href="../assets/css/reset.css" rel="stylesheet">

    <!-- Icon Style -->
    <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand"><i class="fa-brands fa-ethereum text-warning"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Register Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../">Página Inicial</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="row mt-5">
        <div class="col-xs-12 col-md-8 col-lg-5 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="../funcoes/usuario/addUsuario.php" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="exemplo123@email.com">
                </div>
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha">
                </div>
                <div class="mb-3 text-center">
                  <input type="submit" class="btn btn-primary col-6" name="cadastra_user" value="Cadastrar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap script js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>