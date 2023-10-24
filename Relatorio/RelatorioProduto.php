<?php
    if (session_status() !== PHP_SESSION_ACTIVE) 
    { 
        session_start();
    }
    include('../Infra/DbHelper.php');
    include('../Infra/Con.php');
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
    
$query = GetQueryAll("produto","idCategoria"); 
$resu= mysqli_query($con, $query) or die(mysqli_connect_error());

$linha ="";
$lastId = 0;
while ($reg = mysqli_fetch_array($resu)){
    $idCat = $reg["idCategoria"];
    $row = GetById("categoria",$idCat);
    if($lastId != $idCat)
    {
        $linha.= "<tr><td>".$row['descricao']. "</td>";
    
    }
    $lastId = $idCat;
   $linha.= "<tr><td></td><td>".$reg['nome']. "</td>";
   $linha.= "<td>".$reg['preco']. "</td>";
   $linha.= "<td>".$reg['qtdeEstoque']. "</td>";
   $linha.= "<td>".$reg['unidadeMedida']. "</td>";
}
mysqli_close($con);

$html =  '
<h1 style="text-align: center;"> Relatorio Produtos</h1>
<hr>
<table border ="1" width="100%">
<tr>
    <tr><td><b> categoria</td>
    <td><b> Nome</td>
    <td><b> Preco</td>
    <td><b> Qtde Estoque</td>
    <td><b> Unidade Medida</td>
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
