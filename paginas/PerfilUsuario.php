<?php
// require ("../config/ConexaoPDO.php");
include('cabecalho.php');
?>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .title {
        color: grey;
        font-size: 18px;
    }

    .contato {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .fa fa-dribbble, fa fa-twitter, fa fa-linkedin, fa fa-facebook {
        text-decoration: none;
        font-size: 22px;
        color: black;
    }

    .contato:hover, a:hover {
        opacity: 0.7;
    }
</style>
<br><br><br><br><br>
<body>
    <div class="card">
        <img src="img.jpg" alt="" style="width:100%">
        <h1><?php
            echo "<span>" . buscaNome($_SESSION['user_id']) . "</span>";
            ?></h1>

        <p><?php
            echo "<span>" . buscaCPF($_SESSION['user_id']) . "</span>";
            ?></p>
    </p>
    <p><?php
        echo "<span>" . buscaEmail($_SESSION['user_id']) . "</span>";
        ?></p>
    <p><?php
        echo "<span>" . buscaTelefone($_SESSION['user_id']) . "</span>";
        ?></p>
    <p><?php
        echo "<span>" . buscaDescricao($_SESSION['user_id']) . "</span>";
        $usu_id = buscaUsuId($_SESSION['user_id']);
        ?></p>

    <?php
    $id = buscaIdUsu($_SESSION['user_id']);
    $logid = buscaId($_SESSION['user_id']);
    $tpuid = buscaTpuId($_SESSION['user_id']);
    ?>

    <p><a class="contato" href="curriculos.php?id='<?php echo $usu_id ?>'">Baixar meu currículo</a></p>   

    <?php
    $usu_id = buscaIdUsu($_SESSION['user_id']);
    $con = db_connect();
    $sql = "SELECT usu_curriculo FROM usu_usuario WHERE usu_id = $usu_id";
                            $stmp = $con->prepare($sql);
                            $stmp->execute();
                            $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


                            foreach ($row as $line) {
                                $s = $line["usu_curriculo"];
                            }
    if ($s == 'SIM') {
        ?>   
    <p><a class="contato" href="CadastroCurriculo.php?id=<?php echo $id ?>">Reenviar Currículo</a></p>
        <?php
    };
    ?>
    
    <p><a class="contato" href="EdicaoUsu.php?id=<?php echo $id ?>&logid=<?php echo $logid ?>&tpuid=<?php echo $tpuid ?>">Editar Perfil</a></p>
 
</div>
</body>                      
<?php
require('rodape.php');
?>