<?php
session_start();
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("categoria",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar Categoria</title>
</head>
<body>
    <h1>ALterar Categoria</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form method="POST" action="procEdit.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Descrição: </label>
<input type="text" name="nome" maxlength="100" value="<?php echo $row['descricao']; ?>"> 
<input type="submit" value="Salvar">
</form>
</body>
</html>