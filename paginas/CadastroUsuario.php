<?php Require ("cabecalho.php");?>

<form class="form-horizontal" action="InsertUsuario.php" method="post">

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="text">Nome:</label>
         <div class="col-sm-6">
            <input type="text" class="form-control" name="nome" placeholder="Nome do Usuário">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="text">CPF:</label>
         <div class="col-sm-3">
            <input type="text" class="form-control" name='cpf' placeholder="CPF">
         </div>
         <label class="control-label col-sm-1" for="text">Telefone:</label>
         <div class="col-sm-2">
            <input type="tel" class="form-control" name='telefone' placeholder="Telefone">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">

      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="email">Email:</label>
         <div class="col-sm-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
         </div>


         <label class="control-label col-sm-1" for="senha">Senha:</label>
         <div class="col-sm-2">
            <input type="password" class="form-control" name="senha" placeholder="Senha">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="descrição">Descrição do perfil:</label>

         <div class="col-sm-6">
            <textarea class="form-control" rows="5" name="descper"
               placeholder="Escreva um pouco sobre você..."></textarea>
         </div>
      </div>

      <div class="form-group">
         <div class="control-label col-sm-6">
            <button type="submit" name="submit" class="btn btn-primary">Cadastrar </button>
            <button type="reset" class="btn btn-danger">Limpar </button>
         </div>
      </div>
</form>

<?php require('rodape.php');?>