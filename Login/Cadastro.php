<?php
include('../Infra/_Con.php');
include('../Infra/DbHelper.php');
// $verificBot =  filter_input(INPUT_POST,'FazerLogin');
// $verificBotCadastro = filter_input(INPUT_POST,'Cadastro');
// if($verificBotCadastro){
//     header("Location: Incluir.php");
//  }

//  if($verificBot){
//     $login = filter_input(INPUT_POST,'login');
//     $senha = filter_input(INPUT_POST,'passwd');
//     $idCliente = filter_input(INPUT_POST,'id_cliente');
//     if (GetLoginByEmail($login,$senha,$idCliente)) {
//         header("Location: ../Index/Index.html");
//         exit();
//     }else {
//         $_SESSION['msg'] = "Usuário ou senha inválidos.";
//          header("Location: Cadastro.php");
//         exit();
//     }

   

//  }

?>
<!DOCTYPE html
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <p><h1>Cadastrar</h1>
    <form method="POST" action="Incluir.php">
        <p>Login: <input type="text" size="100" maxlength="20" name="login" required>
        <p>Senha: <input type="text" size="100" maxlength="10" name="passwd" required>

        <p>Cliente:
            <select name="id_cliente">
                <?php
                $query = GetQueryAll("clientes", "nome");
                echo $query;
                $resu = mysqli_query($con, $query) or die(mysqli_connect_error());
                while ($reg = mysqli_fetch_array($resu)) {
                ?>
                    <option value="<?php echo $reg['id']; ?>"> <?php echo $reg['nome']; ?> </option>
                <?php
                }
                ?>
            </select>
          
                <p>   <input type="submit" value="Cadastrar" name =  "Cadastro"> <input type="reset" value="Limpar"> 
                <p><a href='../Login/Index.html'>Tela Inicial Login</a>
       
    </form>
</body>
</html>

<?php 



?>