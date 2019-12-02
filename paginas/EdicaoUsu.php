<?php
include('cabecalho.php');

$con = db_connect();
?>

<body>
    <?php
    $id = (int) $_GET['id'];
    $log_id = (int) filter_var($_GET['logid'], FILTER_VALIDATE_INT);

    $sql = "SELECT * FROM usu_usuario WHERE usu_id = ?";
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
        <form class="form-horizontal" action="EdicaoUsu.php?id=<?php echo $id; ?>&logid=<?php echo $log_id; ?>"
            method="post" />

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="<?php echo $line['usu_nome']; ?>"
                        placeholder="Nome">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">CPF</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="cpf" value="<?php echo $line['usu_cpf']; ?>"
                        placeholder="CPF">
                    <input type="hidden" class="form-control" name="logid" value="<?php echo $log_id; ?>"
                        placeholder="CNPJ">
                </div>

                <label class="control-label col-sm-1">Telefone</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="telefone" value="<?php echo $line['usu_telefone']; ?>"
                        placeholder="Telefone">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" name="email" value="<?php echo $line['usu_email']; ?>"
                        placeholder="Email">
                </div>

                <label class="control-label col-sm-1">Senha</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="senha" value="<?php echo $line['usu_senha']; ?>"
                        placeholder="Senha">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="descrição">Descrição do perfil:</label>

                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="descricao"
                        placeholder="Escreva um pouco sobre você..."><?php echo $line['usu_descricaoperfil']; ?></textarea>
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

    </div>

    <?php endforeach; ?>
    <?php endif; ?>

    <?php
if (isset($_POST['submit'])) {
    //nome, cnpj, cpf, endereco, cidade, bairro, estado, num, telefone, email, senha

    $logid = $_POST['logid'];
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
    $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE usu_usuario SET usu_nome = ?, usu_cpf = ?, "
            . "usu_telefone = ?, usu_email = ?, usu_senha = ?, "
            . "usu_descricaoperfil = ? WHERE usu_id = ?";

    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $nome);
    $stmp->bindParam(2, $cpf);
    $stmp->bindParam(3, $telefone);
    $stmp->bindParam(4, $email);
    $stmp->bindParam(5, $senha);
    $stmp->bindParam(6, $descricao);
    $stmp->bindParam(7, $id);
    $stmp->execute();

    $sql = "UPDATE log_login SET log_email = ?, log_senha = ?, "
            . "log_nome = ? WHERE log_id = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $email);
    $stmp->bindParam(2, $senha);
    $stmp->bindParam(3, $nome);
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