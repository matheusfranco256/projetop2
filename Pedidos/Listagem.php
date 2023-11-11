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
<p><center><h1> Listagem de Pedidos</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
echo "<tr>
        <td><b> Data</td>
        <td><b> Cliente</td>
        <td><b> Observação</td>
        <td><b> CondPagto</td>
        <td><b> PrazoEntrega</td>
      <tr>";
$query = GetQueryAll("pedidos","prazo_entrega");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){
     $idCliente = $reg["id_cliente"];
     $rowCliente = GetById("clientes",$idCliente);


    echo "<tr><td>".$reg['data']. "</td>";
    echo "<td>".$rowCliente['nome']. "</td>";
    echo "<td>".$reg['observacao']. "</td>";
    echo "<td>".$reg['cond_pagto']. "</td>";
    echo "<td>".$reg['prazo_entrega']. "</td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";
}
?>
</table>
<?php
mysqli_close($con)
?>
<td><a href='../Pedidos/Index.html'>Tela Inicial Pedidos</a></td>

</body>
</html>