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
<p> Preço: <?php echo $row['preco']; ?>
<p>Qtde Estoque: <?php echo $row['qtdeEstoque']; ?>
<p>Unidade Medida: <?php echo $row['unidadeMedida']; ?>
<p> Categoria: 
<?php 
 $idCat = $row["idCategoria"];
 $rowCat = GetById("categoria",$idCat);  
echo $rowCat['descricao']; 
?>
<p><input type="submit" value="Confirma exclusão">
</form>
</body>
</html>