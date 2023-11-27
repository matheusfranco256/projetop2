<?php
include('../Infra/_Con.php');
include('../Infra/DbHelper.php');
$verificBot =  filter_input(INPUT_POST,'FazerLogin');
// $verificBotCadastro = filter_input(INPUT_POST,'Cadastro');
// if($verificBotCadastro){
//     header("Location: Incluir.php");
//  }


 if($verificBot){
    $login = filter_input(INPUT_POST,'login');
    $senha = filter_input(INPUT_POST,'passwd');
    $idCliente = filter_input(INPUT_POST,'id_cliente');

  $hashed_password_from_database = GetHashedPasswordByEmail($login, $idCliente); // Replace with your actual function
  if (password_verify($senha,$hashed_password_from_database)) {
   

      header("Location: ../Index/Index.html");
      exit();
  } else {
      $_SESSION['msg'] = "Usuário ou senha inválidos.";
      header("Location: Cadastro.php");
      exit();
  }

   

 }

?>