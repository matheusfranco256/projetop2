<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome');
$cpf = filter_input(INPUT_POST,'cpf');
$email = filter_input(INPUT_POST,'email');
$telefone = filter_input(INPUT_POST,'telefone');
$cidade = filter_input(INPUT_POST,'cidade');
$estado = filter_input(INPUT_POST,'estado');
$endereco = filter_input(INPUT_POST,'endereco');
$limiteCredito = filter_input(INPUT_POST,'limiteCredito');

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


$verifCpf = VerificaUnic('cliente','cpf',$cpf);
$verifEmail = VerificaUnic('cliente','email',$email);
if($verifCpf != 0 && $verifCpf != $id){
    echo "erro";
        $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse cpf!</p>";
        header("Location: /Projetop2/cliente/Alterar.php?id={$id}");
}
else if($verifEmail != 0 && $verifEmail != $id){
    $_SESSION['msg'] = "<p style='color:red;'>ja existe um  cliente cadastrado com esse Email!</p>";
    header("Location: /Projetop2/cliente/Alterar.php?id={$id}");
}
else{
    $update = Update("cliente",$campos,$valores,$id);
    if($update)
    {
        $_SESSION['msg'] = "<p>cliente alterado</p>";
        header("Location: /Projetop2/cliente/Listagem.php");
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>cliente não alterado!</p>";
        header("Location: /Projetop2/cliente/Listagem.php");
        
    }

}


// if(Update("cliente",$campos,$valores,$id)){
//     $_SESSION['msg'] = "<p>cliente alterado</p>";
//     header("Location: /Projetop2/cliente/Listagem.php");
// }
// else{    
//     $_SESSION['msg'] = "<p>cliente não alterada</p>";    
// }

?>