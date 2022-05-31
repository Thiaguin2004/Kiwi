<?php
include("dados.php");


//Recebendo os campos enviados como par�metro
$idusuario 	= $_GET['id'];
$cpf 	= $_GET['cpf'];
$usuario 	= $_GET['usuario'];
$senha 	= $_GET['senha'];

   $sql = "UPDATE usuario SET cpf='" . $cpf ."',usuario='" . $usuario . "' ,senha = '" . $senha.  "' where id=". $idusuario;

mysqli_query($conn,$sql) or die("Erro ao tentar ALTERAR registro");
mysqli_close($conn);

//Voltando para a pagina que lista as etapas
header("Location:index2.php?prog=cadastrousuario.php");

?>
