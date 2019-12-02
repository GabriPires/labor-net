<?php Require ("cabecalho.php"); ?>
<center><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <form enctype="multipart/form-data" action="InsertCurriculo.php" method="POST">
            <!-- MAX_FILE_SIZE deve preceder o campo input -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- O Nome do elemento input determina o nome da array $_FILES -->
            <div class="">
                <h2>
                    Carregar currículo </h2><br><input name="userfile" type="file">

            </div>
            <br>
            <div>
                <input type="submit" value="Enviar arquivo" class="btn btn-info" />
            </div>
        </form>
    </div>
</center>
<?php Require ("rodape.php"); ?>