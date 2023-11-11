<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome');
$qtde_estoque = filter_input(INPUT_POST,'qtde_estoque');
$valor_unitario = filter_input(INPUT_POST,'valor_unitario');
$unidade_medida = filter_input(INPUT_POST,'unidade_medida');
$campos = array('nome','qtde_estoque','valor_unitario','unidade_medida');
$valores = array($nome,$qtde_estoque,$valor_unitario,$unidade_medida);

$verif = VerificaUnic('produto','nome',$nome);

//echo $verif;
if($verif != 0 && $verif != $id){
        $_SESSION['msg'] = "<p style='color:red;'>ja existe um  produto cadastrado com esse nome!</p>";
        header("Location: /Projetop2/Produto/Alterar.php?id={$id}");
}
else{
    $update = Update("produto",$campos,$valores,$id);
    if($update)
    {
        $_SESSION['msg'] = "<p>produto alterado</p>";
        header("Location: /Projetop2/Produto/Listagem.php");
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>Produto não alterado!</p>";
        header("Location: /Projetop2/Produto/Listagem.php");        
    }
}

?>