
<?php
include ("cabecalho.php");

$con = db_connect();
$usu_id = buscaUsuId($_SESSION['user_id']);
?>

<body>
    <?php
      
       
$con = db_connect();
    $sql = "SELECT * FROM `usu_interesse` WHERE usu_anu_id IS NULL AND usu_id = $usu_id";
    $stmp = $con->prepare($sql);
    $stmp->execute();
    
     $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $line) {
                  $srv_id = $line['usu_srv_id'];
        
        
    $sql = "SELECT * FROM srv_servicos WHERE srv_id = $srv_id";
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
                        <th> Telefone  <i class="fa fa-search"  aria-hidden="true"></i></th>
                        <th> Visualizar </th>


                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["srv_titulo"] . '</td>';
                            echo '<td>' . $line["srv_cidade"] . '</td>';
                            echo '<td>'."R$:" . $line["srv_descricao"] . '</td>';
                            echo '<td>' . $line["srv_telefone"] . '</td>';
                            echo '<td><a href="vagasSrv.php?id='.$line["srv_id"].'">Abrir</i></a></td>';
                            echo '</tr>';
                        }
                        ?>
                </tbody>
            </table>
        </div>

        <?php

    }}

     ?>

</body>
</html
