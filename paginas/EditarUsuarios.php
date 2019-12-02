<?php
    include('cabecalho.php');
    
//$busca = $_POST['busca'];

$con = db_connect();
?>

<body>
    <?php
    $sql = "SELECT * FROM log_login WHERE tpu_id != 1";
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["log_nome"] . '</td>';
                            echo '<td>' . $line["log_email"] . '</td>';
                            echo '<td><a href="EdicaoUsuarios.php?id='.$line["log_idusu"].'&tpuid='.$line["tpu_id"].'&logid='.$line["log_id"].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span> Editar 
                                       </a>
                                  ';
                            echo '<a href="ExcluirUsuarios.php?id='.$line["log_idusu"].'&tpuid='.$line["tpu_id"].'&logid='.$line["log_id"].'" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Excluir 
                                       </a>
                                  </td>';
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