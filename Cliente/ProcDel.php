<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];

    if (Delete("clientes",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente excluida com sucesso !!</p>"; header ("Location: /Projetop2/Cliente/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>cliente não foi excluida</p>"; header ("Location: Projetop2/Cliente/Listagem.php");
// }
mysqli_close($con);
}   