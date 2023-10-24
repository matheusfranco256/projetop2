<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$endereco = $_POST["endereco"];
$limiteCredito = $_POST["limiteCredito"];
include('../Infra/DbHelper.php');

$campos = array('nome',
'cpf',
'email',
'telefone',
'cidade',
'estado',
'endereco',
'limiteCredito');
$valores = array($nome,
$cpf,
$email,
$telefone,
$cidade,
$estado,
$endereco,
$limiteCredito);


if(VerificaUnic('cliente','cpf',$cpf) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse cpf!</p>"; 
}

if(VerificaUnic('cliente','email',$email) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse email!</p>"; 
}

if(InsertInto("cliente",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> Cliente cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>Cliente não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>