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
    <title> Relatorio Venda </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Consulta Venda</center></h1>
<form action="" method="POST">
<p> DataInicio: <input type="date" name="dataInicio" >
<p> DataFim: <input type="date" name="dataFim" >
<p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
<p><input type="submit" name="Reset" value="voltar filtro"></p>
</form>



<table border ="1" width="100%">

<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$verificBotao2 =  filter_input(INPUT_POST,'Reset');
$dataInicio = filter_input(INPUT_POST,'dataInicio');
$dataFim = filter_input(INPUT_POST,'dataFim');


    

echo "<tr>
        <td><b> Data</td>
        <td><b> Prazo Entrega</td>
        <td><b> Condicao Pagamento</td>
        <td><b> Cliente</td>
        <td><b> Vendedor</td>
      <tr>";
$query = GetQueryAll("venda","date");  
if($verificBotao){
    if($dataInicio != "" && $dataFim != ""){
        $query = "SELECT * FROM venda WHERE venda.date BETWEEN \"".$dataInicio."\" AND \"".$dataFim."\"";
    }
}
if($verificBotao2){
    $query = GetQueryAll("venda","date"); 
}
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
}
mysqli_close($con)
?>
</table>


<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>