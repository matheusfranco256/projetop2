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
    <title> Listagem Categorias </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Listagem categorias</center></h1>
<table border ="1" width="100%">
<?php
include('../Infra/DbHelper.php');
include('../Infra/Con.php');
echo "<tr><td><b> Descrição                  </td><tr>";
$query = GetQueryAll("categoria","descricao");
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
while ($reg = mysqli_fetch_array($resu)){
    echo "<tr><td>".$reg['descricao']. "</td>";
    echo "<td><a href='Alterar.php?id=".$reg['id']."'>Editar</a></td>";
    echo "<td><a href='Deletar.php?id=".$reg['id']."'>Excluir</a></td>";

}
?>

</table>
<?php
mysqli_close($con)
?>
<td><a href='../Categoria/Index.html'>Tela Inicial Categoria</a></td>

</body>
</html>