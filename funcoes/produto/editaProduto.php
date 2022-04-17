<?php

  require_once '../../config/config.php';
  require_once '../../services/serviceCrudProduto.php';

  $old_file = $_POST['old_img'];

  $id_produto = $_POST['id_produto'];
  $name_produto = $_POST['name_produto'];
  $price_produto = $_POST['price_produto'];
  $new_file = $_FILES['new_img'];

  $editado = editaProduto($conn, $old_file, $id_produto, $name_produto, $price_produto, $new_file);

  if($editado)
    header('location: ../../admin/product-management.php?edit=true');
  else
    echo "Não foi possível editar produto!";