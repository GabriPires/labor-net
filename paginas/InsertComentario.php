<?php
include('cabecalho.php');
    
 
    $comentario = $_POST['comentario'];
    $nome = buscaNome($_SESSION['user_id']);
    $AS = $_SESSION['AS'];
    $AS_ID = $_SESSION['AS_ID'];
    $connection = db_connect();
    
if($AS == 'anu'){
    
  $sql = "INSERT INTO comentarios( coment_anu_id ,coment,coment_nome) VALUES (?,?,?)";
  $stmt =$connection->prepare($sql);
  $stmt->bindParam(1,$AS_ID);
  $stmt->bindParam(2,$comentario);
  $stmt->bindParam(3,$nome);
  $stmt->execute();
   echo "<script>alert('Comentario enviado com sucesso!')</script>";
 echo "<script>location.href='vagas.php?id=$AS_ID'</script>";
  
}

if($AS == 'srv'){
    
  $sql = "INSERT INTO comentarios( coment_srv_id ,coment,coment_nome) VALUES (?,?,?)";
  $stmt =$connection->prepare($sql);
  $stmt->bindParam(1,$AS_ID);
  $stmt->bindParam(2,$comentario);
  $stmt->bindParam(3,$nome);
  $stmt->execute();
   echo "<script>alert('Comentario enviado com sucesso!')</script>";
 echo "<script>location.href='vagasSrv.php?id=$AS_ID'</script>";
}



?>


    
    