<?php
    include('../Infra/_Con.php');
    include('../Infra/DbHelper.php');
            

    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
        $_SESSION["id_produto"] = 0;
        $_SESSION["id_item"] = 0;
    }
    
?>
    <!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Cadastro de ItensPedido </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de ItensPedido</h1>
<form method="POST" action="Incluir.php"> 
<p> Pedido:
    <select name="id_pedido">
    <?php

        $query = GetQueryAll("pedidos","prazo_entrega");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['observacao']; ?> </option> 
    <?php
    } 
    ?>
    </select>
<p> Produto:
    <select name="id_produto">
    <?php
        $query = GetQueryAll("produto","nome");
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option> 
    <?php
    } 
    ?>
    </select>

    <p> Quantidade: <input type="number" name="qtde">

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../ItensPedido/Index.html'>Tela Inicial ItensPedido</a>
</form>
</body>