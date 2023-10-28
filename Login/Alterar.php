<?php
session_start();
$_SESSION["id_cliente"] = 0;
include ("../Infra/DbHelper.php");
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
$row = GetById("login_usuarios",$id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"> <title>Alterar login_usuarios</title>
</head>
<body>
    <h1>ALterar login_usuarios</h1>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form method="POST" action="procEdit.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<p> Login: <input type="text" size="100" maxlength="20" name="login" required>
<p> Senha: <input type="text" size="100" maxlength="10" name="senha">

<p> Cliente:
    <select name="id_cliente">
    <?php
        $query = GetQueryAll("clientes","nome");
        echo $query;
        $resu= mysqli_query($con, $query) or die(mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
    ?>
    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option> 
    <?php
    } 
    ?>
    </select>
<input type="submit" value="Salvar">
</form>
</body>
</html>