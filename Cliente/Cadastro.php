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
<p> Endereço: <input type="text" size="100" maxlength="200" name="endereco">
<p> Numero: <input type="text" size="14" maxlength="10" name="numero">
<p> Bairro: <input type="text" size="100" maxlength="100" name="bairro">
<p> Cidade: <input type="text" size="100" maxlength="100" name="cidade">
<p>Estado: <select name="estado">
            <option value="SP"> São Paulo </option>
            <option value="RJ"> Rio de Janeiro </option>
            <option value="PR"> Paraná </option>
            </select>
<p> Email: <input type="text" size="100" maxlength="100" name="email"> 
<p> CPF_CNPJ: <input type="text" size="14" maxlength="14" name="cpf_cnpj" required>
<p> RG: <input type="text" size="9" maxlength="9" name="rg" required>

<p> Telefone: <input type="text" size="50" maxlength="20" name="telefone">
<p> Celular: <input type="text" size="50" maxlength="20" name="celular">
<p> DataNascimento: <input type="date" name="data_nasc" required>

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Cliente/Index.html'>Tela Inicial Cliente</a>
</form>
</body>