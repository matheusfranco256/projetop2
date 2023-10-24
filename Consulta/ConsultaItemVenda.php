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
    <title> Consulta Item Venda </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Consulta Item Venda</center></h1>

<?php

$query = "SELECT
                 ve.id,
                 ve.date,
                 ve.prazoEntrega,
                 ve.condPagto,
                 cl.nome AS nomeCliente,
                 ven.nome AS nomeVendedor 
                 FROM venda AS ve
INNER JOIN cliente as cl ON cl.id=ve.idCliente
INNER JOIN vendedor as ven ON ven.id = ve.idVendedor";

$resu= mysqli_query($con, $query) or die(mysqli_connect_error());
$linha ="";
while ($reg = mysqli_fetch_array($resu)){

    
    $linha.= "<p> Id da Venda: ".$reg['id'];
    $linha.= "<p> Data daVenda: ".$reg['date'];
    $linha.= "<p> Prazo Entrega: ".$reg['prazoEntrega'];
    $linha.= "<p> Condição Pagamento: ".$reg['condPagto'];
    $linha.= "<p> Nome do Cliente: ".$reg['nomeCliente'];
    $linha.= "<p> Nome do Vendedor: ".$reg['nomeVendedor'];
    $linha.= "<p> <hr>";
    $linha.= "<p> <hr>";
    $linha.= "------PRODUTOS Da Venda com id {$reg['id']}-------";
   

    
    $queryItensVendas = "SELECT  iv.idVenda,pd.nome,iv.qtdeVendida,ca.descricao,pd.preco,pd.unidadeMedida
    FROM `itemvenda` iv
    INNER JOIN produto as pd ON pd.id= iv.idProduto
    INNER JOIN categoria as ca ON pd.idCategoria = ca.id
    WHERE iv.idVenda = {$reg['id']}";

    $resultIV= mysqli_query($con, $queryItensVendas) or die(mysqli_connect_error());

    while ($regiV = mysqli_fetch_array($resultIV)){
        $linha.=       
        "<p> Produto: ". $regiV['nome'].
        "<p> Quantidade Vendida: ". $regiV['qtdeVendida'].
        "<p> Categoria: ".$regiV['descricao'].
        "<p> Unidade de Medida: ".$regiV['unidadeMedida'].
        "<p> Preco: ".$regiV['preco'];
        $linha.= "<p> <hr>";

    };

    $linha.= "<p> <hr>";
    $linha.= "<p> <hr>";

    
 }
mysqli_close($con);

print($linha);
?>

<p><a href='../Consulta/Index.html'>Tela Inicial Consulta</a></td>

</body>
</html>