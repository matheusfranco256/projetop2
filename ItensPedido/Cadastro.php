<?php
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
    <title> Cadastro de Pedido </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Login </h1>
<form method="POST" action="Incluir.php"> 
<p> Pedido:
    <select name="id_pedido>
    <?php
        $query = GetQueryAll("pedidos","id_pedido");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['id_pedido']; ?> </option> 
    <?php
    } 
    ?>
    </select>
<p> Produto:
    <select name="id_produto">
    <?php
        $query = GetQueryAll("itens_pedido","id_pedido");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['id_pedido']; ?> </option> 
    <?php
    } 
    ?>
    </select>

    <p> Quantidade: <input type="number" name="qtde">

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../ItensPedido/Index.html'>Tela Inicial Login</a>
</form>
</body>