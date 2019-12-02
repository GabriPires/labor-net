<?php
session_start();

define('SERVER','localhost');
define('USER','root');
define('PASS','');
define('DATABASE','labornet');

//define('SERVER','192.168.0.106');
//define('USER','root');
//define('PASS','123456');
//define('DATABASE','labornet');

function db_connect()
{
$connection = new PDO("mysql:host=".SERVER.";dbname=".DATABASE,USER,PASS);
$connection->exec("set names utf8");
return $connection;
}

function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
   {
       return false;
       }

   return true;
}

function buscaNivel($log_id)
{
    $buscaId = "SELECT tpu_id FROM log_login WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $tpu_id;
}

function buscaNome($log_id)
{
    $buscaId = "SELECT log_nome FROM log_login WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $log_nome;
}

function buscaId($log_id)
{
    $buscaId = "SELECT log_id FROM log_login WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $log_id;
}

// Busca id empregador
function buscaIdEmp($log_id)
{
    $buscaId = "SELECT emp_id FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_id;
}

//Busca id usuario
function buscaIdUsu($log_id)
{
    $buscaId = "SELECT usu_id FROM usu_usuario WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $usu_id;
}


// Buscas Usuario
function buscaEmail($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT log_email FROM log_login WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $log_email;
}
 
 
function buscaCPF($log_id)
{
    $buscaCpf = "SELECT usu_cpf FROM usu_usuario WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaCpf);
    $stmt->bindValue(":log_id", $log_id);
    $stmt->execute();
    extract($stmt->fetch());
    
    
    
    return $usu_cpf;
}

function buscaTelefone($log_id)
{
    $buscaTel = "SELECT usu_telefone FROM usu_usuario WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaTel);
    $stmt->bindValue(":log_id", $log_id);
    $stmt->execute();
    
    extract($stmt->fetch());
    
   
    return $usu_telefone;
}

function buscaUsuId($log_id)
{
    $buscaTel = "SELECT usu_id FROM usu_usuario WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaTel);
    $stmt->bindValue(":log_id", $log_id);
    $stmt->execute();
    
    extract($stmt->fetch());
    
   
    return $usu_id;
}

function buscaDescricao($log_id)
{
    $buscaDes = "SELECT usu_descricaoperfil FROM usu_usuario WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaDes);
    $stmt->bindValue(":log_id", $log_id);
    $stmt->execute();
    
    extract($stmt->fetch());
    
    
    
    return $usu_descricaoperfil;
}


//Buscas Empresa


function buscaEmpEmail($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_email FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_email;
}

function buscaEmpCnpj($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_cnpj FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_cnpj;
}


function buscaEmpCpf($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_cpf FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_cpf;
}


function buscaEstadoEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_estado FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_estado;
}

function buscaCidadeEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_cidade FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_cidade;
    
}
function buscaBairroEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_bairro FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_bairro;
    
}

function buscaEndEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_endereco FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_endereco;
    
}

function buscaTelEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_telefone FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_telefone;
    
}

function buscaNumEmp($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT emp_numero FROM emp_empregador WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $emp_numero;
    
}

function buscaTpuId($log_id)
{
    $con = db_connect();
    $buscaId = "SELECT tpu_id FROM log_login WHERE log_id = :log_id ";
    $connection = db_connect();
    $stmt = $connection->prepare($buscaId);
    $stmt->bindValue(":log_id", $log_id);
    
//    $stmt->bindParam(1, $_SESSION['user_id']);
    $stmt->execute();
    extract($stmt->fetch());
//    print_r($stmt->fetch());
    return $tpu_id;
    
}


?>


