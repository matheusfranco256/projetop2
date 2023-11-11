<?php
include ("../Infra/DbHelper.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
$id = $_POST['id'];

    DeleteParents('itens_pedido',$id,'id_pedido');
    if (Delete("pedidos",$id)) {
        $_SESSION['msg'] = "<p style='color:green;'>pedidos excluida com sucesso !!</p>"; header ("Location: /Projetop2/Pedidos/Listagem.php");
    }
    else{
    $_SESSION['msg'] = "<p style='color:red; '>pedidos não foi excluida</p>"; header ("Location: Projetop2/Pedidos/Listagem.php");
    }
mysqli_close($con);
 