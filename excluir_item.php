<?php
include("dados.php");

//Inserindo Funcionarios

//Recebendo os campos enviados como parâmetro
$codigo = $_GET['idcodigo'];

$sql = "DELETE FROM item_ferramenta WHERE idcodigo=" . $codigo;

mysqli_query($conn,$sql) or die("Erro ao tentar EXCLUIR registro");
mysqli_close($conn);

//Voltando para a pagina que lista as etapas
header("Location:index2.php?prog=cadastroitem.php");

?>
