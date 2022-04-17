<?php 

function cadastraUsuario($conn, $email, $nome, $senha){
  $sql = "INSERT INTO user (email,nome,senha) VALUES ('$email', '$nome', '$senha')";
  return  mysqli_query($conn, $sql);
}

function realizaLogin($conn, $email, $senha){
  $sql = "SELECT * FROM user WHERE email='".$email."' AND senha='".$senha."'";
  return mysqli_query($conn, $sql);
}

function listarUsuarios($conn){
  $sql = "SELECT * FROM user";
  $resultado = mysqli_query($conn, $sql);
  return $resultado;
}

function editaUsuario($conn, $id, $email, $nome, $senha){
  $sql = "UPDATE user SET email='$email', nome='$nome', senha='$senha' WHERE id=$id";
  return mysqli_query($conn, $sql);
}

function deletaUsuario($conn, $id){
  $sql = "DELETE FROM user WHERE id =$id";
  return mysqli_query($conn, $sql);
}