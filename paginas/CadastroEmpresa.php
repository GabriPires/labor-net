<?php require ("cabecalho.php");?>
<form class="form-horizontal" action="InsertEmpresa.php" method="post">

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="text">Nome:</label>
         <div class="col-sm-6">
            <input type="text" class="form-control" name="nome" placeholder="Nome da Empresa">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="text">CNPJ:</label>
         <div class="col-sm-3">
            <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
         </div>

         <label class="control-label col-sm-1" for="text">Telefone:</label>
         <div class="col-sm-2">
            <input type="tel" class="form-control" name="telefone" placeholder="Telefone Comercial">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="text">Endereço:</label>
         <div class="col-sm-6">
            <input type="text" class="form-control" name="endereco" placeholder="Endereço">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group ">
         <label class="control-label col-sm-3" for="text">Bairro:</label>
         <div class="col-sm-3">
            <input type="text" class="form-control" name="bairro" placeholder="Bairro">
         </div>

         <label class="control-label col-sm-1" for="text">Número:</label>
         <div class="col-sm-2">
            <input type="text" class="form-control" name="numero" placeholder="Número">
         </div>
      </div>
   </div>

   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3 " for="text">Cidade:</label>
         <div class="col-sm-3">
            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
         </div>

         <label class="control-label col-sm-1" for="text">UF:</label>
         <div class="col-sm-2">
            <input type="text" class="form-control" name="estado" placeholder="Estado">
         </div>
      </div>
   </div>



   <div class="row">
      <div class="form-group">
         <label class="control-label col-sm-3" for="email">Email:</label>
         <div class="col-sm-3">
            <input type="email" class="form-control" name="email" placeholder="Email da Empresa">
         </div>


         <label class="control-label col-sm-1" for="senha">Senha:</label>
         <div class="col-sm-2">
            <input type="password" class="form-control" name="senha" placeholder="Senha">
         </div>
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