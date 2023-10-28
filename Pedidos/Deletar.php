<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("pedidos",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar pedidos</title>
</head>
<body>
<h1>Excluir Pedidos</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Data: <?php echo $row['data']; ?></label>
<p>IdCliente: <?php echo $row['id_cliente']; ?>
<p>Observação: <?php echo $row['observacao']; ?>
<p>Prazo de Entrega: <?php echo $row['prazo_entrega']; ?>
<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>