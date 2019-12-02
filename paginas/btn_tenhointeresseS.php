<?php
include ("cabecalho.php");

$id = $_SESSION['anu_id'];
$dup = $_SESSION['dup'];

$usu_id = buscaUsuId($_SESSION['user_id']);

$connection = db_connect();
 
if ($dup == 1){
$sql = "INSERT INTO usu_interesse (usu_id, usu_srv_id) VALUES ($usu_id,$id) ";
    $stmp = $connection->prepare($sql);
    $stmp->execute();
     
 print "<script>alert('Você declarou interesse nesse emprego!!');</script>";     
 print "<script>location.href='VagasServico.php';</script>";  
  
}
if ($dup == 0){
    
 $sql = "DELETE  FROM  usu_interesse WHERE usu_id = $usu_id AND usu_srv_id = $id";
  $stmp = $connection->prepare($sql);
    $stmp->execute();
    
     print "<script>alert('Você retirou interesse nesse emprego!!');</script>";
     print "<script>location.href='VagasServico.php';</script>";  
}

  
$usu_id = 0; 
$id = 0;


?>