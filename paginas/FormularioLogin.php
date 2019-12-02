<?php
Require ("cabecalho.php");

//unset($_SESSION['user_name']);
//unset($_SESSION['logged_in']);
//if (isset($_SESSION['logged_in'])):
   // var_dump($_SESSION['logged_in']);
//else:
   // echo 'sem sessão';
//endif;
?>
<form class="form-horizontal" action="login/Login.php" method="post">

    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email:</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" name="email" placeholder="Email de Cadastro">
            </div>
        </div>

        <div class="form-group" align="center">
            <label class="control-label col-sm-4" for="senha">Senha:</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="control-label col-sm-6">
            <button type="submit" name="submit" class="btn btn-primary">Entrar </button>
            <button type="reset" class="btn btn-danger">Limpar </button>
        </div>
    </div>


</form>
<?php require('rodape.php'); ?>