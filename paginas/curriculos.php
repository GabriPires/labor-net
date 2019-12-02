<?php
// require ("../config/ConexaoPDO.php");
include('cabecalho.php');
$usu_id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$con = db_connect();

                            $sql = "SELECT usu_curriculo FROM usu_usuario WHERE usu_id = $usu_id";
                            $stmp = $con->prepare($sql);
                            $stmp->execute();
                            $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


                            foreach ($row as $line) {
                                $s = $line["usu_curriculo"];
                            }
if($s == 'SIM'){


                            $sql = "SELECT * FROM usu_usuario WHERE usu_id = $usu_id";
                            $stmp = $con->prepare($sql);
                            $stmp->execute();

                            $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($row as $line) {
                                $email = $line["usu_email"];
                                
                            }
      
                            
                           
// if (buscaNivel($_SESSION['user_id']) == 3){
print "<script>location.href='../Curriculos/$email.docx';</script>";   
     print "<script>location.href='PerfilUsuario.php';</script>";}
// if (buscaNivel($_SESSION['user_id']) == 2){
//         print "<script>location.href='../Curriculos/$email.docx';</script>";   
//     print "<script>location.href='MinhasVagas.php';</script>";}
//}
else {
    if (buscaNivel($_SESSION['user_id']) == 3){
          print "<script>alert('Você ainda não cadastrou seu curriculo');</script>";
          print "<script>location.href='CadastroCurriculo.php';</script>";  
          
   }else{
        print "<script>alert('Esse usuario ainda não cadastrou um curriculo');</script>";
          print "<script>location.href='MinhasVagas.php';</script>";  
   
    
}
}
?>