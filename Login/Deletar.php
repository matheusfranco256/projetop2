<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("login_usuarios",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar login_usuarios</title>
</head>
<body>
<h1>Excluir login usuarios</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Login: <?php echo $row['login']; ?></label>
<p> Senha: <?php echo $row['senha']; ?>
<p>IdCliente: <?php echo $row['id_cliente']; ?>

<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>