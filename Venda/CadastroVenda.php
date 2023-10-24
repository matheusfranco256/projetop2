<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
        $_SESSION["idsProd"]= array();
        $_SESSION["qtdeProd"]= array();
        $_SESSION["date"] = 0;
        $_SESSION["prazoEntrega"] = "";
        $_SESSION["condPagto"] = "INICIADA";
        $_SESSION["idCliente"] = 0;
        $_SESSION["idVendedor"] = 0;
    }
    
?>
    <!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Cadastro de venda </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de venda </h1>
<form method="POST" action="Incluir.php"> 
<p> Data: <input type="date" name="date" required>
<p> Prazo de Entrega: <input type="text" name="prazoEntrega">
<p> condição do Pagto: <input type="text" name="condPagto">
<p> Cliente:
    <select name="idCliente">
    <?php
        $query = GetQueryAll("cliente","nome");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option> 
    <?php
    } 
    ?>
    </select>

    <p> Vendedor:
    <select name="idVendedor">
    <?php
        $query = GetQueryAll("vendedor","nome");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option> 
    <?php
    } 
    ?>
    </select>

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../venda/Index.html'>Tela Inicial venda</a>
</form>
</body>