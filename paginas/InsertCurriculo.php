<?php

require ("cabecalho.php");
//  
//  $formacao = $_POST['formacao'];
//  $exp = $_POST['experiencia'];
//  $comp = $_POST['complementares'];
//  $info = $_POST['informacoes'];
//  
//  
//  $connection = db_connect();
//
//   $usu_id = buscaUsuId($_SESSION['user_id']);
// $sql = "INSERT INTO usu_curriculo(usu_formacao, usu_exp, usu_ati, usu_inf, usu_id) VALUES (?,?,?,?,$usu_id)";
//  $stmt =$connection->prepare($sql);
//  $stmt->bindParam(1,$formacao);
//  $stmt->bindParam(2,$exp);
//  $stmt->bindParam(3,$comp);
//  $stmt->bindParam(4,$info); 
//  $stmt->execute();
//  
//   print "<script>alert('Curriculo salvo com sucesso!');</script>";
//    print "<script>location.href='PerfilUsuario.php';</script>";
//    
$uploaddir = 'C:\xampp\htdocs\Site\Curriculos/';
$uploadfile = $uploaddir . buscaEmail($_SESSION['user_id']) . '.docx';
//        . basename($_FILES['userfile']['name']);
$id = buscaIdUsu($_SESSION['user_id']);
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    print "<script>alert('Curriculo salvo com sucesso!');</script>";
    $sql = "UPDATE usu_usuario SET usu_curriculo = 'SIM'  WHERE usu_id = $id ";
    $stmp = $con->prepare($sql);
    $stmp->execute();
    print "<script>location.href='PerfilUsuario.php';</script>";
} else {
    print "<script>alert('Algo deu errado!');</script>";
    print "<script>alert('O curriculo deve ser salvo em documento de texto');</script>";
    print "<script>location.href='CadastroCurriculo.php';</script>";
}

print "</pre>";
?>