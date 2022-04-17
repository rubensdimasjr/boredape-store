<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}

if(!empty($_SESSION) && isset($_SESSION['tipo_usuario']) == "admin"){
  header('location: ../admin/');
}else if(!empty($_SESSION) && !isset($_SESSION['tipo_usuario'])){
  header('location: ../');
}