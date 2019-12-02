<?php

require ("cabecalho.php");

$titulo = $_POST['titulo'];
$remuneracao = $_POST['remuneracao'];
$numvagas = $_POST['numvagas'];
$cargah = $_POST['cargah'];
$cidade = $_POST['cidade'];
$descricaoanuncio = $_POST['descanu'];
$requisitos = $_POST['requisitos'];
$id = $_POST['id'];

//$id = (int) $_GET['id'];

$connection = db_connect();

$sql = "UPDATE anu_anuncio SET anu_titulo = ?, anu_cidade = ?, anu_remuneracao = ?, anu_numvagas = ?, anu_cargahoraria = ?, anu_descricaoanuncio = ?, anu_requisitos = ? WHERE anu_id = ? ";
$stmt = $connection->prepare($sql);
$stmt->bindParam(1, $titulo);
$stmt->bindParam(2, $cidade);
$stmt->bindParam(3, $remuneracao);
$stmt->bindParam(4, $numvagas);
$stmt->bindParam(5, $cargah);
$stmt->bindParam(6, $descricaoanuncio);
$stmt->bindParam(7, $requisitos);
$stmt->bindParam(8, $id);
$stmt->execute();



if (buscaNivel($_SESSION['user_id']) == 2) {
    echo "<script>window.location.href = 'EditarVagas.php'</script>";
} else if (buscaNivel($_SESSION['user_id']) == 1) {
    echo "<script>window.location.href = 'VagasEmprego.php'</script>";
}

require ("rodape.php");
?>