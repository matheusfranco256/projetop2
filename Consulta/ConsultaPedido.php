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
    <title> Relatorio Pedido </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Consulta Pedido</center></h1>
<form action="" method="POST">
<p> DataInicio: <input type="date" name="dataInicio" >
<p> DataFim: <input type="date" name="dataFim" >
<p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
<p><input type="submit" name="Reset" value="voltar filtro"></p>
</form>



<table border ="1" width="100%">

<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$verificBotao2 =  filter_input(INPUT_POST,'Reset');
$dataInicio = filter_input(INPUT_POST,'dataInicio');
$dataFim = filter_input(INPUT_POST,'dataFim');


    

echo "<tr>
        <td><b> Data</td>
        <td><b> Nome</td>
        <td><b> Observacao</td>
        <td><b> Condicao de Pagamento</td>
        <td><b> Prazo de Entrega</td>
      <tr>";
$query = GetQueryAll("pedidos","data");  
if($verificBotao){
    if($dataInicio != "" && $dataFim != ""){
        $query = "SELECT * FROM pedidos WHERE pedidos.data BETWEEN \"".$dataInicio."\" AND \"".$dataFim."\"";
    }
}
if($verificBotao2){
    $query = GetQueryAll("pedidos","data"); 
}
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

while ($reg = mysqli_fetch_array($resu)){
    $idCliente = $reg["id_cliente"];
    $rowCliente = GetById("clientes",$idCliente);


   echo "<tr><td>".$reg['data']. "</td>";
   echo "<td>".$rowCliente['nome']. "</td>";
   echo "<td>".$reg['observacao']. "</td>";
   echo "<td>".$reg['cond_pagto']. "</td>";
   echo "<td>".$reg['prazo_entrega']. "</td>";
   
}
mysqli_close($con)
?>
</table>


<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>