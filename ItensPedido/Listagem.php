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
    <title> Listagem itensPedido </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Listagem de itensPedido</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
echo "<tr>
        <td><b> IdPedido</td>
        <td><b> IdProduto</td>
        <td><b> Qtde</td>
      <tr>";
$query = GetQueryAll("itens_pedido","qtde");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){


     $idProduto = $reg["id_produto"];
     $rowProduto = GetById("produto",$idProduto);

    echo "<tr><td>".$reg['id_pedido']. "</td>";
    echo "<td>".$rowProduto['nome']. "</td>";
    echo "<td>".$reg['qtde']. "</td>";
    echo "<td><a href='Deletar.php?id_item=".$reg['id_item']."'>Excluir</a></td>";
}
?>
</table>
<?php
mysqli_close($con)
?>
<td><a href='../ItensPedido/Index.html'>Tela Inicial itensPedido</a></td>

</body>
</html>