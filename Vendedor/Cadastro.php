<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    
?>
    <!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Cadastro de Vendedor </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Vendedor </h1>
<form method="POST" action="Incluir.php"> 
<p> Nome: <input type="text" size="100" maxlength="100" name="nome" required>
<p> Cidade: <input type="text" size="100" maxlength="100" name="cidade">
<p>Estado: <select name="estado">
            <option value="SP"> São Paulo </option>
            <option value="RJ"> Rio de Janeiro </option>
            <option value="PR"> Paraná </option>
            </select>
<p> Endereço: <input type="text" size="100" maxlength="100" name="endereco">
<p> porcentagem da Comissao: <input type="number" name="porcComissao">

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Vendedor/Index.html'>Tela Inicial Vendedor</a>
</form>
</body>