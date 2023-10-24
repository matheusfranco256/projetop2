<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("cliente",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Deletar Cliente</title>
</head>
<body>
<h1>Excluir Cliente</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>
<form method="POST" action="procDel.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p><label> Nome: <?php echo $row['nome']; ?></label>
<p> CPF: <?php echo $row['cpf']; ?> 
<p> Email: <?php echo $row['email']; ?>
<p> Telefone: <?php echo $row['telefone']; ?>
<p> Cidade: <?php echo $row['cidade']; ?>
<p>Estado: <?php echo $row['estado']; ?>
<p> Endereço: <?php echo $row['endereco']; ?>
<p> Limite de Credito: <?php echo $row['limiteCredito']; ?>

<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>