<?php
if(session_status() !== PHP_SESSION_ACTIVE){session_start();}
include("conexao.php");

$nomefunc = mysqli_real_escape_string($conexao, trim($_POST['nomefunc']));
$cod_bar = mysqli_real_escape_string($conexao, trim($_POST['cod_bar']));

$sql = "INSERT INTO `funcionarios`(`nomefunc`, `idfunc`, `codbar`) VALUES ('$nomefunc','','$cod_bar')";
$conexao->query($sql);
$conexao->close();

header('Location: cadastro.php');
exit;
?>