﻿<?php
$servidor='localhost';
$usuario='root'; $senha='';
$db='projetobd';
$con = mysqli_connect($servidor, $usuario, $senha, $db);
if (!$con) {
echo("Erro na conexão com MySQL");
echo("Erro:".mysqli_connect_error());
exit;
}
?>