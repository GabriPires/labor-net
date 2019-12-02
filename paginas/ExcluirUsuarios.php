<?php

include('cabecalho.php');

$con = db_connect();

$id = (int) $_GET['id'];
$tpuid = (int) $_GET['tpuid'];
$logid = (int) $_GET['logid'];

if ($tpuid == 3) {
    $sql = "DELETE FROM `log_login` WHERE `log_login`.`log_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $logid);
    $stmp->execute();

    //USUARIO    
    $sql = "DELETE FROM `usu_usuario` WHERE `usu_usuario`.`usu_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $sql = "DELETE FROM `usu_interesse` WHERE `usu_interesse`.`usu_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $sql = "DELETE FROM `usu_curriculo` WHERE `usu_curriculo`.`usu_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $sql = "DELETE FROM `srv_servicos` WHERE `srv_servicos`.`usu_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();
} elseif ($tpuid == 2) {
    $sql = "DELETE FROM `log_login` WHERE `log_login`.`log_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $logid);
    $stmp->execute();

    //EMPRESA
    $sql = "DELETE FROM `emp_empregador` WHERE `emp_empregador`.`emp_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $sql = "DELETE FROM `anu_anuncio` WHERE `anu_anuncio`.`emp_id` = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();
}
print "<script>location.href='EditarUsuarios.php';</script>";
?>