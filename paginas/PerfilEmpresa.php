<?php include ("cabecalho.php");

?><style>
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

    .fa fa-dribbble,
    fa fa-twitter,
    fa fa-linkedin,
    fa fa-facebook {
        text-decoration: none;
        font-size: 22px;
        color: black;
    }

    .contato:hover,
    a:hover {
        opacity: 0.7;
    }
</style><br><br><br><br><br>
<div class="card"><img src="img.jpg" alt="" style="width:100%">
    <h1><?php echo "<span>". buscaNome($_SESSION['user_id']) . "</span>";
?></h1>
    <p class="title"><?php echo "<span>". buscaCidadeEmp($_SESSION['user_id']) . "</span>";
?>,
        <?php echo "<span>". buscaEstadoEmp($_SESSION['user_id']) . "</span>";
?></p>
    <p class="title"><?php echo "<span>". buscaBairroEmp($_SESSION['user_id']) . "</span>";
?>,
        <?php echo "<span>". buscaNumEmp($_SESSION['user_id']) . "</span>";
?></p>
    <p><?php echo "<span>". buscaEmpCnpj($_SESSION['user_id']) . "</span>";
?></p>
    </p>
    <p><?php echo "<span>". buscaEmpEmail($_SESSION['user_id']) . "</span>";
?></p>
    <p><?php echo "<span>". buscaTelEmp($_SESSION['user_id']) . "</span>";
?></p><?php $id=buscaIdEmp($_SESSION['user_id']);
$logid=buscaId($_SESSION['user_id']);
$tpuid=buscaTpuId($_SESSION['user_id']);
?><p><a class="contato"
            href="EdicaoEmp.php?id=<?php echo $id ?>&logid=<?php echo $logid ?>&tpuid=<?php echo $tpuid ?>">Editar
            Perfil</a></p>
</div><?php require('rodape.php');
?>