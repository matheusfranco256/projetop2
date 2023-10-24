<?php
$servidor='localhost';
$usuario='root'; $senha='';
$db='projetop2';
$con = mysqli_connect($servidor, $usuario, $senha, $db);
if (!$con) {
echo("Erro na conexão com MySQL");
echo("Erro:".mysqli_connect_error());
exit;
}
?>