<?php

  require_once '../config/config.php';
  require_once '../services/serviceCrudUsuario.php';
  require_once '../funcoes/sessao/protegeSessao.php';

/*   print_r($_SESSION); */

  $listaUsuarios = listarUsuarios($conn);

  if(isset($_GET['edit']))
    echo '<div class="alert alert-success alert-dismissible" role="alert">Usuário atualizado com sucesso!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

  if(isset($_GET['delete']))
    echo '<div class="alert alert-success alert-dismissible" role="alert">Usuário deletado com sucesso!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>

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
            <a class="nav-link active" aria-current="page" href="#">Administração</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./product-management.php">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container my-5">
      <div class="row table-responsive">
        <h3 class="text-center fw-bold">Lista de Usuários</h3>
        <table class="table mt-3">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Senha</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while($user = mysqli_fetch_assoc($listaUsuarios)) { ?>
            <tr>
              <th scope="row"><?=$user['id'];?></th>
              <td><?=$user['nome'];?></td>
              <td><?=$user['email'];?></td>
              <td><?=$user['senha'];?></td>
              <td>
                <!-- Button Edit -->
                <button type="button" class="btn btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#editModal<?=$user['id'];?>">
                  Editar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="editModal<?=$user['id'];?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar usuário #<?=$user['id'];?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="../funcoes/usuario/editaUsuario.php" method="post">
                          <input type="hidden" name="id" value="<?=$user['id'];?>">
                          <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?=$user['email'];?>" required>
                          </div>
                          <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?=$user['nome'];?>" required>
                          </div>
                          <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" value="<?=$user['senha'];?>" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <input type="submit" class="btn btn-primary" name="edit_user" value="Atualizar">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Button Delete -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$user['id'];?>">
                  Deletar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?=$user['id'];?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Deletar usuário #<?=$user['id'];?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Você tem certeza que deseja apagar esse usuário?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form action="../funcoes/usuario/deletaUsuario.php" method="post">
                          <input type="hidden" name="id" value="<?=$user['id'];?>">
                          <input type="submit" class="btn btn-primary" name="delete_user" value="Confirmar">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Bootstrap script js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>