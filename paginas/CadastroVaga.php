<?php Require ("cabecalho.php"); ?>

<form class="form-horizontal" action="InsertVaga.php" method="post">

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
            <label class="control-label col-sm-3" for="text">Remuneração</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name='remuneracao' placeholder="Remuneração">
            </div>
            <label class="control-label col-sm-1" for="text">Nº de Vagas</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name='nvagas' placeholder="Número de Vagas">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Carga Horária</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="cargah" placeholder="Carga Horária">
            </div>
            <label class="control-label col-sm-1" for="text">Cidade</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name='cidade' placeholder="Cidade">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="text">Tratar Com</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="tratar" placeholder="Tratar Com">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Descrição do Anúncio</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="descanu"
                        placeholder="Descreva o anúncio..."></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="descrição">Requisitos</label>

                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="requisitos"
                        placeholder="Requisitos para a vaga"></textarea>
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