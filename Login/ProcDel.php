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
    if (Delete("login_usuarios",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>login_usuarios excluida com sucesso !!</p>"; header ("Location: /Projetop2/Login/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>login_usuarios não foi excluida</p>"; header ("Location: Projetop2/Login/Listagem.php");
    }
mysqli_close($con);
 