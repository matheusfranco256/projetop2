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
    <title> Cadastro de Categoria </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Categoria </h1>
<form method="POST" action="Incluir.php"> 
<p> Descrição: <input type="text" size="100" maxlength="100" name="desc" required>
<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Categoria/Index.html'>Tela Inicial Categoria</a>
</form>
</body>