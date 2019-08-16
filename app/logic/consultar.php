<?php
  require_once "../functionUtil.php"
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contatos</title>
  </head>
  <body>
    <div class="sidenav">
      <form method="POST" action="./consultar.php">
        <span>
          <input type="text" class="text-search" name="busca" placeholder="Buscar..">
        </span>
        <span>
          <input type="submit" class="buttom-search" value="Ir">
        </span>
      </form>
      <a href="../../index.php">Cadastro</a>
      <a href="./listar.php">Listar tudo</a>
    </div>

    <div class="main">
      <h3 class="error"><?=fromSession("messages_error_listar")?></h3>
      <h3 class="sucess"><?=fromSession("messages_sucess_listar")?></h3>
      <div class="div-table">
        <form method='POST' action='./processamento_excluir.php'>
        <table border ="1" id="customers">
          <thread>
            <th>Selecione</th><th>Nome</th><th>Apelido</th><th>Telefone</th><th>E-mail</th>
          </thread>
            <?php
              require_once "../database/conexao.php";

              $busca = getPost("busca");

              $sql = "SELECT * FROM cliente WHERE nome = '$busca'";

              foreach(getConnection()->query($sql) as $row){
            ?>
            <tbody>
              <tr>
                <td><input type='radio' name='idExcluir' value='<?=$row['id']?>'></td>
                <td><?=$row['nome']?></td>
                <td><?=$row['dataN']?></td>
                <td><?=$row['telefone']?></td>
                <td><?=$row['email']?></td>
              </tr>
            </tbody>
            <?php } ?>
            </table>
          <input type="submit" class="buttom-excluir" value="Excluir">
          <a class="buttom-simple" href="../../index.php">Novo cadastro</a>
        </form>
      </div>
    </div>
  </body>
</html>
