<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$data = $_POST["data"];
$id_cliente = $_POST["id_cliente"];
$observacao = $_POST["observacao"];
$cond_pagto = $_POST["cond_pagto"];
$prazo_entrega = $_POST["prazo_entrega"];
include('../Infra/DbHelper.php');

$campos = array('data',
'id_cliente',
'observacao',
'cond_pagto',
'prazo_entrega');
$valores = array($data,
$id_cliente,
$observacao,
$cond_pagto,
$prazo_entrega);

if(InsertInto("pedidos",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> pedidos cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>pedidos não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>