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
    <title> Consulta ItensPedido </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Relatorio ItensPedido</center></h1>




<table border ="1" width="100%">

<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$value = filter_input(INPUT_POST,'nome');


    

echo "<tr>
        <td><b> IdItem</td>
        <td><b> IdPedido</td>
        <td><b> Nome Do Produto</td>
        <td><b> Quantidade</td>
       
      <tr>";
      $query = "SELECT
      ip.id_pedido,
      ip.id_item,
      ip.qtde,
      pd.nome AS nomeProduto 
      FROM itens_pedido AS ip
INNER JOIN produto as pd ON pd.id = ip.id_produto
ORDER BY pd.nome";    

$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

while ($reg = mysqli_fetch_array($resu)){

    echo "<tr><td>".$reg['id_item']. "</td>";
    echo "<td>".$reg['id_pedido']. "</td>";
    echo "<td>".$reg['nomeProduto']. "</td>";
    echo "<td>".$reg['qtde']. "</td>";


}
mysqli_close($con)
?>
</table>


<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>