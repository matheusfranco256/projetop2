<?php

function InsertInto($tableName,$listFields,$listValues)
{
    include ("_Con.php");
    $campos = join(",",$listFields);
    $valores = [];
    $valoresQuery ="";
    //descricao='$descricao'
    foreach($listValues as $v)
    {
     array_push($valores,"\"".$v."\"");
    }
    $valoresQuery = join(",",$valores);
    $query= "INSERT INTO {$tableName} ({$campos})
    VALUES ({$valoresQuery})";
    mysqli_query($con, $query);

    if (mysqli_insert_id($con)) {
        mysqli_close($con);
        return  true;
        } else {
            mysqli_close($con);
            return  false;
        }    
}
function Update($tableName,$listFields,$listValues,$id)
{    
    include ("_Con.php");
    $setUpdate = [];
    $totacampos = count($listFields);
    for ($i = 0; $i < $totacampos ;$i++) 
    {
        array_push($setUpdate,"{$listFields[$i]} = \"".$listValues[$i]."\"");
    }
    $valores = join(",",$setUpdate);
    $query="UPDATE {$tableName} SET {$valores} WHERE id = {$id}";
    mysqli_query($con, $query);

    if (mysqli_affected_rows($con)) {
        mysqli_close($con);
        return  true;
        } else {
            mysqli_close($con);
            return  false;
        }    
}
function GetById($tableName,$id)
{
    include ("_Con.php");
    $query = "SELECT * FROM {$tableName} WHERE id = {$id}"; 
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}

function VerificaChaveEst($tableName,$FkName,$id)
{
    include ("_Con.php");
    $query="SELECT * from {$tableName} WHERE {$FkName} = $id";
    mysqli_query($con, $query);
    if (mysqli_affected_rows ($con))
    {
        return true;
    }
    else{
        return false;
    }

}

function Delete($tableName,$id)
{
    include ("_Con.php");
    $query="DELETE FROM {$tableName} WHERE id={$id}";
    echo $query;
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con)){
        return true;
    }
    else{
        return false;
    }
}
function DeleteParents($tableName,$id,$field)
{
    include ("_Con.php");
    $query="DELETE FROM {$tableName} WHERE {$field}={$id}";
    echo $query;
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con)){
        return true;
    }
    else{
        return false;
    }
}

function GetQueryAll($tableName,$orderBy){
    include ("_Con.php");
    return  "SELECT * from {$tableName} ORDER BY {$orderBy}"; 
}

function GetQueryAllFilter($tableName,$orderBy,$searchField,$seachValue){
    include ("_Con.php");
    return  "SELECT * from {$tableName} WHERE {$searchField}=\"".$seachValue."\" ORDER BY {$orderBy}"; 
}

function VerificaUnic($tableName,$field,$value)
{
    include ("_Con.php");
    $query="SELECT * from {$tableName} WHERE {$field}=\"".$value."\"";
    $result = mysqli_query($con, $query);

    if ($con->affected_rows > 0)
    {
        $i = mysqli_fetch_assoc($result);
        return $i['id'];
    }
    else{
        return 0;
    }
}

function ReturnInsertQuery ($tableName,$listFields,$listValues)
{
    include ("_Con.php");
    $campos = join(",",$listFields);
    $valores = [];
    $valoresQuery ="";
    //descricao='$descricao'
    foreach($listValues as $v)
    {
     array_push($valores,"\"".$v."\"");
    }
    $valoresQuery = join(",",$valores);
    $query= "INSERT INTO {$tableName} ({$campos})
    VALUES ({$valoresQuery})";
    return $query;
}

function CadastroVenda($queryVenda,$listProd,$listQtde){
    include ("_Con.php");
    mysqli_begin_transaction($con) or die (mysqli_connect_error());
    try{

        //cadastroVenda
        $result = mysqli_query($con, $queryVenda);
        $idVenda = mysqli_insert_id($con);


        for($i = 0; $i < count($listProd);$i++) {
            //Criar querys da tabela itemVenda 
            $campos = array('idProduto','idVenda','qtdeVendida');
            $valores = array($listProd[$i],$idVenda,$listQtde[$i]);
            $query = ReturnInsertQuery('itemvenda',$campos,$valores);
            mysqli_query($con, $query);
         }


        mysqli_commit($con);
        mysqli_close($con);
        return true;
    }
    catch(mysqli_sql_exception $exception){
        mysqli_rollback($con);
        mysqli_close($con); 
        return false;
    }
   
    


    
}

?>



