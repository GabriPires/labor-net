<?php
require ("cabecalho.php"); 
$id = filter_input(INPUT_POST, 'id_user', FILTER_DEFAULT);

$titulo = $_POST['titulo'];
$remuneracao = $_POST['remuneracao'];
$nvagas = $_POST['nvagas'];
$cargah = $_POST['cargah'];
$cidade = $_POST['cidade'];
$descricaoanuncio = $_POST['descanu'];
$requisitos = $_POST['requisitos'];
$empregador = $_POST['tratar'];

$connection = db_connect();

//$empnome = buscaNome($_SESSION['user_id']);
//
//$sql = "SELECT * FROM emp_empregador WHERE emp_id = ? ";
//$stmt =$connection->prepare($sql);
//$stmt->bindParam(1, $empnome);
//$stmt->execute();
//
//$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nomeEmp = buscaNome($_SESSION['user_id']);
  
  $sql = "INSERT INTO anu_anuncio(anu_titulo, anu_empresa, anu_empregador, anu_remuneracao, anu_numvagas, anu_cargahoraria, anu_cidade, anu_descricaoanuncio, anu_requisitos, emp_id) VALUES (?,?,?,?,?,?,?,?,?,".buscaIdEmp($_SESSION['user_id']).")";
  $stmt =$connection->prepare($sql);
  $stmt->bindParam(1,$titulo);
  $stmt->bindParam(2,$nomeEmp);
  $stmt->bindParam(3,$empregador);
  $stmt->bindParam(4,$remuneracao);
  $stmt->bindParam(5,$nvagas);
  $stmt->bindParam(6,$cargah);
  $stmt->bindParam(7,$cidade);
  $stmt->bindParam(8,$descricaoanuncio);
  $stmt->bindParam(9,$requisitos);
  $stmt->execute();
  
  print "<script>alert('Suas vagas foram cadastradas com sucesso!');</script>";
    print "<script>location.href='VagasEmprego.php';</script>";  
  ?>