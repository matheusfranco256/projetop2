<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$login = $_POST["login"];
$senha = $_POST["senha"];
$id_cliente = $_POST["id_cliente"];
include('../Infra/DbHelper.php');

$campos = array('login',
'senha',
'id_cliente');
$valores = array($login,
$senha,
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