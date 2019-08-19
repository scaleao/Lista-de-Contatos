<?php
    require_once "../database/conexao.php";
    require_once "../functionUtil.php";

    $nome = getPost("nome");
    $dataN = getPost("dataN");
    $telefone = getPost("telefone");
    $email = getPost("email");

    $messages_error = "";
    $messages_sucess = "";

    $validNasc = "/^([0-9]{2})(\/[0-9]{2})(\/[0-9]{4})$/";
    $validPhone = "/^(\([0-9]{3}\))([0-9]{5})(-[0-9]{4})$/";
    $validName = "/([a-zA-Z]+)(\s[a-zA-Z]+)/";
    $validEmail = "/([a-zA-z]*).?_?-?([a-zA-z]*).?_?-?(@[a-z]*)(.[a-z]*)/";

/*VERIFICA SE OS CAMPOS DO FORMULARIO NAO ESTAO VAZIOS--------------------------*/
    if(empty($nome)){ //tipo !isset verificada se essa variavel esta preenchida
      $messages_error .= "<li>Nome obrigatorio</li>";
    }
    if(empty($telefone)){ //tipo !isset verificada se essa variavel esta preenchida
      $messages_error .= "<li>Telefone obrigatorio</li>";
    }
    if(empty($email)){ //tipo !isset verificada se essa variavel esta preenchida
      $messages_error .= "<li>Email obrigatorio</li>";
    }
    if(strlen($messages_error) > 0){
      $messages_error = "<ul>".$messages_error."</ul>";
      toSession("messages_error", $messages_error);
      toSession("nome", $nome);
      toSession("telefone", $telefone);
      toSession("email", $email);
      header("Location: ../../index.php");
      exit();
    }


/*PATTERN MATCHING--------------------------------------------------------------*/
    if(isset($nome)){ //Se o nome foi preenchido
      if(!preg_match($validName, $nome)){ //Caso nao acompanhe o casamento de padrao PATTERN MATCHING
        $messages_error .= "<li>Insira um nome valido</li>";
      }
    }
    /*if(isset($dataN)){
      if(!preg_match($validNasc, $dataN)){
        $messages_error .= "<li>Data de nascimemto invalida</li>";
      }
    }*/
    if(isset($telefone)){
      if(!preg_match($validPhone, $telefone)){
        $messages_error .= "<li>Insira um telefone valido</li>";
      }
    }
    if(isset($email)){
      if(!preg_match($validEmail, $email)){
        $messages_error .= "<li>Insira um email valido</li>";
      }
    }
    if(strlen($messages_error) > 0){
      $messages_error = "<ul>".$messages_error."</ul>";
      toSession("messages_error", $messages_error);
      toSession("nome", $nome);
      toSession("telefone", $telefone);
      toSession("email", $email);
      toSession("dataN", $dataN);
      header("Location: ../../index.php");
      exit();
    }

/*INSERI OS DADOS DO CADASTRO NO BANCO------------------------------------------*/
    try{
      $sql = "INSERT INTO cliente(nome, dataN, telefone, email) VALUES (:nome, :dataN, :telefone, :email)" ;
      $stmt = getConnection()->prepare($sql);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':dataN', $dataN);
      $stmt->bindParam(':telefone', $telefone);
      $stmt->bindParam(':email', $email);
      if($stmt->execute()){
        $messages_sucess = "<ul><li>"."Cadastro realizado com sucesso!"."</li></ul>";
        toSession("messages_sucess", $messages_sucess);
        header("Location: ../../index.php");
      }
      else{
        $messages_error = "<ul><li>"."Falhou!"."</li></ul>";
        toSession("messages_error", $messages_error);
        header("Location: ../../index.php");
      }
    }catch(PDOException $e) {
      echo 'Erro: ' . $e->getMessage();
    }
?>
