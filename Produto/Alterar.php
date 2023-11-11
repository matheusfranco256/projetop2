<?php
session_start();
include ("../Infra/DbHelper.php");
include('../Infra/_Con.php');
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("produto",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar produto</title>
</head>
<body>
    <h1>Alterar produto</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form method="POST" action="procEdit.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p> Nome: <input type="text" size="100" maxlength="100" name="nome" required  value="<?php echo $row['nome']; ?>">
<p> Quantidade no Estoque: <input type="number" name="qtde_estoque"  value="<?php echo $row['qtde_estoque']; ?>">
<p> ValorUnitario: <input type="number" name="valor_unitario"  value="<?php echo $row['valor_unitario']; ?>">
<p>Unidade de Medida: <select name="unidade_medida"  value="<?php echo $row['unidade_medida']; ?>">
            <option value="G"> Grama </option>
            <option value="KG"> Quilograma </option>
            <option value="MG"> Miligrama </option>
            </select>

<p> <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
<p><a href='../Produto/Index.html'>Tela Inicial Produto</a>
</form>
</body>