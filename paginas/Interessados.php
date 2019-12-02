<body>
    <?php
//    $id = $_COOKIE['anu_id'];
    
    $sql = "SELECT usu_id FROM usu_interesse WHERE usu_anu_id = $id";
    $stmp = $con->prepare($sql);
    $stmp->execute();

      foreach ($row as $line) {
  $usu_id = $line["usu_id"];
  }
    
    
    $sql = "SELECT * FROM usu_usuario WHERE usu_id = $usu_id";
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
                    <th> Nome </th>
                    <th> Telefone </th>
                    <th> Email </th>
                    <th> Descriçâo </th>



                </tr>
            </thead>
            <tbody>
                <?php
                        foreach ($row as $line) {
                            echo '<tr>';
                            echo '<td>' . $line["usu_nome"] . '</td>';
                            echo '<td>' . $line["usu_telefone"] . '</td>';
                            echo '<td>'."R$:" . $line["usu_email"] . '</td>';
                            echo '<td>' . $line["usu_descricaoperfil"] . '</td>';
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