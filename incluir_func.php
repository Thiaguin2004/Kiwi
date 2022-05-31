<?php
include("dados.php");

//Inserindo Funcionários

//Recebendo os campos enviados como parâmetro

$nome = $_GET['nome'];
$matricula = $_GET['matricula'];

$sql = "INSERT INTO funcionarios (nome,matricula) VALUES ('" . $nome ."','" . $matricula . "')";

mysqli_query($conn,$sql) or die("Erro ao tentar INCLUIR registro");
mysqli_close($conn);

//Voltando para a pagina que lista as etapas
header("Location:index2.php?prog=cadastrofunc.php");

?>
