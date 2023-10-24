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
<label>Nome:</label><input type="text" name="nome" size ="30">
<p><input type="submit" name="Pesquisar" value="Pesquisar"></p>
</form>



<table border ="1" width="100%">

<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
$verificBotao =  filter_input(INPUT_POST,'Pesquisar');
$value = filter_input(INPUT_POST,'nome');


    

echo "<tr>
        <td><b> Nome</td>
        <td><b> CPF</td>
        <td><b> Email</td>
        <td><b> Telefone</td>
        <td><b> Cidade</td>
        <td><b> Estado</td>
        <td><b> Endereco</td>
        <td><b> Limite de Credito</td>
      <tr>";
$query = GetQueryAll("cliente","nome");     
if($verificBotao && $value != null){
    $query = GetQueryAllFilter("cliente","nome","nome",$value);
}
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

while ($reg = mysqli_fetch_array($resu)){
    echo "<tr><td>".$reg['nome']. "</td>";
    echo "<td>".$reg['cpf']. "</td>";
    echo "<td>".$reg['email']. "</td>";
    echo "<td>".$reg['telefone']. "</td>";
    echo "<td>".$reg['cidade']. "</td>";
    echo "<td>".$reg['estado']. "</td>";
    echo "<td>".$reg['endereco']. "</td>";
    echo "<td>".$reg['limiteCredito']. "</td>";
}
mysqli_close($con)
?>
</table>


<td><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>