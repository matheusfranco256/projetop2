<?php
session_start();
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("vendedor",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar vendedor</title>
</head>
<body>
    <h1>ALterar vendedor</h1>
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
<p> Cidade: 
<input type="text" size="100" maxlength="100" name="cidade" value="<?php echo $row['cidade']; ?>"> 
<p>Estado: 
<select name="estado" value="<?php echo $row['estado']; ?>"> 
    <option value="SP"> São Paulo </option>
    <option value="RJ"> Rio de Janeiro </option>
    <option value="PR"> Paraná </option>
</select>
<p> Endereço: 
<input type="text" size="100" maxlength="100" name="endereco" value="<?php echo $row['endereco']; ?>"> 
<p> porcentagem da Comissao: 
<input type="number" name="porcComissao" value="<?php echo $row['porcComissao']; ?>"> 
<input type="submit" value="Salvar">
</form>
</body>
</html>