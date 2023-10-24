<?php
session_start();
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("cliente",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar cliente</title>
</head>
<body>
    <h1>ALterar Cliente</h1>
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
<p> CPF: 
<input type="text" size="14" maxlength="100" name="cpf" value="<?php echo $row['cpf']; ?>"> 
<p> Email: 
<input type="text" size="100" maxlength="100" name="email" value="<?php echo $row['email']; ?>"> 
<p> Telefone: 
<input type="text" size="50" maxlength="100" name="telefone" value="<?php echo $row['telefone']; ?>"> 
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
<p> Limite de Credito: 
<input type="number" name="limiteCredito" value="<?php echo $row['limiteCredito']; ?>"> 



<input type="submit" value="Salvar">
</form>
</body>
</html>