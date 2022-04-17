<?php

  function addProduto($conn, $nome_produto, $preco_produto, $arquivo, $favoritos){
    
    /* trabalhando com a imagem */
    $pasta = "../../admin/arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    /* upload imagem */
    if($extensao != 'jpg' && $extensao != 'png')
      die("Tipo de arquivo não aceito!");

    $adicionadaImg = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    if($adicionadaImg){
      $link_arquivo = "$novoNomeDoArquivo".".$extensao";
      $preco = str_replace([','],'.', $preco_produto);

      $sql = "INSERT INTO produtos (nome_produto, preco_produto, link_arquivo, favoritos) VALUES ('$nome_produto', '$preco', '$link_arquivo', $favoritos)";
    }else{
      echo "Falha ao adicionar imagem!";
    }
    return mysqli_query($conn, $sql);
  }

  function listarProdutos($conn){
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conn, $sql);
    return $resultado;
  }

  function editaProduto($conn, $old_file, $id_produto, $name_produto, $price_produto, $new_file){
    $produtoDeletado = unlink("../../admin/arquivos/$old_file");

    if($produtoDeletado){

      /* trabalhando com a imagem */
      $local = "../../admin/arquivos/";
      $nameArquive = $new_file['name'];
      $newName = uniqid();
      $extension = strtolower(pathinfo($nameArquive,PATHINFO_EXTENSION));

      $produtoEditado = move_uploaded_file($new_file['tmp_name'], $local . $newName . "." . $extension);

      if($produtoEditado){
        $new_link = "$newName".".$extension";
        $price = str_replace([','],'.', $price_produto);
      
        $sql = "UPDATE produtos SET nome_produto='$name_produto', preco_produto='$price', link_arquivo='$new_link' WHERE id_produto=$id_produto";
      }else{
        echo "Falha ao editar imagem!";
      }
      return mysqli_query($conn, $sql);
    }
  }

  function deletaProduto($conn, $file, $id){
    $deletadaImagem = unlink("../../admin/arquivos/$file");

    if($deletadaImagem){
      $sql = "DELETE FROM produtos WHERE id_produto=$id";
    }else{
      echo "Falha na deleção da imagem!";
    }
    return mysqli_query($conn, $sql);
  }