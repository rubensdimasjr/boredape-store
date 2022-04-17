<?php

  require_once '../../config/config.php';
  require_once '../../services/serviceCrudProduto.php'; 

  $file = $_POST['img'];
  $id = $_POST['id'];
  
  $deletado = deletaProduto($conn, $file, $id);

  if($deletado)
    header('location: ../../admin/product-management.php?delete=true');
  else
    echo "Produto não foi deletado!";