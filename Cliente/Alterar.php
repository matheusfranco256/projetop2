<?php
session_start();
include ("../Infra/DbHelper.php");
include('../Infra/_Con.php');
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("clientes", $id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar cliente</title>
</head>
<body>
    <h1>Alterar Cliente</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form method="POST" action="procEdit.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p> Nome: <input type="text" size="100" maxlength="100" name="nome" value="<?php echo $row['nome']; ?>"> 
<p> Endereço: <input type="text" size="100" maxlength="200" name="endereco" value="<?php echo $row['endereco']; ?>">
<p> Numero: <input type="text" size="14" maxlength="10" name="numero" value="<?php echo $row['numero']; ?>">
<p> Bairro: <input type="text" size="100" maxlength="100" name="bairro" value="<?php echo $row['bairro']; ?>">
<p> Cidade: <input type="text" size="100" maxlength="100" name="cidade" value="<?php echo $row['cidade']; ?>">
<p>Estado: <select name="estado" >
            <option value="SP"> São Paulo </option>
            <option value="RJ"> Rio de Janeiro </option>
            <option value="PR"> Paraná </option>
            </select>
<p> Email: <input type="text" size="100" maxlength="100" name="email" value="<?php echo $row['email']; ?>"> 
<p> CPF_CNPJ: <input type="text" size="14" maxlength="14" name="cpf_cnpj" value="<?php echo $row['cpf_cnpj']; ?>" required>
<p> RG: <input type="text" size="9" maxlength="9" name="rg" value="<?php echo $row['rg']; ?>" required>
<p> Telefone: <input type="text" size="50" maxlength="20" name="telefone" value="<?php echo $row['telefone']; ?>">
<p> Celular: <input type="text" size="50" maxlength="20" name="celular" value="<?php echo $row['celular']; ?>">
<p> DataNascimento: <input type="date" name="data_nasc" value="<?php echo $row['data_nasc']; ?>" required>


<input type="submit" value="Salvar">
</form>
</body>
</html>