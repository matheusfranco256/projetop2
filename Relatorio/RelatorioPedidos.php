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
<p><center><h1> Relatorio Pedidos</center></h1>
<form action="" method="POST">
<p> DataInicio: <input type="date" name="dataInicio" >
<p> DataFim: <input type="date" name="dataFim" >
<p><input type="submit" name="Gerar" value="Gerar"></p>
<p><input type="submit" name="Reset" value="voltar filtro"></p>
<p><a href='../Relatorio/Index.html'>Tela Inicial Relatorio</a>
</form>





<?php

$verificBotao =  filter_input(INPUT_POST,'Gerar');

$dataInicio = filter_input(INPUT_POST,'dataInicio');
$dataFim = filter_input(INPUT_POST,'dataFim');

use Dompdf\Dompdf;

$query = "SELECT
                 pe.id,
                 pe.data,
                 pe.id_cliente,
                 pe.observacao,
                 pe.cond_pagto,
                 pe.prazo_entrega,
                 it.id_produto AS id_produto,
                 it.qtde AS QuantidadeVendida,
                 it.id_item AS id_item
                 FROM pedidos AS pe
INNER JOIN itens_pedido as it ON it.id_pedido = pe.id";

if($verificBotao){    

if($dataInicio != null && $dataFim != null){
    $query .= "
    WHERE pe.data BETWEEN \"".$dataInicio."\" AND \"".$dataFim."\"";
}
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

$linha ="";
while ($reg = mysqli_fetch_array($resu)){
    

    
    $linha.= "<p> Id do Pedido: ".$reg['id'];
    $linha.= "<p> Data do Pedido: ".$reg['data'];
    $linha.= "<p> Id do Cliente: ".$reg['id_cliente'];
    $linha.= "<p> Observacao: ".$reg['observacao'];
    $linha.= "<p> Condição de Pagamento: ".$reg['cond_pagto'];
    $linha.= "<p> Prazo de entrega: ".$reg['prazo_entrega'];
    $linha.= "<p> Id do Produto: ".$reg['id_produto'];
    $linha.= "<p> Quantidade Vendida: ".$reg['QuantidadeVendida'];
    $linha.= "<p> Id do Item: ".$reg['id_item'];
    
   
   
    $linha.= "<p> <hr>";
    $linha.= "<p> <hr>";

    
 }
mysqli_close($con);

require_once("dompdf/autoload.inc.php");

$dompdf = new Dompdf();

$html =  '

'
.
$linha
;

$dompdf->loadHtml($html);
$dompdf->setPaper("A4","landscape");
$dompdf->render();

$dompdf->stream("RelatorioPedidos.pdf");
}
?>
