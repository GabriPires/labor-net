<?php

echo '<span style="margin: 50px">';

//  require ("cabecalho.php");
require ("../config/ConexaoPDO.php");

$connection = db_connect();

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$endereco = $_POST['endereco'];
$estado = $_POST['estado'];
$numero = $_POST['numero'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
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
    $sql = "INSERT INTO log_login(log_email, log_senha, log_nome, tpu_id ) VALUES (?,?,?,2)";
    $ins = $connection->prepare($sql);
    $ins->bindParam(1, $email);
    $ins->bindParam(2, $senha);
    $ins->bindParam(3, $nome);
    $ins->execute();

    $sql = "SELECT log_id FROM log_login WHERE log_email LIKE '$email' ";
    $stmp2 = $connection->prepare($sql);
    $stmp2->execute();
    $row = $stmp2->fetchAll(PDO::FETCH_ASSOC);


    foreach ($row as $line) {
        $logidemp = $line["log_id"];
    }


    $sql = "INSERT INTO emp_empregador(emp_nome, emp_cnpj, emp_estado, emp_cidade, emp_bairro, emp_endereco, emp_numero, emp_telefone, emp_email, emp_senha,log_id,tpu_id) VALUES (?,?,?,?,?,?,?,?,?,?," . $logidemp . ",2)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cnpj);
    $stmt->bindParam(3, $estado);
    $stmt->bindParam(4, $cidade);
    $stmt->bindParam(5, $bairro);
    $stmt->bindParam(6, $endereco);
    $stmt->bindParam(7, $numero);
    $stmt->bindParam(8, $telefone);
    $stmt->bindParam(9, $email);
    $stmt->bindParam(10, $senha);
    $stmt->execute();

    $idemp = $connection->lastInsertId();

    $sql = "UPDATE log_login SET log_idusu = $idemp WHERE log_id = $logidemp";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    print "<script>alert('Cadastrado com sucesso!');</script>";
    print "<script>alert('Agora faça seu login!');</script>";
    print "<script>location.href='FormularioLogin.php';</script>";
}



if ($duplicada == 1) {
    print "<script>alert('Email já cadastrado');</script>";
    print "<script>location.href='CadastroEmpresa.php';</script>";
}
?>