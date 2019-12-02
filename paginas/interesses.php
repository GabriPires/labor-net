<?php
include ("cabecalho.php");

$con = db_connect();
$usu_id = buscaUsuId($_SESSION['user_id']);
?>

<body>
    <?php
      $s=0;
        $sql = "SELECT COUNT(usu_id) FROM usu_interesse WHERE usu_id = $usu_id";
        $stmp = $con->prepare($sql);
        $stmp->execute();
        $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach ($row as $key) 
        {
            $s = $key["COUNT(usu_id)"];
        }
        
    if ($s > 0){
    $sql = "SELECT * FROM usu_interesse WHERE usu_id = $usu_id";
    $stmp = $con->prepare($sql);
    $stmp->execute();
    
     $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $line) {
                  $usu_it = $line['usu_anu_id'];
                            
    
    $sql = "SELECT * FROM anu_anuncio WHERE anu_id = $usu_it";
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
                            echo '<td><a href="vagas.php?id='.$line["anu_id"].'">Abrir</i></a></td>';
                            echo '</tr>';
                        }
                        ?>
            </tbody>
        </table>
    </div>

    <?php
    }}}else {
    print "<script>alert('Você não declarou interesse em nenhuma vaga!');</script>";
    print "<script>location.href='VagasEmprego.php';</script>";
         }
     ?>

</body>

</html