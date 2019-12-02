<?php

include('cabecalho.php');

$con = db_connect();
?>

<body>
    <?php
    
    $id = (int) $_GET['id'];
    
    $sql = "SELECT * FROM adm_administrador WHERE adm_id = ?";
    $stmp = $con->prepare($sql);
    $stmp->bindParam(1, $id);
    $stmp->execute();

    $row = $stmp->fetchAll(PDO::FETCH_ASSOC);
    
    ?>

    <?php if ($row == 0): ?>
    <p>"Nenhum resultado!"</p>;
    <?php else: ?>
    <div class="container">

        <!--            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Cidade</th>
                        <th>Remuneração</th>
                        <th>Numero De Vagas<i class="fa fa-search"  aria-hidden="true"></i></th>
                        <th>Visualizar</th>


                    </tr>
                </thead>
                <tbody>
                        //<?php
//                        foreach ($row as $line) {
//                            echo '<tr>';
//                            echo '<td>' . $line["anu_titulo"] . '</td>';
//                            echo '<td>' . $line["anu_cidade"] . '</td>';
//                            echo '<td>'."R$:" . $line["anu_remuneracao"] . '</td>';
//                            echo '<td>' . $line["anu_numvagas"] . '</td>';
//                            echo '<td><a href="EdicaoVaga.php?id='.$line["anu_id"].'">Abrir</i></a></td>';
//                            echo '</tr>';
//                        }
//                        ?>
                </tbody>
            </table>-->

        <?php foreach ($row as $line): ?>
        <form class="form-horizontal" action="Editar.php" method="post" />

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="titulo" value="<?php echo $line['adm_nome']; ?>"
                        placeholder="Nome">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Carga Horaria</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="cargah"
                        value="<?php echo $line['anu_cargahoraria']; ?>" placeholder="Empresa">
                </div>
                <label class="control-label col-sm-1" for="text">Cidade</label>
                <div class="col-sm-2">
                    <input type="tel" class="form-control" name="cidade" value="<?php echo $line['anu_cidade']; ?>"
                        placeholder="Cidade">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group">

            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3">Remuneração R$</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="remuneracao"
                        value="<?php echo $line['anu_remuneracao']; ?>" placeholder="Remuneração">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $line['anu_id']; ?>"
                        placeholder="Remuneração">
                </div>


                <label class="control-label col-sm-1">Nº Vagas</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="numvagas" value="<?php echo $line['anu_numvagas']; ?>"
                        placeholder="Número de Vagas">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-3" for="descrição">Descrição do Anúncio</label>

                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="descanu"
                        placeholder="Descrição do Anúncio"><?php echo $line['anu_descricaoanuncio']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="descrição">Requisitos</label>

                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="requisitos"
                        placeholder="Requisitos"><?php echo $line['anu_requisitos']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="control-label col-sm-6">
                    <button type="submit" name="submit" class="btn btn-primary">Atualizar </button>
                    <button type="reset" class="btn btn-danger">Limpar </button>
                </div>
            </div>
            </form>

        </div>

        <?php endforeach; ?>
        <?php endif; ?>

</body>
<?php  include('rodape.php'); ?>