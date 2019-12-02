<?php
include('cabecalho.php');

$con = db_connect();
?>

<body>
    <?php
    $id = (int) $_GET['id'];
    $log_id = (int) filter_var($_GET['logid'], FILTER_VALIDATE_INT);

    $sql = "SELECT * FROM emp_empregador WHERE emp_id = ?";
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
        <form class="form-horizontal" action="EdicaoEmp.php?id=<?php echo $id; ?>&logid=<?php echo $log_id; ?>"
            method="post" />

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="<?php echo $line['emp_nome']; ?>"
                        placeholder="Nome">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="endereco" value="<?php echo $line['emp_endereco']; ?>"
                        placeholder="CNPJ">
                    <input type="hidden" class="form-control" name="logid" value="<?php echo $log_id; ?>"
                        placeholder="CNPJ">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">

            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">CPNJ</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="cnpj" value="<?php echo $line['emp_cnpj']; ?>"
                        placeholder="CNPJ">
                </div>

                <label class="control-label col-sm-1">Cidade</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cidade" value="<?php echo $line['emp_cidade']; ?>"
                        placeholder="Cidade">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">Bairro</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="bairro" value="<?php echo $line['emp_bairro']; ?>"
                        placeholder="Bairro">
                </div>

                <label class="control-label col-sm-1">UF</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="estado" value="<?php echo $line['emp_estado']; ?>"
                        placeholder="Estado">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">Número</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="num" value="<?php echo $line['emp_numero']; ?>"
                        placeholder="Número">
                </div>

                <label class="control-label col-sm-1">Telefone</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="telefone" value="<?php echo $line['emp_telefone']; ?>"
                        placeholder="Telefone Comercial">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" name="email" value="<?php echo $line['emp_email']; ?>"
                        placeholder="Email">
                </div>

                <label class="control-label col-sm-1">Senha</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="senha" value="<?php echo $line['emp_senha']; ?>"
                        placeholder="Senha">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-6">
                <button type="submit" name="submit" class="btn btn-primary">Atualizar </button>
                <button type="reset" class="btn btn-danger">Limpar </button>
            </div>
        </div>
        </form>

    </div>

    <?php endforeach; ?>
    <?php endif; ?>

    <?php
if (isset($_POST['submit'])) {
    //nome, cnpj, cpf, endereco, cidade, bairro, estado, num, telefone, email, senha

    $logid = $_POST['logid'];
    $emp_nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $emp_cnpj = filter_var($_POST['cnpj'], FILTER_SANITIZE_STRING);
    $emp_endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_STRING);
    $emp_cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_STRING);
    $emp_bairro = filter_var($_POST['bairro'], FILTER_SANITIZE_STRING);
    $emp_estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
    $emp_num = filter_var($_POST['num'], FILTER_SANITIZE_STRING);
    $emp_telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $emp_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $emp_senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE emp_empregador SET emp_nome = ?, emp_cnpj = ?, "
            . "emp_endereco = ?, emp_cidade = ?, emp_bairro = ?, "
            . "emp_estado = ?, emp_numero = ?, emp_telefone = ?, emp_email = ?,"
            . "emp_senha = ? WHERE emp_id = ?";

    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $emp_nome);
    $stmp->bindParam(2, $emp_cnpj);
    $stmp->bindParam(3, $emp_endereco);
    $stmp->bindParam(4, $emp_cidade);
    $stmp->bindParam(5, $emp_bairro);
    $stmp->bindParam(6, $emp_estado);
    $stmp->bindParam(7, $emp_num);
    $stmp->bindParam(8, $emp_telefone);
    $stmp->bindParam(9, $emp_email);
    $stmp->bindParam(10, $emp_senha);
    $stmp->bindParam(11, $id);
    $stmp->execute();

    $sql = "UPDATE log_login SET log_email = ?, log_senha = ?, "
            . "log_nome = ? WHERE log_id = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $emp_email);
    $stmp->bindParam(2, $emp_senha);
    $stmp->bindParam(3, $emp_nome);
    $stmp->bindParam(4, $logid);
    $stmp->execute();

    print "<script>alert('Alteração feita com sucesso!');</script>";

    if (buscaNivel($_SESSION['user_id']) == 1) {
        print "<script>location.href='EditarUsuarios.php';</script>";
    } elseif (buscaNivel($_SESSION['user_id']) == 2) {
        print "<script>location.href='PerfilEmpresa.php';</script>";
    } elseif (buscaNivel($_SESSION['user_id']) == 3) {
        print "<script>location.href='PerfilUsuario.php';</script>";
    }
}
?>

</body>
<?php include('rodape.php'); ?>