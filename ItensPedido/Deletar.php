<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/_Con.php");
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id_item', FILTER_SANITIZE_NUMBER_INT); 
$row = GetItemPedidoById("itens_pedido",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar itensPedido</title>
</head>
<body>
<h1>Excluir itensPedido</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id_item" value="<?php echo $row['id_item']; ?>">
<p><label> IdProduto: <?php echo $row['id_produto']; ?></label>
<p>Quantidade: <?php echo $row['qtde']; ?>
<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>