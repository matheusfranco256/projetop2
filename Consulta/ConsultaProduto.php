<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
?>

<!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Relatorio Produtos </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Relatorio Produtos</center></h1>
<form action="" method="POST">
<label>Nome:</label><input type="text" name="nome" size ="30">
<p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
</form>



<table border ="1" width="100%">

<?php

$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$value = filter_input(INPUT_POST,'nome');

echo "<tr>
        <td><b> Nome</td>
        <td><b> Qtde Estoque</td>
        <td><b> Valor Unitario</td>
        <td><b> Unidade de Medida</td>
      <tr>";
$query = GetQueryAll("produto","nome"); 
if($verificBotao && $value != 0){
    $query = GetQueryAllFilter("produto","nome","nome",$value);
}
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

while ($reg = mysqli_fetch_array($resu)){
   echo "<tr><td>".$reg['nome']. "</td>";
   echo "<td>".$reg['qtde_estoque']. "</td>";
   echo "<td>".$reg['valor_unitario']. "</td>";
   echo "<td>".$reg['unidade_medida']. "</td>";

}
mysqli_close($con)
?>
</table>

<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>