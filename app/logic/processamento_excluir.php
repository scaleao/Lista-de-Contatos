<?php
  require_once "../database/conexao.php";
  require_once "../functionUtil.php";

  $idDelete = $_POST["idExcluir"];

  $message_erro = "";
  $message_sucess = "";

  if(empty($idDelete)){
    $message_erro = "<ul><li>Erro! Selecione um item</li></ul>";
    toSession("messages_error_listar", $message_erro );
    header("Location: ./listar.php");
    exit();
  }

  try{
    $sql = "DELETE FROM cliente WHERE id = '$idDelete'";
    $stmt = getConnection()->prepare($sql);
    if($stmt->execute()){
      $message_sucess = "<ul><li>Sucesso! Item excluido</li></ul>";
      toSession("messages_sucess_listar", $message_sucess);
      header("Location: ./listar.php");
      exit();
    }
    else{
      $message_erro = "<ul><li>FALHA !!!</li></ul>";
      toSession("messages_error_listar", $message_erro);
      header("Location: ./listar.php");
      exit();
    }
  $message_erro = "<ul><li></li></ul>";
  }
  catch(PDOException $e){
    echo 'Erro: ' . $e->getMessage();
  }
?>
