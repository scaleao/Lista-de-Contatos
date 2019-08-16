<?php
  require_once "./app/functionUtil.php"
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contatos</title>
  </head>
  <body>
    <div class="sidenav">
      <form method="POST" action="./app/logic/consultar.php">
        <span>
          <input type="text" class="text-search" name="busca" placeholder="Buscar..">
        </span>
        <span>
          <input type="submit" class="buttom-search" value="Ir">
        </span>
      </form>
      <a href="./index.php">Cadastro</a>
      <a href="./app/logic/listar.php">Listar tudo</a>
    </div>

    <div class="main">
      <div class="painel col-6">
        <form method="POST" action="./app/logic/cadastro.php">
          <div>
            Cadastro de clientes:
            <h3 class="error"><?=fromSession("messages_error")?></h3>
            <h3 class="sucess"><?=fromSession("messages_sucess")?></h3>
          </div>
          <div class="text-left">
            Nome:
            <input type="text" class="text" name="nome" placeholder="Ex: Ana Julia" value="<?=fromSession("nome")?>">
          </div>
          <div class="text-left">
            Data de Nascimento:
            <input type="text" class="text" name="dataN" placeholder="Ex: 10/10/1997" value="<?=fromSession("dataN")?>">
          </div>
          <div class="text-left">
            Telefone:
            <input type="text" class="text" name="telefone" placeholder="Ex: (999)99999-9999" value="<?=fromSession("telefone")?>">
          </div>
          <div class="text-left">
            E-mail:
            <input type="text" class="text" name="email" placeholder="Ex: julia@gmail.com" value="<?=fromSession("email")?>">
          </div>
          <div>
            <input type="submit" class="buttom buttom-focus" value="CADASTRAR">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
