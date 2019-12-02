
<?php
require '../../config/ConexaoPDO.php';
//require 'functions.php';
//include 'config/ConexaoPDO.php';

// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//var_dump($_POST);
 
if (empty($email) || empty($password))
{
//    
   print "<script>alert('Email ou senha incorretos!');</script>";
    print "<script>location.href='../FormularioLogin.php';</script>";
    exit;
}
 
// cria o hash da senha
//$passwordHash = make_hash($password);

$connection = db_connect(); 

$sql = "SELECT * FROM log_login WHERE log_email = ? AND log_senha = ?";
$stmt = $connection ->prepare($sql);
 
$stmt->bindParam(1, $email);
$stmt->bindParam(2, $password);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
   print "<script>alert('Email ou senha incorretos!');</script>";
    print "<script>location.href='../FormularioLogin.php';</script>";
    exit;
    
}
 
// pega o primeiro usuário
$user = $users[0];

$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['log_id'];
$_SESSION['user_name'] = $user['log_email'];


header("Location: ../../index.php");



