<?php
include ("cabecalho.php");
$con = db_connect();
?>

<body>
    <?php
    $id_emp = buscaIdEmp($_SESSION['user_id']);
    $sql = "(SELECT * FROM anu_anuncio WHERE emp_id = $id_emp )";
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
                        <th> Numero De Vagas</th>
                        <th> Visualizar </th>


                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["anu_titulo"] . '</td>';
                            echo '<td>' . $line["anu_cidade"] . '</td>';
                            echo '<td>'."R$ " . $line["anu_remuneracao"] . '</td>';
                            echo '<td>' . $line["anu_numvagas"] . '</td>';
                            echo '<td><a href="vagas.php?id=' . $line["anu_id"] . '" class="btn btn-info">Abrir</i></a></td>';
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