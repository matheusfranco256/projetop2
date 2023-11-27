<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
include('../Infra/_Con.php');
include('../Infra/DbHelper.php');
$login = $_POST["login"];
$senha = $_POST["passwd"];
$id_cliente = $_POST["id_cliente"];

$hashed_password = password_hash($senha, PASSWORD_DEFAULT);
$campos = array('login',
'senha',
'id_cliente');
$valores = array($login,
$hashed_password,
$id_cliente);

if(InsertInto("login_usuarios",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> login_usuarios cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>login_usuarios não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>