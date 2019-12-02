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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["anu_titulo"] . '</td>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> Tratar Com </th>
                            <th> Cidade </th>
                            <th> Remuneração </th>
                            <th> Numero De Vagas</th>
                            <th> Carga Horaria </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["anu_empregador"] . '</td>';
                            echo '<td>' . $line["anu_cidade"] . '</td>';
                            echo '<td>' . "R$ " . $line["anu_remuneracao"] . '</td>';
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
                echo '<center>';
                echo '<h4><b>Informações da empresa</b></h4>';
                echo '</center>';
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
                                <th> Cidade</th>
                                <th> Estado </th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($row as $line) {
                                echo '<tr>';
                                echo '<td>' . $line["emp_nome"] . '</td>';
                                echo '<td>' . $line["emp_cnpj"] . '</td>';
                                echo '<td>' . $line["emp_cidade"] . '</td>';
                                echo '<td>' . $line["emp_estado"] . '</td>';

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
                                <th> Endereço </th>
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
                                echo '<td>' . $line["emp_numero"] . '</td>';
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

                    if ((( $line["usu_id"] == $usu_id)) && ($line["usu_anu_id"] == $id)) {
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
                    <div class="control-label col-sm-3">
                        <form action=btn_tenhointeresse.php method=get >
                            <center>
                                <input class="btn btn-primary" type=submit value='Tenho Interesse'/>
                            </center>
                        </form>
                    </div>
                </div>
            </form> 
            </html>

            <?php
        } else {

            echo '<center>';
            echo '<h4><b>Você declarou interrese nesse emprego!</b></h4>';
            echo '</center>';
            ?>

            <html>
                <div class="form-group">
                    <div class="control-label col-sm-3">
                        <form action=btn_tenhointeresse.php  method=get >
                            <center>
                                <input class="btn btn-primary" type=submit value='Retirar Interesse'/>
                            </center>
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
}
?>







<!--        PARA EMPRESAS -->


<?php
$sql = "SELECT emp_id from anu_anuncio WHERE anu_id = $id";
$stmp = $con->prepare($sql);
$stmp->execute();

$row = $stmp->fetchAll(PDO::FETCH_ASSOC);

foreach ($row as $line) {

    $emp_anu = $line["emp_id"];
}

if (isLoggedIn()) {
    if (buscaNivel($_SESSION['user_id']) == 2 && buscaIdEmp($_SESSION['user_id']) == $emp_anu) {
        ?>



        <?php
        $sql = "SELECT COUNT(usu_id) FROM usu_interesse WHERE usu_anu_id = $id";
        $stmp = $con->prepare($sql);
        $stmp->execute();
        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


        foreach ($row as $key) {
            $s = $key["COUNT(usu_id)"];


            if ($s > 0) {
                ?>     
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Nome </th>
                                <th> CPF </th>
                                <th> Telefone </th>
                                <th> Email </th>
                                <th> Descrição </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            echo "<h4><b>Interessados</b></h4>";
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
                                } if ($s == 0) {
                                    ?>


                                    <?php
                                    foreach ($row as $line) {
                                        echo '<tr>';
                                        echo '<td>' . $line["usu_nome"] . '</td>';
                                        echo '<td>' . $line["usu_cpf"] . '</td>';
                                        echo '<td>' . $line["usu_telefone"] . '</td>';
                                        echo '<td>' . $line["usu_email"] . '</td>';
                                        echo '<td>' . $line["usu_descricaoperfil"] . '</td>';
                                        echo '<td><a href="curriculos.php?id=' . $line["usu_id"] . '">Ver Currículo</i></a></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>




                <?php
            } else {
                echo "<center>";
                echo "<h4><b>Por enquanto não existem pessoas interessadas</b><h4>";
                echo "</center>";
            }
        }
    }
}
?>

<?php
if (isLoggedIn()) {

    echo "<h3> <br> <br> <center> Comentários  </center></h3>";
    echo "<br><br>";
    $sql = "SELECT * FROM comentarios WHERE coment_anu_id = $id";
    $stmp = $con->prepare($sql);
    $stmp->execute();

    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
    ?>
                                                <!--    <table width="30%" border="1" align="left">
    <?php
    foreach ($row as $line) {
//  echo "<table width=40% border=1 align=left>";     
        echo "<tr>";
        echo "<td width=30%>" . $line['coment_nome'] . "</td>";
        echo "<td width=99%><pre>" . $line['coment'] . "</pre></td>";
        if (buscaNivel($_SESSION['user_id']) == 1) {
            echo '<td><a href="ExcluirComent.php?coment_id=' . $line['coment_id'] . '&id=' . $id . 'class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</a></td>';
        }
        echo"</tr>";
//  echo"</table>";
        echo"<br><br>";
    }
    ?>

                                                    </table>-->
    </html>

    <?php
    foreach ($row as $line) {
        ?>
        <form class="form-horizontal" action="" method="post" >
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="text"></label>   
                        <label class="col-sm-1" for="text"><?php echo $line['coment_nome']; ?></label>
                        <div class="col-sm-7">
                            <?php
                            echo "<pre>" . $line['coment'] . "</pre>";
                            if (buscaNivel($_SESSION['user_id']) == 1) {
                                echo '<a href="ExcluirComent.php?coment_id=' . $line['coment_id'] . '&id=' . $id . 'class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--                <hr>-->
            </div>
        </form>
        <?php
    }
    ?>

    <form class="form-horizontal" action="InsertComentario.php" method="post" >  
        <div class="form-group">
            <label class="control-label col-sm-3" for="comentario">Deixe seu cometário aqui:</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="3" name="comentario" placeholder="" ></textarea>
            </div>
        </div>

        <div class="row">

        </div>

        <div class="form-group">
            <div class="control-label col-sm-6">
                <button  type="submit" name="submit" class="btn btn-primary">Comentar </button>
                <button  type="reset" class="btn btn-danger">Limpar </button>
            </div> 
        </div>
    </form>  
    </body>
    </html>
    <?php
    $_SESSION['AS'] = 'anu';
    $_SESSION['AS_ID'] = $id;
}
?>