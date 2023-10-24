<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);

$campos = array('descricao');
$valores = array($descricao);
$verif = VerificaUnic('categoria','descricao',$descricao);

//echo $verif;
if($verif != 0 && $verif != $id){
        $_SESSION['msg'] = "<p style='color:red;'>ja existe uma  categoria cadastrada com essa descrição!</p>";
        header("Location: /Projetop2/categoria/Alterar.php?id={$id}");
}
else{
    $update = Update("categoria",$campos,$valores,$id);
    if($update)
    {
        $_SESSION['msg'] = "<p>categoria alterado</p>";
        header("Location: /Projetop2/categoria/Listagem.php");
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>categoria não alterado!</p>";
        header("Location: /Projetop2/categoria/Listagem.php");
        
    }

}





?>