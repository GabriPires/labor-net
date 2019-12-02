<!DOCTYPE html>
<?php
include('../config/ConexaoPDO.php');
?>
<html>
<title>LaborNet</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    body {
        font-family: "Lato", sans-serif
    }

    .mySlides {
        display: none
    }
</style>

<body>

    <!-- Navbar -->

    <?php
        if (isLoggedIn()) {
            if (buscaNivel($_SESSION['user_id']) == 1) {
                ?>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <ul class="nav navbar-nav">
                <img src="../logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES ADMIN <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="../paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large">VAGAS DE
                        EMPREGO</a>
                    <a href="../paginas/EditarUsuarios.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        USUARIOS</a>
                    <a href="../paginas/EditarServicos.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        SERVIÇOS</a>
                </div>
            </div>


            <form method="POST" action="../paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='../paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-log-out'></span> Sair</a></li>
            </ul>
        </div>
    </div>
    <?php
            } elseif (buscaNivel($_SESSION['user_id']) == 2) {
                ?>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <ul class="nav navbar-nav">
                <img src="../logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES EMPREGADOR <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="../paginas/CadastroVaga.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO DE
                        VAGAS</a>
                    <a href="../paginas/EditarVagas.php" class="w3-bar-item w3-button w3-padding-large">EDITAR VAGAS</a>
                    <a href="../paginas/MinhasVagas.php" class="w3-bar-item w3-button w3-padding-large">MINHAS VAGAS</a>
                </div>
            </div>

            <form method="POST" action="../paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='../paginas/PerfilEmpresa.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='../paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-log-out'></span> Sair</a></li>
            </ul>
        </div>
    </div>
    <?php
            } elseif (buscaNivel($_SESSION['user_id']) == 3) {
                ?>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <ul class="nav navbar-nav">
                <img src="../logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>
            <a href="../paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VAGAS DE
                EMPREGO</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES USUÁRIO <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="../paginas/CadastroServicos.php" class="w3-bar-item w3-button w3-padding-large"><span
                            class="glyphicon glyphicon-asterisk"></span> SOLICITAR SERVIÇO</a>
                    <a href="../paginas/VagasServico.php" class="w3-bar-item w3-button w3-padding-large"><span
                            class="glyphicon glyphicon-asterisk"></span> SERVIÇOS TERCEIRIZADOS</a>
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
                            if ($s ==  null) {
                                    ?>
                    <a href="../paginas/CadastroCurriculo.php" class="w3-bar-item w3-button w3-padding-large">CADASTRAR
                        CURRÍCULO</a>
                    <?php
                                };
                                ?> <?php
                                $sql = "SELECT COUNT(usu_id) FROM srv_servicos WHERE usu_id = $usu_id";
                                $stmp = $con->prepare($sql);
                                $stmp->execute();
                                $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


                                foreach ($row as $key) {
                                    $t = $key["COUNT(usu_id)"];
                                }
                                if ($t > 0) {
                                    ?>
                    <a href="../paginas/meusSrv.php" class="w3-bar-item w3-button w3-padding-large">MEUS SERVIÇOS</a>
                    <a href="../paginas/EditarServicos.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        SERVIÇOS</a>
                    <?php
                                };
                                ?>

                </div>
            </div>

            <form method="POST" action="../paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='../paginas/PerfilUsuario.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='../paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-log-out'></span> Sair</a></li>
            </ul>
        </div>
    </div>
    <?php
            }
        } else {
            ?>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <ul class="nav navbar-nav">
                <img src="../logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>
            <a href="../paginas/CadastroEmpresa.php"
                class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO EMPRESA</a>
            <a href="../paginas/CadastroUsuario.php"
                class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO USUARIO</a>
            <a href="../paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VAGAS DE
                EMPREGO</a>

            <form method="POST" action="../paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='../paginas/FormularioLogin.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-log-in'></span> Login</a></li>
            </ul>
        </div>
    </div>
    <?php
        }
        ?>

    <!--        <div class="w3-top">
                    <div class="w3-bar w3-black w3-card">
                        <ul class="nav navbar-nav">
                            <img  src="logo2.png" clas ="img-circle" alt="Los Angeles" height="50" width="100">
                        </ul>
                        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                        <a href="./index_01.php" class="w3-bar-item w3-button w3-padding-large"><span class="glyphicon glyphicon-home"></span>HOME</a>
                        <a href="paginas/CadastroEmpresa.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO EMPRESA</a>
                        <a href="paginas/CadastroUsuario.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO USUARIO</a>
                        <a href="paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VAGAS DE EMPREGO</a>
                        <div class="w3-dropdown-hover w3-hide-small">
                            <button class="w3-padding-large w3-button" title="More">SOBRE NÃ“S <i class="fa fa-caret-down"></i></button>     
                            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                                <a href="#band" class="w3-bar-item w3-button">QUEM SOMOS</a>
                                <a href="#" class="w3-bar-item w3-button">A IDEIA</a>
                                <a href="#contact" class="w3-bar-item w3-button">CONTATO</a>
                            </div>
        
                        </div>
        
                        <form method="POST" action="paginas/busca.php" class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                            </div>
                            <button class="btn btn-default" type="submit" > <i class="glyphicon glyphicon-search"> </i> </button>
                        </form>
                        <ul class='nav navbar-nav navbar-right'>
                            <li><a href='paginas/FormularioLogin.php'class="w3-bar-item w3-button w3-padding-large"><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                        </ul>
                    </div>
                </div>-->

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="../index" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="../paginas/CadastroEmpresa.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO EMPRESA</a>
        <a href="../paginas/CadastroUsuario.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO USUARIO</a>
    </div>
    <br>
    <br>
    <br>
    <br>