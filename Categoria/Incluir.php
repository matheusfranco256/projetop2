<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$descricao = $_POST["desc"];
include('../Infra/DbHelper.php');

$campos = array('descricao');
$valores = array($descricao);

if(VerificaUnic('categoria','descricao',$descricao) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe uma categoria cadastrada com essa descrição!</p>"; 
}

if(InsertInto("categoria",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> Categoria cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>Categoria não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>