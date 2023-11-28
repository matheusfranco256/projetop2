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
$id_produto= $_POST["id_produto"];
$qtde= $_POST["qtde"];
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

$insertedId = InsertInto2("pedidos",$campos,$valores);
// if(InsertInto("pedidos",$campos,$valores))
// {
//     // $_SESSION['msg'] = "<p style='color:blue;'> pedidos cadastrado com sucesso!</p>"; 
//     // header('Location: Cadastro.php');
// }
if($insertedId == null){
    $_session['msg']= "<p style='color:red;'>pedidos não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}

$campos2 = array('id_pedido',
'id_produto',
'qtde');
$valores2 = array($insertedId,
$id_produto,
$qtde);

if(InsertInto("itens_pedido",$campos2,$valores2))
{
    $_SESSION['msg'] = "<p style='color:blue;'> Pedido cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>itens_pedido não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}


?>