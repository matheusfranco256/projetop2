<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    
?>
    <!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Cadastro de Produto </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Produto </h1>
<form method="POST" action="Incluir.php"> 
<p> Nome: <input type="text" size="100" maxlength="100" name="nome" required>
<p> Quantidade no Estoque: <input type="number" name="qtdeEstoque">
<p>Unidade de Medida: <select name="unidadeMedida">
            <option value="G"> Grama </option>
            <option value="KG"> Quilograma </option>
            <option value="MG"> miligrama </option>
            </select>
<p> Preço: <input type="number" name="preco">
<label> Categoria: </label>
    <select name="idCategoria">
    <?php
        $query = GetQueryAll("categoria","descricao");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['descricao']; ?> </option> 
    <?php
    } 
    ?>
    </select>

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Produto/Index.html'>Tela Inicial Produto</a>
</form>
</body>