<?php 

  if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
  }

  if(!isset($_SESSION['tipo_usuario'])){
    header("location: ../pages/error-page.php?error=true");
    exit;
  }