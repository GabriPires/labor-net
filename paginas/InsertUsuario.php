<?php

require ("cabecalho.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$descricaodoperfil = $_POST['descper'];

$connection = db_connect();
$duplicada = 0;

$sql = "SELECT * from log_login";
$stmp = $connection->prepare($sql);
$stmp->execute();
$row = $stmp->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $line) {

    if ($email == $line["log_email"]) {
        $duplicada = 1;
    }
}

if ($duplicada == 0) {
    $sql = "INSERT INTO log_login(log_email, log_senha, log_nome, tpu_id) VALUES (?,?,?,3)";
    $ins = $connection->prepare($sql);
    $ins->bindParam(1, $email);
    $ins->bindParam(2, $senha);
    $ins->bindParam(3, $nome);
    $ins->execute();

    $sql = "SELECT log_id FROM log_login WHERE log_email LIKE '$email' ";
    $stmp = $connection->prepare($sql);
    $stmp->execute();
    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


    foreach ($row as $line) {
        $logidusu = $line["log_id"];
    }


    $sql = "INSERT INTO usu_usuario(usu_nome, usu_cpf, usu_telefone, usu_email, usu_senha, usu_descricaoperfil, tpu_id, log_id) VALUES (?,?,?,?,?,?,3," . $logidusu . ")";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cpf);
    $stmt->bindParam(3, $telefone);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $senha);
    $stmt->bindParam(6, $descricaodoperfil);
    $stmt->execute();
    
    $idusu = $connection->lastInsertId();

    $sql = "UPDATE log_login SET log_idusu = $idusu WHERE log_id = $logidusu";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    
    print "<script>alert('Cadastrado com sucesso!');</script>";
    print "<script>alert('Agora faça seu login!');</script>";
    print "<script>location.href='FormularioLogin.php';</script>";
    
} if ($duplicada == 1) {
    print "<script>alert('Email já cadastrado');</script>";
    print "<script>location.href='CadastroUsuario.php';</script>";
}
?>

