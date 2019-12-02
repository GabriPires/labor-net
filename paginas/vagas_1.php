<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include ("cabecalho.php");
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        $con = db_connect();

         

        $sql = "SELECT * FROM anu_anuncio WHERE anu_id = $id";
        $stmp = $con->prepare($sql);
        $stmp->execute();

        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);

        if ($row == 0) {
            echo "Nenhum resultado!";
        } else {
            ?>
            <div class="container">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> Titulo </th>
                            <th> Cidade </th>
                            <th> Remuneração </th>
                            <th> Numero De Vagas  <i class="fa fa-search"  aria-hidden="true"></i></th>
                            <th> Carga Horaria </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["anu_titulo"] . '</td>';
                            echo '<td>' . $line["anu_cidade"] . '</td>';
                            echo '<td>' . "R$:" . $line["anu_remuneracao"] . '</td>';
                            echo '<td>' . $line["anu_numvagas"] . '</td>';
                            echo '<td>' . $line["anu_cargahoraria"] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> Descrição </th>
                            <th> Requisitos </th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["anu_descricaoanuncio"] . '</td>';
                            echo '<td>' . $line["anu_requisitos"] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
        }













// Para usuarios 
        if (isLoggedIn()) {

            if (buscaNivel($_SESSION['user_id']) == 3) {
                echo 'Informacoes empresa';
                ?>

                <?php
                $connection = db_connect();

                $sql = "SELECT emp_id FROM anu_anuncio WHERE anu_id = '$id' ";
                $stmp = $connection->prepare($sql);
                $stmp->execute();
                $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


                foreach ($row as $line) {
                    $empid = $line["emp_id"];
                }
                ?>



        <?php
        $sql = "SELECT * FROM emp_empregador WHERE emp_id = '$empid'";
        $stmp = $connection->prepare($sql);
        $stmp->execute();

        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
        ?>
                <div class="container">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Nome </th>
                                <th> CNPJ </th>
                                <th> CPF </th>
                                <th> Estado  <i class="fa fa-search"  aria-hidden="true"></i></th>
                                <th> Cidade </th>


                            </tr>
                        </thead>
                        <tbody>
        <?php
        foreach ($row as $line) {
            echo '<tr>';
            echo '<td>' . $line["emp_nome"] . '</td>';
            echo '<td>' . $line["emp_cnpj"] . '</td>';
            echo '<td>' . "R$:" . $line["emp_cpf"] . '</td>';
            echo '<td>' . $line["emp_estado"] . '</td>';
            echo '<td>' . $line["emp_cidade"] . '</td>';

            echo '</tr>';
        }
        ?>
                        </tbody>
                    </table>
                </div>

                <div class="container">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Bairro </th>
                                <th> Endereco </th>
                                <th> Numero </th>
                                <th> Email </th>


                            </tr>
                        </thead>
                        <tbody>
        <?php
        foreach ($row as $line) {
            echo '<tr>';
            echo '<td>' . $line["emp_bairro"] . '</td>';
            echo '<td>' . $line["emp_endereco"] . '</td>';
            echo '<td>' . "R$:" . $line["emp_numero"] . '</td>';
            echo '<td>' . $line["emp_email"] . '</td>';


            echo '</tr>';
        }
        ?>
                        </tbody>
                    </table>
                </div>

        

<!--Teste de intetesse duplicado -->
<?php
$dup = 1;
$_SESSION['dup'] = $dup;
$usu_id = buscaUsuId($_SESSION['user_id']);


$sql = "SELECT * from usu_interesse";
$stmp = $connection->prepare($sql);
$stmp->execute();
$row = $stmp->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $line) {

    if ((( $line["usu_id"] == $usu_id)) && ($line["usu_anu_id"] == $id)){
  $dup = 0;
   $_SESSION['dup'] = $dup;
        }
}

  $_SESSION['anu_id'] = $id;

if ($dup == 1) {
 


  
    ?>

        </html>
        <html>
        <div class="form-group">
            <div class="control-label col-sm-6">

                <form action=btn_tenhointeresse.php method=get >
                     
                    <input type=submit value='Tenho Interesse' />
                </form>
            </div>
        </div>
        </form> 
</html>

<?php } else {
    
    echo "Você declarou interrese nesse emprego!";
  
?>
    
    <html>
        <div class="form-group">
            <div class="control-label col-sm-6">

                <form action=btn_tenhointeresse.php method=get >
                     
                    <input type=submit value='Retirar Interesse' />
                </form>
            </div>
        </div>
        </form> 
</html>
<?php } 
                   

?>


    <?php  
//    echo '<td><a href="btn_Tenhointeresse.php?id='.$id.'">Tenho Interesse</i></a></td>';

        }
} ?>






        
<!--        PARA EMPRESAS -->


<?php

$sql = "SELECT emp_id from anu_anuncio WHERE anu_id = $id";
    $stmp = $con->prepare($sql);
    $stmp->execute();

    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);

    foreach ($row as $line){
        
        $emp_anu = $line["emp_id"];
    }
    
if (isLoggedIn()) {
    if (buscaNivel($_SESSION['user_id']) == 2 && buscaIdEmp($_SESSION['user_id']) == $emp_anu ) {
        
        ?>


        
        <?php
  
        
        $sql = "SELECT COUNT(usu_id) FROM usu_interesse WHERE usu_anu_id = $id";
        $stmp = $con->prepare($sql);
        $stmp->execute();
        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach ($row as $key) 
        {
            $s = $key["COUNT(usu_id)"];
        

 if ($s > 0){
?>     
     <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> Nome </th>
                        <th> CPF </th>
                        <th> Telefone </th>
                         <th> Email </th>
                        <th> Descriçâo </th>
                     


                    </tr>
                </thead>
                <tbody>

     <?php
     echo "Interessados";
     echo "";

     $sql = "SELECT usu_id FROM usu_interesse WHERE usu_anu_id = $id";
    $stmp = $con->prepare($sql);
    $stmp->execute();
    
        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $line) {
       $idInteressado = $line["usu_id"];
    
    
    $sql = "SELECT * FROM usu_usuario WHERE usu_id = $idInteressado";
    $stmp = $con->prepare($sql);
    $stmp->execute();

    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
$s = 0;
        
if ($row == 0) {
        echo "Nenhum resultado!";
        $s = 1;
    } if( $s==0) { 

        ?>


                <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["usu_nome"] . '</td>';
                              echo '<td>' . $line["usu_cpf"] . '</td>';
                            echo '<td>' . $line["usu_telefone"] . '</td>';
                            echo '<td>'."R$:" . $line["usu_email"] . '</td>';
                            echo '<td>' . $line["usu_descricaoperfil"] . '</td>';
                            echo '<td><a href="curriculos.php?id='.$line["usu_id"].'">Abrir</i></a></td>';
                            echo '</tr>';
    }}}
                        ?>
   
                    </tbody>
                </table>
            </div>

    


    <?php } else {
        
        echo "Por enquanto nao existem pessoas interessadas";
    }
}
    }
}?>







</body>
</html>

