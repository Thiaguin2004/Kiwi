<?php
include("dados.php");

$codigo_item = 0;
$item = $_GET['item'];
$matricula = $_GET['matricula'];
$datadevolucao = date('Y-m-d H:i:s');

//Localizando o id do funcionario

$sql = "SELECT * FROM funcionarios where matricula=" . $_GET['matricula'];
if($result = mysqli_query($conn, $sql))
  if(mysqli_num_rows($result) > 0)
	if($row = mysqli_fetch_array($result))
		$idfunc = $row['idcodigo'];
   				


$sql = "SELECT * FROM emprestimo where id_func=".$idfunc ."  and id_item=". $_GET['item'] ." and datadevolucao IS NULL ";


if($result = mysqli_query($conn, $sql))
{
   		if(mysqli_num_rows($result) > 0)
   		{
   			if($row = mysqli_fetch_array($result))
   			{

			    $sql2 = "UPDATE emprestimo SET datadevolucao='" . $datadevolucao ."' WHERE id_func=".$idfunc ."  and id_item=". $_GET['item'];

			    mysqli_query($conn,$sql2) or die("Erro ao tentar ALTERAR registro.");
			    mysqli_close($conn);
			    ?>
			
			<script language="javascript">

			alert("DEVOLUÇÃO REALIZADA!");
			window.location.href = "index2.php?prog=devolucao.php";

			</script> 
			
		
			<?php
			}
		}
		else
	    {
			?>
			
			<script language="javascript">

			alert(" ****  EMPRÉSTIMO INEXISTENTE!!!  **** ");
			window.location.href = "index2.php?prog=devolucao.php";

			</script> 
		<?php
		}
		
		
	}




//Voltando para a pagina que lista as etapas

?>
