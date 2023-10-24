<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("vendedor",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar vendedor</title>
</head>
<body>
<h1>Excluir vendedor</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Nome: <?php echo $row['nome']; ?></label>
<p> Cidade: <?php echo $row['cidade']; ?>
<p>Estado: <?php echo $row['estado']; ?>
<p> Endereço: <?php echo $row['endereco']; ?>
<p> Porcentagem de Comissao: <?php echo $row['porcComissao']; ?>

<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>