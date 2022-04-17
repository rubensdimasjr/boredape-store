<?php

  require_once '../../config/config.php';
  require_once '../../services/serviceCrudUsuario.php';

  $id = $_POST['id'];

  $deletado = deletaUsuario($conn, $id);

  if($deletado)
    header('location: ../../admin/index.php?delete=true');
  else
    echo "Usuário não foi deletado!";