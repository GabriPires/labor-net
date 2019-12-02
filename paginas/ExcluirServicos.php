<?php

require('../config/ConexaoPDO.php');

$con = db_connect();

$id = (int) $_GET['id'];

$sql = "DELETE FROM srv_servicos WHERE `srv_servicos`.`srv_id` = ?";
$stmp = $con->prepare($sql);
$stmp->bindParam(1, $id);
$stmp->execute();

echo "<script>window.location.href = 'EditarServicos.php'</script>";
?>