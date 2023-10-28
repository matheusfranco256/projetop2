<?php
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
    <title> Cadastro de Login </title>
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
<p> Login: <input type="text" size="100" maxlength="20" name="login" required>
<p> Senha: <input type="text" size="100" maxlength="10" name="senha">

<p> Cliente:
    <select name="id_cliente">
    <?php
        $query = GetQueryAll("clientes","nome");
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
<p><a href='../Login/Index.html'>Tela Inicial Login</a>
</form>
</body>