<?php

  require_once '../../config/config.php';
  require_once '../../services/serviceCrudUsuario.php';

  $id = $_POST['id'];
  $email = $_POST['email'];
  $nome = $_POST['nome'];
  $senha = $_POST['senha'];

  $atualizado = editaUsuario($conn, $id, $email, $nome, $senha);

  if($atualizado)
    header('location: ../../admin/index.php?edit=true');
  else
    echo "Usuário não foi atualizado!";
