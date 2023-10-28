<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
// if (VerificaChaveEst("venda","idvendedor",$id)) 
// {
//     $_SESSION['msg'] = "<p style='color:green;'>Este login não pode ser excluído, existe login cadastrado</p>"; header("Location: /Projetop2/Categoria/Listagem.php");
// }
// else{
    if (Delete("itens_pedido",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>itens_pedido excluida com sucesso !!</p>"; header ("Location: /Projetop2/Login/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>itens_pedido não foi excluida</p>"; header ("Location: Projetop2/Login/Listagem.php");
    }
mysqli_close($con);
 