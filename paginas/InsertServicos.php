<?php
require ("cabecalho.php"); 
$id = filter_input(INPUT_POST, 'id_user', FILTER_DEFAULT);

$titulo = $_POST['titulo'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$bairro = $_POST['bairro'];
$descricaosrv = $_POST['descsrv'];
$telefone = $_POST['telefone'];
$numero = $_POST['numero'];

$connection = db_connect();

//$empnome = buscaNome($_SESSION['user_id']);
//
//$sql = "SELECT * FROM emp_empregador WHERE emp_id = ? ";
//$stmt =$connection->prepare($sql);
//$stmt->bindParam(1, $empnome);
//$stmt->execute();
//
//$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $sql = "INSERT INTO srv_servicos(srv_titulo, srv_endereco, srv_estado, srv_bairro, srv_cidade, srv_numero, srv_telefone, srv_descricao, usu_id) VALUES (?,?,?,?,?,?,?,?,".buscaIdUsu($_SESSION['user_id']).")";
  $stmt =$connection->prepare($sql);
  $stmt->bindParam(1,$titulo);
  $stmt->bindParam(2,$endereco);
  $stmt->bindParam(3,$estado);
  $stmt->bindParam(4,$bairro);
  $stmt->bindParam(5,$cidade);
  $stmt->bindParam(6,$numero);
  $stmt->bindParam(7,$telefone);
  $stmt->bindParam(8,$descricaosrv);
  $stmt->execute();
  
  print "<script>alert('Sua solicitação de serviço foi cadastrada com sucesso!');</script>";
    print "<script>location.href='../index.php';</script>";  
  ?>