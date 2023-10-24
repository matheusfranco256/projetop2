<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$qtdeEstoque = $_POST["qtdeEstoque"];
$unidadeMedida = $_POST["unidadeMedida"];
$idCategoria = $_POST["idCategoria"];
include('../Infra/DbHelper.php');

$campos = array('nome','preco','qtdeEstoque','unidadeMedida','idCategoria');
$valores = array($nome,$preco,$qtdeEstoque,$unidadeMedida,$idCategoria);

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