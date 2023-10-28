<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$login = filter_input(INPUT_POST,'login');
$senha = filter_input(INPUT_POST,'senha');

$campos = array('login',
'senha',
'id_cliente');
$valores = array($login,
$senha,
$id_cliente);

if(Update("login_usuarios",$campos,$valores,$id)){
    $_SESSION['msg'] = "<p>login_usuarios alterado</p>";
    header("Location: /Projetop2/vendedor/Listagem.php");
}
else{    
    $_SESSION['msg'] = "<p>login_usuarios não alterada</p>";    
}

?>