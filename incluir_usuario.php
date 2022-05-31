<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("dados.php");

//Inserindo OP

//Recebendo os campos enviados como parÃ¢metro

$idusuario = $_GET['id'];
$cpf = 	$_GET['cpf'];
$usuario = $_GET['usuario'];
$senha = 	$_GET['senha'];

$sql = "INSERT INTO usuarios (id,cpf,usuario,senha) VALUES ('" . $idusuario ."','" . $cpf ."','" . $usuario . "','" . $senha . "')";
mysqli_query($conn,$sql) or die("Erro ao tentar INCLUIR registro");
echo $sql;


mysqli_close($conn);

//Voltando para a pagina que lista as etapas
header("Location:index2.php?prog=cadastrousuario.php");



?>
