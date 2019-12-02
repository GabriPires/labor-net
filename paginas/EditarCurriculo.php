<?php
require ("cabecalho.php");

$id = (int) $_GET['id'];

$sql = "SELECT * FROM usu_curriculo WHERE usu_id = ?";
$stmp = $con->prepare($sql);
$stmp->bindParam(1, $id);
$stmp->execute();

$row = $stmp->fetchAll(PDO::FETCH_ASSOC);
?>

<form class="form-horizontal" action="EditarCurriculo.php?id=<?php echo $id ?>" method="post">

    <?php foreach ($row as $line)
        
        ?>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="formaçâo">Formaçâo</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="6" name="formacao"
                    placeholder=""><?php echo $line['usu_formacao']; ?></textarea>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="Experiencia">Experiencia</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="5" name="experiencia"
                    placeholder=""><?php echo $line['usu_exp']; ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="Complementares">Atividades Complementares</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="6" name="complementares"
                    placeholder=""><?php echo $line['usu_ati']; ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-3" for="Informaçôes">Outras Informaçôes</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="6" name="informacoes"
                    placeholder=""><?php echo $line['usu_inf']; ?></textarea>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="control-label col-sm-6">
            <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    //nome, cnpj, cpf, endereco, cidade, bairro, estado, num, telefone, email, senha

    $formacao = $_POST['formacao'];
    $experiencia = filter_var($_POST['experiencia'], FILTER_SANITIZE_STRING);
    $complementares = filter_var($_POST['complementares'], FILTER_SANITIZE_STRING);
    $informacoes = filter_var($_POST['informacoes'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE usu_curriculo SET usu_formacao = ?, usu_exp = ?, "
            . "usu_ati = ?, usu_inf = ? WHERE usu_id = ?";

    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $formacao);
    $stmp->bindParam(2, $experiencia);
    $stmp->bindParam(3, $complementares);
    $stmp->bindParam(4, $informacoes);
    $stmp->bindParam(5, $id);
    $stmp->execute();

    print "<script>alert('Alteração feita com sucesso!');</script>";

    print "<script>location.href='EditarCurriculo.php?id=$id';</script>";
}
?>