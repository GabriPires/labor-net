<?php
include('cabecalho.php');

//$busca = $_POST['busca'];

$con = db_connect();
?>

<body>
    <?php
    $sql = "SELECT * FROM anu_anuncio WHERE emp_id = " . buscaIdEmp($_SESSION['user_id']) . "";
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
                    <th>Remuneração</th>
                    <th>Numero De Vagas</th>
                    <th>Editar</th>
                    <th>Excluir</th>


                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($row as $line) {
                        echo '<tr>';
                        echo '<td>' . $line["anu_titulo"] . '</td>';
                        echo '<td>' . $line["anu_cidade"] . '</td>';
                        echo '<td>' . "R$ " . $line["anu_remuneracao"] . '</td>';
                        echo '<td>' . $line["anu_numvagas"] . '</td>';
                        echo '<td><a href="EdicaoVaga.php?id=' . $line["anu_id"] . '" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>';
                        echo '<td><a href="ExcluirVaga.php?id='.$line['anu_id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</a></td>';
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
<?php
include('rodape.php')
?>