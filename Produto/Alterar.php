<?php
session_start();
include ("../Infra/DbHelper.php");
include('../Infra/Con.php');
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("produto",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar produto</title>
</head>
<body>
    <h1>ALterar produto</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form method="POST" action="procEdit.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Nome: </label>
<input type="text" name="nome" maxlength="100" value="<?php echo $row['nome']; ?>"> 
<p> Preço: 
<input type="number" size="100" maxlength="100" name="preco" value="<?php echo $row['preco']; ?>">
<p> Qtde Estoque: 
<input type="number" size="100" maxlength="100" name="qtdeEstoque" value="<?php echo $row['qtdeEstoque']; ?>">
<p>Unidade de Medida: <select name="unidadeMedida">
            <option value="G"> Grama </option>
            <option value="KG"> Quilograma </option>
            <option value="MG"> miligrama </option>
            </select> 
<p> Categoria:
<select name="idCategoria">
    <?php
        $query = GetQueryAll("categoria","descricao");
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