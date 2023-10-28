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
    DeleteParents('itens_pedido',$id,'id_pedido');
    if (Delete("pedidos",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>pedidos excluida com sucesso !!</p>"; header ("Location: /Projetop2/Login/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>pedidos não foi excluida</p>"; header ("Location: Projetop2/Login/Listagem.php");
    }
mysqli_close($con);
 