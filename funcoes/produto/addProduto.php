<?php

require_once '../../config/config.php';
require_once '../../services/serviceCrudProduto.php';

$nome_produto = $_POST['nome_produto'];
$preco_produto = $_POST['preco_produto'];
$arquivo = $_FILES['arquivo_img'];
$favoritos = $_POST['favoritos'];

$adicionado = addProduto($conn, $nome_produto, $preco_produto, $arquivo, $favoritos);

if($adicionado)
  header('location: ../../admin/product-management.php?add=true');
else
  echo "Não foi possível adicionar produto!";

