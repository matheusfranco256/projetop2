<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    include('../Infra/DbHelper.php');
include('../Infra/Con.php');
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
<label> Categoria: </label>
    <select name="idCategoria">
    <?php
        $query = GetQueryAll("categoria","descricao");
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['descricao']; ?> </option> 
    <?php
    } 
    ?>
    <option value="0"> "Todas"</option> 
    </select>
    <p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
</form>



<table border ="1" width="100%">

<?php

$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$value = filter_input(INPUT_POST,'idCategoria');

echo "<tr>
        <td><b> Nome</td>
        <td><b> Preco</td>
        <td><b> Qtde Estoque</td>
        <td><b> Unidade Medida</td>
        <td><b> categoria</td>
      <tr>";
$query = GetQueryAll("produto","nome"); 
if($verificBotao && $value != 0){
    $query = GetQueryAllFilter("produto","nome","IdCategoria",$value);
}
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

while ($reg = mysqli_fetch_array($resu)){
    $idCat = $reg["idCategoria"];
    $row = GetById("categoria",$idCat);
   echo "<tr><td>".$reg['nome']. "</td>";
   echo "<td>".$reg['preco']. "</td>";
   echo "<td>".$reg['qtdeEstoque']. "</td>";
   echo "<td>".$reg['unidadeMedida']. "</td>";
   echo "<td>".$row['descricao']. "</td>";
}
mysqli_close($con)
?>
</table>

<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>