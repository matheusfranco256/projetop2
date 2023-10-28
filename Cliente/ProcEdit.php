<?php
session_start();
include_once("../Infra/DbHelper.php");
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome');
$endereco = filter_input(INPUT_POST,'endereco');
$numero = filter_input(INPUT_POST,'numero');
$bairro = filter_input(INPUT_POST,'bairro');
$cidade = filter_input(INPUT_POST,'cidade');
$estado = filter_input(INPUT_POST,'estado');
$email = filter_input(INPUT_POST,'email');
$cpf_cnpj = filter_input(INPUT_POST,'cpf_cnpj');
$rg = filter_input(INPUT_POST,'rg');
$telefone = filter_input(INPUT_POST,'telefone');
$celular = filter_input(INPUT_POST,'celular');
$dataNascimento = filter_input(INPUT_POST,'data_nasc');


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


$verifCpf = VerificaUnic('clientes','cpf_cnpj',$cpf_cnpj);
$verifEmail = VerificaUnic('clientes','email',$email);
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
    $update = Update("clientes",$campos,$valores,$id);
    if($update)
    {
        $_SESSION['msg'] = "<p>clientes alterado</p>";
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