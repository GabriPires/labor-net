<?php

require('../config/ConexaoPDO.php');

$con = db_connect();

$id = (int) $_GET['id'];

$sql = "DELETE FROM anu_anuncio WHERE `anu_anuncio`.`anu_id` = ?";
$stmp = $con->prepare($sql);
$stmp->bindParam(1, $id);
$stmp->execute();

if (buscaNivel($_SESSION['user_id']) == 2) {
    echo "<script>window.location.href = 'EditarVagas.php'</script>";
} else if (buscaNivel($_SESSION['user_id']) == 1) {
    echo "<script>window.location.href = 'EditarVagasAdmin.php'</script>";
}
?>