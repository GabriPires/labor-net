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
        if (buscaNivel($_SESSION['user_id']) != 1) {
            $usu_id = buscaIdUsu($_SESSION['user_id']);
        }

        $sql = "SELECT * FROM srv_servicos WHERE srv_id = $id";
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
                            <th> Endereço </th>
                            <th> Bairro </th>
                            <th> Cidade </th>
                            <th> Número </th>
                            <th> Estado</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["srv_titulo"] . '</td>';
                            echo '<td>' . $line["srv_endereco"] . '</td>';
                            echo '<td>' . $line["srv_bairro"] . '</td>';
                            echo '<td>' . $line["srv_cidade"] . '</td>';
                            echo '<td>' . $line["srv_numero"] . '</td>';
                            echo '<td>' . $line["srv_estado"] . '</td>';
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["srv_descricao"] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
        }



        $sql = "SELECT * FROM srv_servicos WHERE srv_id = $id";
        $stmp = $con->prepare($sql);
        $stmp->execute();
        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);

        foreach ($row as $line) {
            $aut_id = $line["usu_id"];
        }


        if ((buscaNivel($_SESSION['user_id']) != 1) || (buscaNivel($_SESSION['user_id']) != 1)) {
            if (isLoggedIn()) {

                if ((buscaNivel($_SESSION['user_id']) == 3 && ($usu_id != $aut_id))) {
                    echo "<center>";
                    echo '<h4>Informações autor do serviço</h4>';
                    echo "</center>";






                    $sql = "SELECT * FROM usu_usuario WHERE usu_id = '$aut_id'";
                    $stmp = $con->prepare($sql);
                    $stmp->execute();

                    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="container">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> Nome </th>
                                    <th> CPF </th>
                                    <th> Telefone </th>
                                    <th> Email  <i class="fa fa-search"  aria-hidden="true"></i></th>
                                    <th> Dercriçâo </th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($row as $line) {
                                    echo '<tr>';
                                    echo '<td>' . $line["usu_nome"] . '</td>';
                                    echo '<td>' . $line["usu_cpf"] . '</td>';
                                    echo '<td>' . $line["usu_telefone"] . '</td>';
                                    echo '<td>' . $line["usu_email"] . '</td>';
                                    echo '<td>' . $line["usu_descricaoperfil"] . '</td>';

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
                    $stmp = $con->prepare($sql);
                    $stmp->execute();
                    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($row as $line) {

                        if ((( $line["usu_id"] == $usu_id)) && ($line["usu_srv_id"] == $id)) {
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
                            <form action=btn_tenhointeresseS.php method=get >
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
                echo "<center>";
                echo "<h4>Você declarou interrese nesse serviço!</h4>";
                echo "</center>";
                ?>

                <html>
                    <div class="form-group">
                        <div class="control-label col-sm-3">
                            <form action=btn_tenhointeresseS.php method=get >
                                <center>
                                    <input class="btn btn-primary" type=submit value='Retirar Interesse'/>
                                </center>
                            </form>
                        </div>
                    </div>
                </form> 
                </html>


                <?php
            }
        }


        if (($usu_id == $aut_id) || (buscaNivel($_SESSION['user_id']) == 1)) {
            $sql = "SELECT COUNT(usu_id) FROM usu_interesse WHERE usu_srv_id = $id";
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
                                    <th> Descriçâo </th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                echo "Interessados";
                                echo "";

                                $sql = "SELECT usu_id FROM usu_interesse WHERE usu_srv_id = $id";
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
                    echo "Por enquanto nao existem pessoas interessadas";
                    echo "</center>";
                }
            }
        }
    }
}
?>



<!--            COMENTARIOS-->
<?php
if (isLoggedIn()) {

    echo "<h3> <br> <br> <center> Comentários  </center></h3>";
    echo "<br><br>";
    $sql = "SELECT * FROM comentarios WHERE coment_srv_id = $id";
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
            echo "<td width=99%>" . $line['coment'] . "</td>";
            echo"</tr>";
//  echo"</table>";
            echo"<br><br>";
        }
        ?>
    </table> -->

    <?php
    foreach ($row as $line) {
        ?>
        <form class="form-horizontal" action="" method="post" >
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="text"></label>   
                        <label class="col-sm-1" for="text"><?php echo $line['coment_nome']; ?></label>
                        <div class="col-sm-3">
                            <?php echo "<pre>" . $line['coment'] . "</pre>";  
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
    $_SESSION['AS'] = 'srv';
    $_SESSION['AS_ID'] = $id;
}
?>






