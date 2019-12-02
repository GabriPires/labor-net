<?php
include ("cabecalho.php");
$con = db_connect();
?>

<body>
    <?php
    $usu_id = buscaIdUsu($_SESSION['user_id']);
    $sql = "(SELECT * FROM srv_servicos WHERE usu_id = $usu_id )";
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
                        <th>Titulo</th>
                        <th>Cidade</th>
                        <th>Descrição</th>
                        <th>Telefone</th>
                        <th>Visualizar</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($row as $line) {
                        echo '<tr>';
                        echo '<td>' . $line["srv_titulo"] . '</td>';
                        echo '<td>' . $line["srv_cidade"] . '</td>';
                        echo '<td>' . $line["srv_descricao"] . '</td>';
                        echo '<td>' . $line["srv_telefone"] . '</td>';
                        echo '<td><a class="btn btn-info" href="vagasSrv.php?id=' . $line["srv_id"] . '&aut_id=' . $line["usu_id"] . '">Abrir</i></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
    }
    ?>

</body>
</html