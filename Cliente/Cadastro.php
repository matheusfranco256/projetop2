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
    <title> Cadastro de Cliente </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Cliente </h1>
<form method="POST" action="Incluir.php"> 
<p> Nome: <input type="text" size="100" maxlength="100" name="nome" required>
<p> CPF: <input type="text" size="14" maxlength="100" name="cpf" required>
<p> Email: <input type="text" size="100" maxlength="100" name="email" required>
<p> Telefone: <input type="text" size="50" maxlength="100" name="telefone">
<p> Cidade: <input type="text" size="100" maxlength="100" name="cidade">
<p>Estado: <select name="estado">
            <option value="SP"> São Paulo </option>
            <option value="RJ"> Rio de Janeiro </option>
            <option value="PR"> Paraná </option>
            </select>
<p> Endereço: <input type="text" size="100" maxlength="100" name="endereco">
<p> Limite de Credito: <input type="number" name="limiteCredito">

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Cliente/Index.html'>Tela Inicial Cliente</a>
</form>
</body>