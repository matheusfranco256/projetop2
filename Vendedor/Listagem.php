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
    <title> Listagem Vendedores </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Listagem Vendedores</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
echo "<tr>
        <td><b> Nome</td>
        <td><b> Cidade</td>
        <td><b> Estado</td>
        <td><b> Endereco</td>
        <td><b> Porcentagem de Comissao</td>
      <tr>";
$query = GetQueryAll("vendedor","nome");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){
    echo "<tr><td>".$reg['nome']. "</td>";
    echo "<td>".$reg['cidade']. "</td>";
    echo "<td>".$reg['estado']. "</td>";
    echo "<td>".$reg['endereco']. "</td>";
    echo "<td>".$reg['porcComissao']. "</td>";
    echo "<td><a href='Alterar.php?id=".$reg['id']."'>Editar</a></td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";

}
?>

</table>
<?php
mysqli_close($con)
?>
<td><a href='../Vendedor/Index.html'>Tela Inicial Vendedor</a></td>

</body>
</html>