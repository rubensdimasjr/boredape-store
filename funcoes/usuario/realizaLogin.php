<?php

require_once '../../config/config.php';
require_once '../../services/serviceCrudUsuario.php';

if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}

$email = $_POST['email'];
$senha = $_POST['senha'];
$resultado = realizaLogin($conn, $email, $senha);

$row = mysqli_fetch_array($resultado);
    if($row['tipo_usuario']=="user"){
      $_SESSION['nome'] = $row['nome'];
      header("location: ../../");
    }
    else if($row['tipo_usuario']=="admin"){
      $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
      $_SESSION['nome'] = $row['nome'];
      header("location: ../../admin/");
    }
    else{
      header("location: ../../pages/login.php?error=true");
    }