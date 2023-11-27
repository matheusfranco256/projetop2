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
    <title> Consulta Clientes </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Relatorio Clientes</center></h1>
<form action="" method="POST">
<label>Nome ou Cidade:</label><input type="text" name="nome" size ="30">
<p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
</form>



<table border ="1" width="100%">

<?php
include('../Infra/DbHelper.php');
include('../Infra/_Con.php');
$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$value = filter_input(INPUT_POST,'nome');


    

echo "<tr>
        <td><b> Nome</td>
        <td><b> Endereco</td>
        <td><b> Numero</td>
        <td><b> Bairro</td>
        <td><b> Cidade</td>
        <td><b> Estado</td>
        <td><b> Email</td>
        <td><b> CPF_CNPJ</td>
        <td><b> RG</td>
        <td><b> Telefone</td>
        <td><b> Celular</td>
        <td><b> DataNascimento</td>
      <tr>";
$query = GetQueryAll("clientes","nome");     
if($verificBotao && $value != null){
    $query = GetQueryAllFilter2("clientes","nome","nome","cidade",$value);
}
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
}
mysqli_close($con)
?>
</table>


<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>