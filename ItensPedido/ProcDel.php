<?php
include ("../Infra/_Con.php");
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id_item'];
    if (DeleteItemPedido("itens_pedido",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>itens_pedido excluida com sucesso !!</p>"; header ("Location: /Projetop2/ItensPedido/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>itens_pedido não foi excluida</p>"; header ("Location: Projetop2/ItensPedido/Listagem.php");
    }
mysqli_close($con);
 