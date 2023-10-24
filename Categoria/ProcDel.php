<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
if (VerificaChaveEst("produto","idCategoria",$id)) 
{
    $_SESSION['msg'] = "<p style='color:green;'>Esta CAtegoria não pode ser excluída, existe Produto cadastrado</p>"; header("Location: /Projetop2/Categoria/Listagem.php");
}
else{
    if (Delete("categoria",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>Categoria excluida com sucesso !!</p>"; header ("Location: /Projetop2/Categoria/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>Categoria não foi excluida</p>"; header ("Location: Projetop2/Categoria/Listagem.php");
}
mysqli_close($con);
}   