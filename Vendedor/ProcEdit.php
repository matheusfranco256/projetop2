<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome');
$cidade = filter_input(INPUT_POST,'cidade');
$estado = filter_input(INPUT_POST,'estado');
$endereco = filter_input(INPUT_POST,'endereco');
$porcComissao = filter_input(INPUT_POST,'porcComissao');

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

if(Update("vendedor",$campos,$valores,$id)){
    $_SESSION['msg'] = "<p>vendedor alterado</p>";
    header("Location: /Projetop2/vendedor/Listagem.php");
}
else{    
    $_SESSION['msg'] = "<p>vendedor não alterada</p>";    
}

?>