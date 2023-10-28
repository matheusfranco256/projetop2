<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("produto",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar produto</title>
</head>
<body>
<h1>Excluir produto</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Nome: <?php echo $row['nome']; ?></label>
<p>Qtde Estoque: <?php echo $row['qtde_estoque']; ?>
<p> ValorUnitario: <?php echo $row['valor_unitario']; ?>
<p>Unidade Medida: <?php echo $row['unidade_medida']; ?>
<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>