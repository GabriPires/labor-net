
<?php
include ("cabecalho.php");

$con = db_connect();
?>

<body>
    <?php
    $sql = "SELECT * FROM srv_servicos";
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
                        <th> Descricao </th>
                        <th> Telefone</th>
                        <th> Visualizar </th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($row as $line) {
                        ?>
                        <tr>
                            <td><?php echo $line["srv_titulo"] ?></td>
                            <td><?php echo $line["srv_cidade"] ?></td>
                            <td><?php echo $line["srv_descricao"] ?></td>
                            <td><?php echo $line["srv_telefone"] ?></td>
                            <td><a class="btn btn-info" href="vagasSrv.php?id=<?php echo $line["srv_id"] ?>">Abrir</a></td>  
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
    }
    ?>

</body>
</html>

<html > <center>
        <?php
        if (isLoggedIn()) {
            if (buscaNivel($_SESSION['user_id']) == 3) {

                echo '<td><a href="interessesSrv.php">Meus Interesses</i></a></td>';
            }
        }
        ?>
</html>
