<?php
      include('../Infra/_Con.php');
      include('../Infra/DbHelper.php');
 
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
        $_SESSION["id_cliente"] = 0;
    }
    
?>
    <!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Cadastro de Pedido </title>
</head>
<body>

<?php

    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        
    }
?>
<p><h1> Cadastro de Pedido </h1>
<form method="POST" action="Incluir.php"> 


<p> Data: <input type="date" name="data" required>
<p> Cliente:
    <select name="id_cliente">
    <?php
      
        $query = GetQueryAll("clientes","nome");
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option> 
    <?php
    } 
    ?>
    </select>
<p> Observação: <input type="text" size="100" maxlength="100" name="observacao">
<p> Condição de Pagamento: <input type="text" size="100" maxlength="50" name="cond_pagto">

<p> Prazo de Entrega: <input type="text" size="100" maxlength="20" name="prazo_entrega">

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Pedidos/Index.html'>Tela Inicial Pedidos</a>
</form>
</body>