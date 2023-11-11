<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
if (VerificaChaveEst("itens_pedido","id_produto",$id)) 
{
    $_SESSION['msg'] = "<p style='color:green;'>Este produto não pode ser excluído, existe ItenPedido cadastrado</p>"; header("Location: /projetop2/Produto/Listagem.php");
}
else{
    if (Delete("produto",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>produto excluido com sucesso !!</p>"; header ("Location: /projetop2/Produto/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>produto não foi excluido</p>"; header ("Location: projetop2/Produto/Listagem.php");
}
mysqli_close($con);
}   