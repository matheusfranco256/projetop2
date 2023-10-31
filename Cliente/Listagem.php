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
    <title> Listagem Clientes </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Listagem Clientes</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
echo "<tr>
        <td><b> Nome</td>
        <td><b> Endereco</td>
        <td><b> Numero</td>
        <td><b> Bairro</td>
        <td><b> Cidade</td>
        <td><b> Estado</td>
        <td><b> Email</td>
        <td><b> Cpf_Cnpj</td>
        <td><b> Rg</td>
        <td><b> Telefone</td>
        <td><b> Celular</td>
        <td><b> Data_nasc</td>
      <tr>";
$query = GetQueryAll("clientes","nome");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){
    echo "<tr><td>".$reg['nome']. "</td>";
    echo "<td>".$reg['endereco']. "</td>";
    echo "<td>".$reg['numero']. "</td>";
    echo "<td>".$reg['bairro']. "</td>";
    echo "<td>".$reg['cidade']. "</td>";
    echo "<td>".$reg['estado']. "</td>";
    echo "<td>".$reg['email']. "</td>";
    echo "<td>".$reg['cpf_cnpj']. "</td>";
    echo "<td>".$reg['rg']. "</td>";
    echo "<td>".$reg['telefone']. "</td>";
    echo "<td>".$reg['celular']. "</td>";
    echo "<td>".$reg['data_nasc']. "</td>";

    echo "<td><a href='Alterar.php?id=".$reg['id']."'>Editar</a></td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";

}
?>

</table>
<?php
mysqli_close($con)
?>
<td><a href='../Cliente/Index.html'>Tela Inicial Cliente</a></td>

</body>
</html>