<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}

$id_pedido = $_POST["id_pedido"];
$id_produto= $_POST["id_produto"];
$qtde= $_POST["qtde"];
include('../Infra/DbHelper.php');

$campos = array('id_pedido',
'id_produto',
'qtde');
$valores = array($id_pedido,
$id_produto,
$qtde);

if(InsertInto("itens_pedido",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> itens_pedido cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>itens_pedido não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>