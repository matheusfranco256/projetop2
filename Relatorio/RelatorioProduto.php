<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    include('../Infra/DbHelper.php');
    include('../Infra/_Con.php');
?>
<p><center><h1> Relatorio Produtos</center></h1>
<form action="" method="POST">
    <p><input type="submit" name="Gerar" value="Gerar"></p>
    <p><a href='../Relatorio/Index.html'>Tela Inicial Relatorio</a>
</form>

<?php

$verificBotao =  filter_input(INPUT_POST,'Gerar');
use Dompdf\Dompdf;
if($verificBotao){
    
$query = GetQueryAll("produto","nome"); 
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

$linha ="";
$lastId = 0;
while ($reg = mysqli_fetch_array($resu)){

   $linha.= "<tr><td>".$reg['nome']. "</td>";
   $linha.= "<td>".$reg['qtde_estoque']. "</td>";
   $linha.= "<td>".$reg['valor_unitario']. "</td>";
   $linha.= "<td>".$reg['unidade_medida']. "</td>";
}
mysqli_close($con);

$html =  '



<table  width="100%">
<tr>
    <tr><td><b> Nome</td>
    <td><b> Quantidade de Estoque</td>
    <td><b> Valor Unitario</td>
    <td><b> Unidade de Medida</td>
  </tr>
'.
$linha
.
'
</table>
';


require_once("dompdf/autoload.inc.php");

$dompdf = new Dompdf();




$dompdf->loadHtml($html);
$dompdf->setPaper("A4","portrait");
$dompdf->render();
$dompdf->stream("RelatorioProduto.pdf");
}
?>
