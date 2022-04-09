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

  if(isset($_POST['add_product'])){

    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $arquivo = $_FILES['arquivo_img'];
    $favoritos = $_POST['favoritos'];
    
    /* working with image */
    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    /* upload image */
    if($extensao != 'jpg' && $extensao != 'png')
      die("Tipo de arquivo não aceito!");

    $adicionadaImg = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    if($adicionadaImg){
      $link_arquivo = "$novoNomeDoArquivo".".$extensao";

      $sql = "INSERT INTO produtos (nome_produto, preco_produto, link_arquivo, favoritos) VALUES ('$nome_produto', '$preco_produto', '$link_arquivo', $favoritos)";
      
      $adicionadoProduto = mysqli_query($conn, $sql);
      if($adicionadoProduto)
      echo '<div class="alert alert-success alert-dismissible" role="alert">Produto enviado com sucesso!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    else{
      echo "Falha ao enviar produto!";
    }
  }

  $sql = "SELECT * FROM produtos";
  $resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Produtos</title>

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
              <a class="nav-link" href="./">Administração</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Produtos</a>
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
        <div class="row">
          <div class="col-xs-12 col-md-8 col-lg-6 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="mt-2 text-center">Add Novo Produto</h3>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nome do Produto" name="nome_produto" required>
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Preço do Produto" name="preco_produto" required>
                  </div>
                  <div class="mb-4">
                    <label for="imagem_produto" class="form-label">Imagem Produto</label>
                    <input type="file" id="imagem_produto" class="form-control" name="arquivo_img" required>
                  </div>
                  <input type="hidden" name="favoritos" value="0">
                  <div class="mb-3 text-center">
                    <input type="submit" class="btn btn-success col-6" value="Add Produto" name="add_product">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5 table-responsive">
          <table class="table mt-3">
            <thead class="table-dark">
              <tr>
                <th scope="col">Imagem Produto</th>
                <th scope="col">#</th>
                <th scope="col">Nome Produto</th>
                <th scope="col">Preço Produto</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody class="align-middle">
            <?php while($row = $resultado->fetch_array()) { ?>
            <tr>
              <td><img src="./arquivos/<?php echo $row['link_arquivo']; ?>" class="img-fluid rounded-circle" alt="BoredApe-<?php echo $row['id_produto']; ?>" width="50" height="50"></td>
              <th scope="row"><?php echo $row['id_produto']; ?></th>
              <td><?php echo $row['nome_produto']; ?></td>
              <td><?php echo $row['preco_produto']; ?></td>
              <td>
                <!-- Button Edit -->
                <button type="button" class="btn btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_produto']; ?>">
                  Editar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id_produto']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar produto #<?php echo $row['id_produto']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" method="post">
                          <input type="hidden" name="id_produto" value="<?php echo $row['id_produto']; ?>">
                          <div class="mb-3">
                            <input type="text" id="nome_produto" class="form-control" placeholder="Nome do Produto" name="nome_produto" value="<?php echo $row['nome_produto']; ?>" required>
                          </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Preço do Produto" name="preco_produto" value="<?php echo $row['preco_produto']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="imagem_produto" class="form-label">Imagem Produto</label>
                            <input type="file" id="imagem_produto" class="form-control" name="arquivo_img" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <input type="submit" class="btn btn-primary" name="edit_produto" value="Atualizar">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Button Delete -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id_produto']; ?>">
                  Deletar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['id_produto']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Deletar produto #<?php echo $row['id_produto']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Você tem certeza que deseja apagar esse produto?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id_produto']; ?>">
                          <input type="submit" class="btn btn-primary" name="delete_produto" value="Confirmar">
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