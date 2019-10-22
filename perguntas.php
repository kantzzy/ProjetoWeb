<?php
include "perguntasDAO.php";

$perguntaDAO = new PerguntaDAO();
$lista = $perguntaDAO->buscar();

include "cabecalho.php";
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



<div class="container-fluid">
  <div class="row">

   <div class = "col-2">
     <ul class="nav flex-column nav-pills vertical">
       <li class="nav-item">
         <a class="nav-link" href="usuario.php">Usuários</a>
       </li>
       <li class="nav-item">
         <a class="nav-link active" href="perguntas.php">Perguntas</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Link</a>
       </li>
       <li class="nav-item">
         <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
       </li>
     </ul>
   </div>

   <div class="col-10">
   <br>
    <h3>Questões</h3>
   <br>
    <button class = "btn btn-primary" data-toggle="modal" data-target="#modalnovo"><i class="fas fa-user-plus"></i>   Nova Questão</button>
    <table class = "table">
      <tr>
        <th>Questão</th>
        <th>Enunciado</th>
        <th>Tipo</th>
        <th>Ações</th>
      </tr>
      <?php
      foreach($lista as $pergunta): ?>
        <tr>

          <td><?= $pergunta->questao ?></td>
          <td><?= $pergunta->enunciado ?></td>
          <td><?= $pergunta->tipo ?></td>

          <td>
            <a type="button" class="btn btn-primary alterar-senha" data-toggle="modal" data-target="#modalsenha"  data-id="<?=$pergunta->questao?>"><i class="far fa-edit"></i></a>
            <a class = "btn btn-danger" href="perguntascontroller.php?acao=apagar&id=<?=$pergunta->questao?>"> <i class="fas fa-minus-circle"></i></a>
          </td>

        </tr>
      <?php endforeach ?>

    </table>

  </div>
</div>
</div>


<!-- ModalMudarEnunciado -->
<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form action= "perguntascontroller.php?acao=mudarenunciado" method="POST">
          <input type="hidden" name="id" id="campo-id">
          <div class="form-group">
            <div class="form-group">
              <label for="exampleInputPassword1">Editar enunciado</label>
              <input type="text" name="enunciado" class="form-control" id="mudarenunciado" placeholder="Novo Enunciado">
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
        <form action="perguntascontroller.php?acao=inserir" method="POST">
         <div class="form-group">
          <label for="nome">Tipo da Questão</label>
          <input type="text" name="tipo" class="form-control" id="Tipo" placeholder="(Ex: Dissertativa, alternativa)">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Enunciado</label>
          <input type="text" name="enunciado" class="form-control" id="Enunciado" placeholder="Digite o enunciado da questão">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <button type="submit" class="btn btn-primary">Enviar questão</button>
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