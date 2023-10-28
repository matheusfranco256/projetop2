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
    <title> Relatorio Venda </title>
</head>
<body>
<?php
    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><center><h1> Relatorio Venda</center></h1>
<form action="" method="POST">
<p> DataInicio: <input type="date" name="dataInicio" >
<p> DataFim: <input type="date" name="dataFim" >
<p><input type="submit" name="Gerar" value="Gerar"></p>
<p><input type="submit" name="Reset" value="voltar filtro"></p>
<p><a href='../Relatorio/Index.html'>Tela Inicial Relatorio</a>
</form>





<?php

$verificBotao =  filter_input(INPUT_POST,'Gerar');
$verificBotao2 =  filter_input(INPUT_POST,'Reset');
$dataInicio = filter_input(INPUT_POST,'dataInicio');
$dataFim = filter_input(INPUT_POST,'dataFim');

use Dompdf\Dompdf;

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

if($verificBotao2){

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

}
if($verificBotao){    

if($dataInicio != null && $dataFim != null){
    $query .= "
    WHERE ve.date BETWEEN \"".$dataInicio."\" AND \"".$dataFim."\"";
}
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

require_once("dompdf/autoload.inc.php");

$dompdf = new Dompdf();

$html =  '
<h1 style="text-align: center;"> Relatorio Vendas</h1>
<hr>
'
.
$linha
;

$dompdf->loadHtml($html);
$dompdf->setPaper("A4","landscape");
$dompdf->render();

$dompdf->stream("RelatorioItemVenda.pdf");
}
?>
