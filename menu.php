<?php
$recurso = $_SERVER["PATH_INFO"];
?>

<div class="container-fluid">
  <div class="row">
   <div class = "col-2">
     <ul class="nav flex-column nav-pills vertical">
       <li class="nav-item">
         <a class="nav-link <?= ($recurso == '/usuarios')?'active':''?> " href="/usuarios">Usuários</a>
       </li>
       <li class="nav-item">
         <a class="nav-link <?= ($recurso == '/perguntas')?'active':''?> " href="/perguntas">Perguntas</a>
         <div class="col-10">
       </li>
       <li class="nav-item">
         <a class="nav-link <?= ($recurso == '/ranking')?'active':''?> " href="/ranking">Ranking</a>
       </li>
     </ul>
   </div>