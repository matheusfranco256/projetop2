<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
if (VerificaChaveEst("venda","idCliente",$id)) 
{
    $_SESSION['msg'] = "<p style='color:green;'>Este Cliente não pode ser excluído, existe Venda cadastrado</p>"; header("Location: /Projetop2/Categoria/Listagem.php");
}
else{
    if (Delete("cliente",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente excluida com sucesso !!</p>"; header ("Location: /Projetop2/Cliente/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>cliente não foi excluida</p>"; header ("Location: Projetop2/Cliente/Listagem.php");
}
mysqli_close($con);
}   