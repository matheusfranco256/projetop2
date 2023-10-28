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
<p><center><h1> Listagem de Vendas</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
echo "<tr>
        <td><b> Data</td>
        <td><b> Prazo Entrega</td>
        <td><b> Condicao Pagamento</td>
        <td><b> Cliente</td>
        <td><b> Vendedor</td>
      <tr>";
$query = GetQueryAll("venda","date");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){
     $idCliente = $reg["idCliente"];
     $rowCliente = GetById("cliente",$idCliente);

     $idVendedor = $reg["idVendedor"];
     $rowVendedor = GetById("vendedor",$idVendedor);

    echo "<tr><td>".$reg['date']. "</td>";
    echo "<td>".$reg['prazoEntrega']. "</td>";
    echo "<td>".$reg['condPagto']. "</td>";
    echo "<td>".$rowCliente['nome']. "</td>";
    echo "<td>".$rowVendedor['nome']. "</td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";
}
?>
</table>
<?php
mysqli_close($con)
?>
<td><a href='../Venda/Index.html'>Tela Inicial Venda</a></td>

</body>
</html>