<?php
include('cabecalho.php');

    if ( isset( $_GET['tpuid'] ) ) {
        $tid = (int) $_GET['tpuid']; 
    }
    if ( isset( $_GET['id'] ) ) {
        $id = (int) $_GET['id']; 
    }
    if ( isset( $_GET['logid'] ) ) {
        $logid = (int) $_GET['logid']; 
    }

    if($tid == 1){
        $valor = "EdicaoAdmin.php?id=".$id."&logid=".$logid."";
    }
    else if($tid == 2){
        $valor = "EdicaoEmp.php?id=".$id."&logid=".$logid."";
    }
    else if($tid == 3){
        $valor = "EdicaoUsu.php?id=".$id."&logid=".$logid."";
    }
    echo "<script>window.location.href = '{$valor}'</script>";

include('rodape.php');
?>