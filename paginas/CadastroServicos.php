<?php Require ("cabecalho.php"); ?>

<form class="form-horizontal" action="InsertServicos.php" method="post">

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Título</label>
            <div class="col-sm-6">
                <input type="hidden" class="form-control" name="id_user" value="<?= $_SESSION['user_id']; ?>"
                    placeholder="Título">
                <input type="text" class="form-control" name="titulo" placeholder="Título">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Endereço</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="endereco" placeholder="Endereço">
            </div>
            <label class="control-label col-sm-1" for="text">Número</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name='numero' placeholder="Número">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Telefone</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="telefone" placeholder="Telefone">
            </div>
            <label class="control-label col-sm-1" for="text">Cidade</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name='cidade' placeholder="Cidade">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Bairro</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="bairro" placeholder="Bairro">
            </div>
            <label class="control-label col-sm-1" for="text">UF</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name='uf' placeholder="Estado">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Descrição do Serviço</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="5" name="descsrv" placeholder="Descreva o serviço..."></textarea>
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
<?php 

//require('rodape.php'); ?>