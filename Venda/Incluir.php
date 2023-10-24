<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{ 
     session_start();    
}
$date = $_POST["date"];
$prazoEntrega = $_POST["prazoEntrega"];
$condPagto = $_POST["condPagto"];
$idCliente = $_POST["idCliente"];
$idVendedor = $_POST["idVendedor"];

include('../Infra/DbHelper.php');
include('../Infra/Con.php');


?>

<!DOCTYPE html
    <html>
    <head>
    <meta charset="UTF-8">
    <title> Escolha de produtos</title>
</head>
<body>
<?php



    if (isset($_SESSION['msg'])){ 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<p><h1> Cadastro de Item Venda </h1>
<form method="POST" action=""> 

<input type="date" name="date" hidden value=<?php echo $date ?>>
<input type="text" name="prazoEntrega" hidden  value=<?php echo $prazoEntrega ?>>
<input type="text" name="condPagto" hidden value=<?php echo $condPagto ?>>
<input type="text" name="idCliente" hidden value=<?php echo $idCliente ?>>
<input type="text" name="idVendedor" hidden value=<?php echo $idVendedor ?>>

<p> Produto:
 <select name="idProduto">
    <?php
        $query = GetQueryAll("produto","nome");
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
   <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option>     
    <?php
    } 
    ?>
    </select>
<p> Quantidade: <input type="number" name="qtdeVendida">

<p> <input type="submit" value="Cadastrar Incluir Produtos" name="LoopProd"> 
<p> <input type="submit" value="Finalizar Compra" name="Finalizar">
<p><a href='../venda/Index.html'>Tela Inicial venda</a>
</form>
</body>



<?php 

 $verificBot =  filter_input(INPUT_POST,'LoopProd');
 if($verificBot){
    $prodId = filter_input(INPUT_POST,'idProduto');
    $qtde = filter_input(INPUT_POST,'qtdeVendida');

    if (!in_array($prodId, $_SESSION["idsProd"])) {
        array_push($_SESSION["idsProd"],$prodId);
        array_push($_SESSION["qtdeProd"],$qtde);
    }

 }

?>

<?php 

 $verificBot2 =  filter_input(INPUT_POST,'Finalizar');
 if($verificBot2){     
    $totalProd = count($_SESSION["idsProd"]);
    $listProd =  $_SESSION["idsProd"];
    $listqtde =  $_SESSION["qtdeProd"];

    
    $date = filter_input(INPUT_POST,'date');
    $prazoEntrega = filter_input(INPUT_POST,'prazoEntrega');
    $condPagto = filter_input(INPUT_POST,'condPagto');
    $idCliente = filter_input(INPUT_POST,'idCliente');
    $idVendedor = filter_input(INPUT_POST,'idVendedor');
    
    $campos = array('date','prazoEntrega','condPagto','idCliente','idVendedor');
    $valores = array($date,$prazoEntrega,$condPagto,$idCliente,$idVendedor);
    $queryVenda = ReturnInsertQuery('venda',$campos,$valores);

    
    if(count($listProd) <= 0){
        $_session['msg']= "<p style='color:red;'>Venda não foi cadastrada!</p>"; 
        header('Location: CadastroVenda.php');
    }
    $result = CadastroVenda($queryVenda,$listProd,$listqtde);

    if($result)
    {
        $_SESSION['msg'] = "<p style='color:blue;'> Venda cadastrada com sucesso!</p>"; 
        header('Location: CadastroVenda.php');
    }
    else{
         $_session['msg']= "<p style='color:red;'>Venda não foi cadastrada!</p>"; 
         header('Location: CadastroVenda.php');
    }

 }

?>






<?php



?>

