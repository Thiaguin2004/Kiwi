<?php
include("dados.php");

$codigo_item = 0;
$item = $_GET['item'];
$matricula = $_GET['matricula'];
$dataprevistadevolucao = inverteData($_GET['dataprevistadevolucao']);
$codigo_func = 0;
$dataatualcompleta = date('Y-m-d H:i:s');
$dataatual = date('Y-m-d');
$intervalo = 0;

$sql = "SELECT * FROM funcionarios WHERE matricula ='$matricula'";

if($result = mysqli_query($conn, $sql))
	if(mysqli_num_rows($result) > 0)
	     if($row = mysqli_fetch_array($result))
		{
		   $codigo_func = $row['idcodigo'];
        }

if ($codigo_func==0)
	echo "Matrícula inexistente";


$sql3 = "SELECT * FROM item_ferramenta WHERE idcodigo ='$item'";

if($result1 = mysqli_query($conn, $sql3))
	if(mysqli_num_rows($result1) > 0)
	     if($row1 = mysqli_fetch_array($result1))
		{
		$codigo_item = $row1['idcodigo'];
		$dataafericao = $row1['dataafericao'];
		$intervalo = $row1['intervalo'];
	        }

$sql3 = "SELECT * FROM emprestimo WHERE id_item ='$codigo_item' and datadevolucao is null";
if($result1 = mysqli_query($conn, $sql3))
	if(mysqli_num_rows($result1) > 0)
	     if($row1 = mysqli_fetch_array($result1))
		die("ERRO: Ferramenta já emprestada");

		

		if ($codigo_item==0)
		   die("ERRO: Item inexistente");


		if ($dataafericao == "")
		{
       			$sql2 = "INSERT INTO emprestimo (id_func,id_item,dataemprestimo,dataprevistadevolucao) VALUES ('" . $codigo_func ."','" . $codigo_item . "','" . $dataatualcompleta . "','" . $dataprevistadevolucao . "')";
		}
		if ($dataafericao != "")
		{
			$dataafericao = date('Y-m-d', strtotime($dataafericao. ' + ' . $intervalo . ' days')) ;
			if ($dataafericao<=$dataatual)
			{
				
				die("NÃO FOI POSSIVEL EMPRESTAR. FORA DO PRAZO DE AFERIÇÃO.");
			}
			if ($dataafericao>$dataatual)
			{
				
				$sql2 = "INSERT INTO emprestimo (id_func,id_item,dataemprestimo,dataprevistadevolucao) VALUES ('" . $codigo_func ."','" . $codigo_item . "','" . $dataatualcompleta . "','" . $dataprevistadevolucao . "')";
				
			}
		}


	mysqli_query($conn,$sql) or die("Erro ao tentar verificar funcionário no banco. ");
	mysqli_query($conn,$sql3) or die("Erro ao tentar verificar item no banco. ");
	mysqli_query($conn,$sql2) or die("Erro ao tentar INCLUIR registro.");
	mysqli_close($conn);

	 

?>
<script language="javascript">

alert("EMPRÉSTIMO REALIZADO");
window.location.href = "index2.php?prog=emprestimo.php";

</script> 
