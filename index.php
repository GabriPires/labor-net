<!DOCTYPE html>
<?php
include('config/ConexaoPDO.php');
?>
<html>

</style>
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

    .empregos {
        text-shadow: 1px 1px #000000;


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
                <img src="logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="./index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES ADMIN <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="./paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large">VAGAS DE
                        EMPREGO</a>
                    <a href="./paginas/EditarUsuarios.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        USUARIOS</a>
                    <a href="./paginas/EditarServicos.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        SERVIÇOS</a>
                </div>
            </div>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">SOBRE NÓS <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#quemsomos" class="w3-bar-item w3-button">QUEM SOMOS</a>
                    <a href="#empresa" class="w3-bar-item w3-button">PARA EMPRESAS</a>
                    <a href="#contact" class="w3-bar-item w3-button">CONTATO</a>
                </div>
            </div>

            <form method="POST" action="paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='./paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
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
                <img src="logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="./index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES EMPREGADOR <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="./paginas/CadastroVaga.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO DE
                        VAGAS</a>
                    <a href="./paginas/EditarVagas.php" class="w3-bar-item w3-button w3-padding-large">EDITAR VAGAS</a>
                    <a href="./paginas/MinhasVagas.php" class="w3-bar-item w3-button w3-padding-large">MINHAS VAGAS</a>
                </div>
            </div>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">SOBRE NÓS <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#quemsomos" class="w3-bar-item w3-button">QUEM SOMOS</a>
                    <a href="#empresa" class="w3-bar-item w3-button">PARA EMPRESAS</a>
                    <a href="#contact" class="w3-bar-item w3-button">CONTATO</a>
                </div>

            </div>

            <form method="POST" action="paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='./paginas/PerfilEmpresa.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='./paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
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
                <img src="logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="./index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>
            <a href="paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VAGAS DE
                EMPREGO</a>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">FUNÇÕES USUÁRIO <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="./paginas/CadastroServicos.php" class="w3-bar-item w3-button w3-padding-large"><span
                            class="glyphicon glyphicon-asterisk"></span> SOLICITAR SERVIÇO</a>
                    <a href="./paginas/VagasServico.php" class="w3-bar-item w3-button w3-padding-large"><span
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
                    <a href="./paginas/CadastroCurriculo.php" class="w3-bar-item w3-button w3-padding-large">CADASTRAR
                        CURRÍCULO</a>

                    <?php
                            };
                            ?>
                    <?php
                            $sql = "SELECT COUNT(usu_id) FROM srv_servicos WHERE usu_id = $usu_id";
                            $stmp = $con->prepare($sql);
                            $stmp->execute();
                            $row = $stmp->fetchAll(PDO::FETCH_ASSOC);


                            foreach ($row as $key) {
                                $t = $key["COUNT(usu_id)"];
                            }
                            if ($t > 0) {
                                ?>
                    <a href="./paginas/meusSrv.php" class="w3-bar-item w3-button w3-padding-large">MEUS SERVIÇOS</a>
                    <a href="./paginas/EditarServicos.php" class="w3-bar-item w3-button w3-padding-large">EDITAR
                        SERVIÇOS</a>
                    <?php
                            };
                            ?>


                </div>
            </div>

            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">SOBRE NÓS <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#quemsomos" class="w3-bar-item w3-button">QUEM SOMOS</a>
                    <a href="#empresa" class="w3-bar-item w3-button">PARA EMPRESAS</a>
                    <a href="#contact" class="w3-bar-item w3-button">CONTATO</a>
                </div>

            </div>

            <form method="POST" action="paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='./paginas/PerfilUsuario.php' class="w3-bar-item w3-button w3-padding-large"><span
                            class='glyphicon glyphicon-user'></span><?php echo " " . buscaNome($_SESSION['user_id']) ?></a>
                </li>
                <li><a href='./paginas/login/logout.php' class="w3-bar-item w3-button w3-padding-large"><span
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
                <img src="logo2.png" clas="img-circle" alt="Los Angeles" height="50" width="100">
            </ul>
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="./index.php" class="w3-bar-item w3-button w3-padding-large"><span
                    class="glyphicon glyphicon-home"></span>HOME</a>
            <a href="paginas/CadastroEmpresa.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO
                EMPRESA</a>
            <a href="paginas/CadastroUsuario.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CADASTRO
                USUARIO</a>
            <a href="paginas/VagasEmprego.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VAGAS DE
                EMPREGO</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">SOBRE NÓS <i
                        class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#quemsomos" class="w3-bar-item w3-button">QUEM SOMOS</a>
                    <a href="#empresa" class="w3-bar-item w3-button">PARA EMPRESAS</a>
                    <a href="#contact" class="w3-bar-item w3-button">CONTATO</a>
                </div>

            </div>

            <form method="POST" action="paginas/busca.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="busca">
                </div>
                <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='paginas/FormularioLogin.php' class="w3-bar-item w3-button w3-padding-large"><span
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
                        <button class="w3-padding-large w3-button" title="More">SOBRE NÓS <i class="fa fa-caret-down"></i></button>     
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
        <a href="./index_01" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="paginas/CadastroEmpresa.php.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO EMPRESA</a>
        <a href="paginas/CadastroUsuario.php.php" class="w3-bar-item w3-button w3-padding-large">CADASTRO USUARIO</a>
    </div>

    <!-- Page content -->



    <div class="w3-content" style="max-width:2000px;margin-top:46px">

        <!-- Automatic Slideshow Images -->
        <div class="mySlides w3-display-container w3-center">
            <img src="C_f.jpg" style="width:100% ; height:720px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3 class="empregos"><b>Empregos para todos!</b></h3>
                <p class="empregos"><b>Precisando de uma renda? Com certeza nosso site tem o emprego ideal pra você!</b>
                </p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="E_g.jpg" style="width:100%; height:720px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3 class="empregos"><b>Empregos para Ensino Superior</b></h3>
                <p class="empregos"><b>Concluiu a faculdade e não sabe o que fazer? Procure as vagas disponíveis no
                        nosso site!</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="J_d.jpg" style="width:100%; height:720px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3 class="empregos"><b>Serviços Terceirizados</b></h3>
                <p class="empregos"><b>Nova funcionalidade do site, para aproximar pessoas que exercem serviços com quem
                        precisa!</b></p>
            </div>
        </div>

        <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="quemsomos">
            <h2 class="w3-wide">QUEM SOMOS</h2>
            <p class="w3-opacity"><i>Como tudo começou...</i></p>
            <p class="w3-justify">
                Com a crise de desemprego crescente no Brasil, os integrantes do grupo consideraram a ideia de colaborar
                para mitigar tal crise através do LaborNet, um sistema web feito para divulgação de empregos. Com o
                projeto em mente
                o grupo visa auxiliar também os desempregados a procurar novas oportunidades de emprego pela internet,
                desse modo facilitando a sua procura e a entrega
                de currículo, uma vez que atualmente se encontram filas absurdas para realizar essa ação.</p>
            <!--<div class="w3-row w3-padding-32">
                <div class="w3-third">
                    <p>Name</p>
                    <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Name</p>
                    <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Name</p>
                    <img src="/w3images/bandmember.jpg" class="w3-round" alt="Random Name" style="width:60%">
                </div>
            </div> -->
        </div>

        <!-- The Tour Section -->
        <div class="w3-black" id="empresa">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
                <h2 class="w3-wide w3-center">FACILIDADE PARA SUA EMPRESA</h2>
                <p class="w3-opacity w3-center"><i>Você dono de uma empresa, anuncie conosco!</i></p><br>
                <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                    <p class="w3-justify">
                        Com um sistema simples de divulgação, você pode trazer todas vagas disponíveis no seu negócio
                        para o nosso site, podendo verificar quem está interessado em trabalhar em sua empresa, ler seus
                        currículos e decidir quem
                        chamar para a entrevista. Podendo também atualizar suas vagas já postadas, ou mesmo apagar vagas
                        que não estão mais disponíveis em seu negócio, tudo isso de uma maneira fácil e sem
                        complicações.</p>
                </div>
            </div>
        </div>

        <!-- Ticket Modal -->
        <div id="ticketModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-teal w3-center w3-padding-32">
                    <span onclick="document.getElementById('ticketModal').style.display = 'none'"
                        class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
                    <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
                </header>
                <div class="w3-container">
                    <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
                    <input class="w3-input w3-border" type="text" placeholder="How many?">
                    <p><label><i class="fa fa-user"></i> Send To</label></p>
                    <input class="w3-input w3-border" type="text" placeholder="Enter email">
                    <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i
                            class="fa fa-check"></i></button>
                    <button class="w3-button w3-red w3-section"
                        onclick="document.getElementById('ticketModal').style.display = 'none'">Close <i
                            class="fa fa-remove"></i></button>
                    <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
                </div>
            </div>
        </div>

        <!-- The Contact Section -->
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
            <h2 class="w3-wide w3-center">CONTATO</h2>

            <div class="w3-row w3-padding-32">
                <div class="w3-col m6 w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker" style="width:30px"></i> Guaratinguetá, SP<br>
                    <i class="fa fa-phone" style="width:30px"></i> Phone: +12 98891-1758 <br>
                    <i class="fa fa-envelope" style="width:30px"> </i> Email: LaborNet@gmail.com<br>
                </div>
                <!--<div class="w3-col m6">
                    <form action="/action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                        <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                    </form> -->
            </div>
        </div>
    </div>

    <!-- End Page Content -->
    </div>
    <!-- <!-- Add Google Maps -->
    <div id="googleMap" style="height:400px;" class="w3-grayscale-max"></div>
    <script>
        function myMap() {
            myCenter = new google.maps.LatLng(-22.8007425, -45.2003777);
            var mapOptions = {
                center: myCenter,
                zoom: 17,
                scrollwheel: false,
                draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOCHxcsfGO1wly1TqezMzVv_SqGXTCskA&callback=myMap">
    </script>
    <!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <p class="w3-medium">© 2015-2017 - LaborNet | Todos os direitos reservados.
            É proibida a reprodução total ou parcial de qualquer conteúdo deste site.
    </footer>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>