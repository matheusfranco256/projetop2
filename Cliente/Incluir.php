<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();
}
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$email = $_POST["email"];
$cpf_cnpj = $_POST["cpf_cnpj"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$dataNascimento = $_POST["data_nasc"];
include('../Infra/DbHelper.php');

$campos = array('nome',
'endereco',
'numero',
'bairro',
'cidade',
'estado',
'email',
'cpf_cnpj',
'rg',
'telefone',
'celular ',
'data_nasc');

$valores = array($nome,
$endereco,
$numero,
$bairro,
$cidade,
$estado,
$email,
$cpf_cnpj,
$rg,
$telefone,
$celular,
$dataNascimento);


if(VerificaUnic('clientes','cpf_cnpj',$cpf_cnpj) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse cpf!</p>"; 
}

if(VerificaUnic('clientes','email',$email) != 0){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse email!</p>"; 
}

if(InsertInto("clientes",$campos,$valores))
{
    $_SESSION['msg'] = "<p style='color:blue;'> Cliente cadastrado com sucesso!</p>"; 
    header('Location: Cadastro.php');
}
else{
    $_session['msg']= "<p style='color:red;'>Cliente não foi cadastrado!</p>"; 
    header('Location: Cadastro.php');
}
?>