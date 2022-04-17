<?php 

require_once '../../config/config.php';
require_once '../../services/serviceCrudUsuario.php';

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

$inserido = cadastraUsuario($conn, $email, $nome, $senha);

if($inserido)
  header('location: ../../pages/login.php?success=true');
else
  echo "Usuário não inserido!";
