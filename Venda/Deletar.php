<?php
    include ("../Infra/DbHelper.php");
    include ("../Infra/Con.php");
    if (session_status() !== PHP_SESSION_ACTIVE) { session_start();}
    $id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 

    if(DeleteParents("itemvenda",$id,"idVenda")){
        if (Delete("venda",$id)) {  
            $_SESSION['msg'] = "<p style='color:green;'>venda excluida com sucesso !!</p>"; header ("Location: /Projetop2/venda/Listagem.php");
        }
        else{
            $_SESSION['msg'] = "<p style='color:red; '>venda não foi excluida</p>"; header ("Location: Projetop2/venda/Listagem.php");
        }
    }
    else{
        $_SESSION['msg'] = "<p style='color:red; '>venda não foi excluida</p>"; header ("Location: Projetop2/venda/Listagem.php");
    }
    

    mysqli_close($con);
?>   