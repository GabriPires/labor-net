<?php
include('cabecalho.php');

//$busca = $_POST['busca'];

$con = db_connect();
?>

<body>
    <?php
    if (buscaNivel($_SESSION['user_id']) == 1) {
        $sql = "SELECT * FROM srv_servicos";
    } else {
        $sql = "SELECT * FROM srv_servicos WHERE usu_id = " . buscaIdUsu($_SESSION['user_id']) . "";
    }

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
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>


                </tr>
            </thead>
            <tbody>
                <?php
    foreach ($row as $line) {
        echo '<tr>';
        echo '<td>' . $line["srv_titulo"] . '</td>';
        echo '<td>' . $line["srv_descricao"] . '</td>';
        echo '<td><a href="EdicaoServicos.php?id=' . $line["srv_id"] . '" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
        echo '<a href="ExcluirServicos.php?id=' . $line['srv_id'] . '" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</a></td>';
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