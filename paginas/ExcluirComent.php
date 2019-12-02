<?php

require('../config/ConexaoPDO.php');

$con = db_connect();

$coment_id = (int) $_GET['coment_id'];
$id = (int)$_GET['id'];

$sql = "DELETE FROM comentarios WHERE `coment_id` = $coment_id";
$stmp = $con->prepare($sql);
$stmp->execute();


 echo"<script>alert('Comentario Excluido com sucesso!');</script>";
 echo "<script>location.href='vagas.php?id=$id'</script>";

?>
