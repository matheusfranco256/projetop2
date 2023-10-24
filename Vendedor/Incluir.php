<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$endereco = $_POST["endereco"];
$porcComissao = $_POST["porcComissao"];
include('../Infra/DbHelper.php');

$campos = array('nome',
'cidade',
'estado',
'endereco',
'porcComissao');
$valores = array($nome,
$cidade,
$estado,
$endereco,
$porcComissao);

if(InsertInto("vendedor",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> vendedor cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>vendedor não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>