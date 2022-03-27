<?php

  include ("../config/config.php");

  if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
  }

  if(!isset($_SESSION['tipo_usuario'])){
    header("location: ../pages/error-page.php?error=true");
    exit;
  }

/*   print_r($_SESSION); */
  $sql = "SELECT * FROM user";
  $resultado = mysqli_query($conn, $sql);

  if(isset($_POST['delete_user'])){
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM user WHERE id =$id";
    $deletado = mysqli_query($conn, $sql_delete);

    if($deletado)
      header('location: index.php?delete=true');
    else
      echo "Usuário não foi deletado!";
  }

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
            <?php while($row = $resultado->fetch_array()) { ?>
            <tr>
              <th scope="row"><?php echo $row['id']; ?></th>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['senha']; ?></td>
              <td>
                <button type="button" class="btn btn-secondary my-1">Editar</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>">
                  Deletar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar usuário #<?php echo $row['id']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Você tem certeza que deseja apagar esse usuário?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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