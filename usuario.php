<?php
require("verificarlogin.php");

include "usuarioDAO.php";
include "alerta.php";

$usuarioDAO = new UsuarioDAO();
$lista = $usuarioDAO->buscar();

include "cabecalho.php";
include "menu.php";
?>


<!DOCTYPE html>
<html>
<head>

 <meta charset="UTF-8">
 <title></title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel = "stylesheet" type = "text/css" href="css/all.min.css">

</head>
<body>
  <div class="col-10">
    <?php mostrarAlerta("success"); ?>
    <?php mostrarAlerta("danger"); ?>

    <h3>Usuários</h3>
    <br>    
    <button class = "btn btn-primary" data-toggle="modal" data-target="#modalnovo"><i class="fas fa-user-plus"></i>   Novo Usuário</button>
    <table class = "table">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
      <?php
      foreach($lista as $usuario): ?>
        <tr>

          <td><?= $usuario->usuario ?></td>
          <td><?= $usuario->nome ?></td>
          <td><?= $usuario->email ?></td>

          <td>
            <a class = "btn btn-danger" href="usuariocontroller.php?acao=apagar&id=<?= $usuario->usuario ?>"> <i class="fas fa-user-minus"> </i></a>
            <button class = "btn btn-warning"> <i class="fas fa-user-edit"></i> </button>
            <a type="button" class="btn btn-primary alterar-senha" data-toggle="modal" data-target="#modalsenha"  data-id="<?=$usuario->usuario?>">
              <i class="fas fa-key"></i>
            </a>
          </td>

        </tr>
      <?php endforeach ?>

    </table>

  </div>
</div>
</div>


<!-- ModalTrocarSenha -->
<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form action= "usuariocontroller.php?acao=trocarsenha" method="POST">
          <input type="hidden" name="id" id="campo-id">
          <div class="form-group">
            <div class="form-group">
              <label for="exampleInputPassword1">Alterar Senha</label>
              <input type="password" name="senha" class="form-control" id="trocarsenha" placeholder="Nova Senha">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </form>
</div>
</div>
    <!-- ModalInserir -->
<div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form action="usuariocontroller.php?acao=inserir" method="POST">
         <div class="form-group">
          <label for="nome">Nome de usuário</label>
          <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome completo">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email">
          <small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Não sou robô</label>
        </div>
        <button type="submit" class="btn btn-primary">Inscrever-se</button>
      </form>
      </div>
    </div>
  </div>
</div>
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var botao = document.querySelector(".alterar-senha");
      botao.addEventListener("click", function(){
        var campo = document.querySelector("#campo-id");
        campo.value = botao.getAttribute("data-id");
      });
    </script>

    </html>