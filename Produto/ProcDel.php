<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
if (VerificaChaveEst("itemVenda","idproduto",$id)) 
{
    $_SESSION['msg'] = "<p style='color:green;'>Este produto não pode ser excluído, existe Venda cadastrado</p>"; header("Location: /Projetop2/Categoria/Listagem.php");
}
else{
    if (Delete("produto",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>produto excluida com sucesso !!</p>"; header ("Location: /Projetop2/produto/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>produto não foi excluida</p>"; header ("Location: Projetop2/produto/Listagem.php");
}
mysqli_close($con);
}   