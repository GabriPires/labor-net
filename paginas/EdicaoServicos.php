<?php
include('cabecalho.php');

$con = db_connect();
?>

<body>
    <?php
    $id = (int) $_GET['id'];

    $sql = "SELECT * FROM srv_servicos WHERE srv_id = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if ($row == 0): ?>
    <p>"Nenhum resultado!"</p>;
    <?php else: ?>
    <div class="container">
        <?php foreach ($row as $line): ?>
        <form class="form-horizontal" action="EdicaoServicos.php?id=<?php echo $id; ?>" method="post">

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="text">Título</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php echo $line['srv_titulo']; ?>" name="titulo"
                            placeholder="Título">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="text">Endereço</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo $line['srv_endereco']; ?>"
                            name="endereco" placeholder="Endereço">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $line['srv_id']; ?>"
                            placeholder="Remuneração">
                    </div>
                    <label class="control-label col-sm-1" for="text">Número</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name='numero' value="<?php echo $line['srv_numero']; ?>"
                            placeholder="Número">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="text">Telefone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="telefone"
                            value="<?php echo $line['srv_telefone']; ?>" placeholder="Telefone">
                    </div>
                    <label class="control-label col-sm-1" for="text">Cidade</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name='cidade' value="<?php echo $line['srv_cidade']; ?>"
                            placeholder="Cidade">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="text">Bairro</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="bairro" value="<?php echo $line['srv_bairro']; ?>"
                            placeholder="Bairro">
                    </div>
                    <label class="control-label col-sm-1" for="text">UF</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name='estado' value="<?php echo $line['srv_estado']; ?>"
                            placeholder="Estado">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="text">Descrição do Serviço</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" name="descricao"
                            placeholder="Descreva o serviço..."><?php echo $line['srv_descricao']; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="control-label col-sm-6">
                    <button type="submit" name="submit" class="btn btn-primary">Editar </button>
                    <button type="reset" class="btn btn-danger">Limpar </button>
                </div>
            </div>
        </form>
    </div>

    <?php endforeach; ?>
    <?php endif; ?>

</body>
<?php
include('rodape.php');

if (isset($_POST['submit'])) {
    //nome, cnpj, cpf, endereco, cidade, bairro, estado, num, telefone, email, senha

    $id = $_POST['id'];
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
    $endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_STRING);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $bairro = filter_var($_POST['bairro'], FILTER_SANITIZE_STRING);
    $cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_STRING);
    $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
    $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
    $numero = filter_var($_POST['numero'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE srv_servicos SET srv_titulo = ?, srv_endereco = ?, "
            . "srv_estado = ?, srv_bairro = ?, srv_numero = ?, "
            . "srv_cidade = ?, srv_telefone = ?, srv_descricao = ? WHERE srv_id = ?";

    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $titulo);
    $stmp->bindParam(2, $endereco);
    $stmp->bindParam(3, $estado);
    $stmp->bindParam(4, $bairro);
    $stmp->bindParam(5, $numero);
    $stmp->bindParam(6, $cidade);
    $stmp->bindParam(7, $telefone);
    $stmp->bindParam(8, $descricao);
    $stmp->bindParam(9, $id);
    $stmp->execute();

    print "<script>alert('Alteração feita com sucesso!');</script>";

    print "<script>location.href='EdicaoServicos.php?id=$id';</script>";
}
?>