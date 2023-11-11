<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }    
?>
<!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Listagem Produtos </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Listagem Produtos</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
echo "<tr>
        <td><b> Nome</td>
        <td><b> Qtde Estoque</td>
        <td><b> Valor Unitario</td>
        <td><b> Unidade de Medida</td>
      <tr>";
$query = GetQueryAll("produto","nome");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){

    echo "<tr><td>".$reg['nome']. "</td>";
    echo "<td>".$reg['qtde_estoque']. "</td>";
    echo "<td>".$reg['valor_unitario']. "</td>";
    echo "<td>".$reg['unidade_medida']. "</td>";
    echo "<td><a href='Alterar.php?id=".$reg['id']."'>Editar</a></td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";
}
?>
</table>
<?php
mysqli_close($con)
?>
<td><a href='../Produto/Index.html'>Tela Inicial Produto</a></td>

</body>
</html>