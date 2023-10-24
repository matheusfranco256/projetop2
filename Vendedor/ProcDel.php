<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];
// fazer a verificação se id tem na tabela produto
if (VerificaChaveEst("venda","idvendedor",$id)) 
{
    $_SESSION['msg'] = "<p style='color:green;'>Este vendedor não pode ser excluído, existe Venda cadastrado</p>"; header("Location: /Projetop2/Categoria/Listagem.php");
}
else{
    if (Delete("vendedor",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>vendedor excluida com sucesso !!</p>"; header ("Location: /Projetop2/vendedor/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>vendedor não foi excluida</p>"; header ("Location: Projetop2/vendedor/Listagem.php");
}
mysqli_close($con);
}   