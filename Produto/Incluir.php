<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$nome = $_POST["nome"];
$qtde_estoque = $_POST["qtde_estoque"];
$valor_unitario = $_POST["valor_unitario"];
$unidade_medida = $_POST["unidade_medida"];
include('../Infra/DbHelper.php');

$campos = array('nome','qtde_estoque','valor_unitario','unidade_medida');
$valores = array($nome,$qtdeEstoque,$valor_unitario, $unidadeMedida);

if(VerificaUnic('produto','nome',$nome) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  produto cadastrado com esse nome!</p>"; 
}

if(InsertInto("produto",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> produto cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>produto não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>