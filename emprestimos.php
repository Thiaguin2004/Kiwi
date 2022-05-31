<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Código Item</title>
</head>

<?php
//recebendo dados
$codfun ="";
if(isset($_GET['codfun']))
    $codfun = $_GET['codfun'];

$codfer ="";
if(isset($_GET['codfer']))
    $codfer = $_GET['codfer'];

$dataemp ="";
if(isset($_GET['dataemp']))
    $dataemp = $_GET['dataemp'];

$datadev ="";
if(isset($_GET['datadev']))
    $datadev = $_GET['datadev'];

$situacao="";
if(isset($_GET['situacao']))
    $situacao = $_GET['situacao'];

?>



<body>

<p>&nbsp;</p>
<form method="GET" action="index2.php">
	<input type="hidden" name="prog" value="emprestimos.php">
	<div align="center">
		<table border="0" width="90%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="220"><b><font face="Arial" style="font-size: 11pt">
				COD.
				FUNCIONÁRIO</font></b></td>
				<td width="232"><b><font style="font-size: 11pt" face="Arial">
				COD. FERRAMENTA</font></b></td>
				<td width="227"><b><font face="Arial" style="font-size: 11pt">
				DATA EMPRÉSTIMO</font></b></td>
				<td width="232"><b><font face="Arial" style="font-size: 11pt">
				DATA DEVOLUÇÃO</font></b></td>
				<td><b><font face="Arial" style="font-size: 11pt">SITUAÇÃO</font></b></td>
			</tr>
			<tr>
				<td width="220"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="codfun" size="5" style="font-weight: 700" value="<?php echo $codfun;?>" ></span></font></td>
				<td width="232"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="codfer" size="5" style="font-weight: 700" value="<?php echo $codfer;?>"></span></font></td>
				<td width="227"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="dataemp" size="12" style="font-weight: 700" value="<?php echo $dataemp;?>" onkeypress="mascaraData(this)" ></span></font></td>
				<td width="232"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="datadev" size="12" style="font-weight: 700" value="<?php echo $datadev;?>" onkeypress="mascaraData(this)" ></span></font></td>
				<td><font face="Arial"><span style="font-size: 11pt">
				<input type="radio" value="emprestado" <?php if($situacao=="emprestado") echo "checked";?> name="situacao"></span><span style="font-size: 10pt">Emprestados
				</span><span style="font-size: 11pt">
				<input type="radio" name="situacao" value="devolvidos" <?php if($situacao=="devolvidos") echo "checked";?> ></span><span style="font-size: 10pt">Devolvidos&nbsp;
				</span><span style="font-size: 11pt">
				<input type="radio" name="situacao" value="todos" <?php if($situacao=="todos") echo "checked";?> ></span><span style="font-size: 10pt">Todos</span></font></td>
			</tr>
			<tr>
				<td width="220">&nbsp;</td>
				<td width="232">&nbsp;</td>
				<td width="227">&nbsp;</td>
				<td width="232">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="220"><font face="Arial">
				<span style="font-size: 11pt">
				<input type="submit" value="Filtrar" name="B1" style="font-weight: 700"></span><b><span style="font-size: 11pt">&nbsp;
				</span></b></font></td>
				<td width="232"><font face="Arial">
				<span style="font-size: 11pt">
				</td>
				<td width="227">&nbsp;</td>
				<td width="232">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
	<p align="center">&nbsp;</p>
	<div align="center">
		<table border="0" width="90%" cellpadding="3" bgcolor="#E9E9E9">
			<tr>
				
				
				<td width="488" bgcolor="#C0C0C0"><b>
				<font face="Arial" style="font-size: 11pt">
				FUNCIONÁRIO</font></b></td>
				<td width="426" bgcolor="#C0C0C0"><b>
				<font face="Arial" style="font-size: 11pt">
				ITEM</font></b></td>
				<td width="259" bgcolor="#C0C0C0"><b>
				<font face="Arial" style="font-size: 11pt">
				DATA DO EMPRÉSTIMO</font></b></td>
				<td width="246" bgcolor="#C0C0C0"><b>
				<font face="Arial" style="font-size: 11pt">
				DATA PREVISTA</font></b></td>


				<td width="246" bgcolor="#C0C0C0"><b>
				<font style="font-size: 11pt" face="Arial">DATA DEVOLUÇÃO</font></b></td>


			</tr>
			
			<?php
			//Listando os dados da tabela
			include("dados.php");
						 
			

			$sql = "SELECT * FROM emprestimo where datadevolucao is null order by idcodigo desc ";


			$sql = "SELECT * FROM emprestimo where datadevolucao is null order by idcodigo desc ";
			//Montando string de consulta
			$sql = "SELECT * FROM emprestimo where 1=1 ";

			if($codfun!="")
			{
				//Buscando o id do funcionário
				$sql4 = "SELECT * FROM funcionarios where matricula = " .  $codfun;
				if($result4 = mysqli_query($conn, $sql4))
   				   if(mysqli_num_rows($result4) > 0)
   				 	 if($row4 = mysqli_fetch_array($result4))
						$sql = $sql . " and  id_func=" . $row4['idcodigo'];

				
			}


			if($codfer!="")
			{
	
				$sql = $sql . " and  id_item=" . $codfer;
			}

			if($dataemp!="")
			{
	                    $sql = $sql . " and  DATE_FORMAT(dataemprestimo,'%Y-%m-%d' ) = '" . inverteData($dataemp)  . "'" ;

			}

			if($datadev!="")
			{
				$sql = $sql . " and  DATE_FORMAT(datadevolucao,'%Y-%m-%d' ) = '" . inverteData($datadev)  . "'" ;

			}

			if($situacao!="")
			{
	                        if($situacao=="emprestado")
 				   $sql = $sql . " and  datadevolucao is null " ;
				if($situacao=="devolvidos")
				   $sql = $sql . " and  datadevolucao is not null " ;

			}	
	
			$sql = $sql . " order by dataprevistadevolucao desc";
		
			if($result1 = mysqli_query($conn, $sql)){
   				 if(mysqli_num_rows($result1) > 0)
   				 {
   				 	 while($row2 = mysqli_fetch_array($result1))
   				 	 {
						$cor = "";
						$datahoje = date('Y-m-d');
					        if ($row2['datadevolucao'] != "") 
						   $cor = "#00ff00";

						if (  ($row2['datadevolucao'] == "") && ($row2['dataprevistadevolucao'] < $datahoje) )
						   $cor = "#ff0000";

						?>
						<tr>
							
					
							<td width="488" bgcolor="<?php echo $cor;?>"><font face="Arial"><?php 


							$sql = "SELECT * from funcionarios where idcodigo =" .$row2['id_func'] ;

							if($result2 = mysqli_query($conn, $sql))

 							if(mysqli_num_rows($result2) > 0)

 							   if($row3 = mysqli_fetch_array($result2))
  							 	echo $row3['nome'];	
		 	 	
							?></font></td>
							<td width="426" bgcolor="<?php echo $cor;?>"><font face="Arial"><?php 


							$sql = "SELECT * from item_ferramenta where idcodigo =" .$row2['id_item'] ;

							if($result3 = mysqli_query($conn, $sql))

 							if(mysqli_num_rows($result3) > 0)

   							 if($row4 = mysqli_fetch_array($result3))
   								echo $row4['idcodigo'];	
		 	 	
							?> - <?php 


							$sql = "SELECT * from item_ferramenta where idcodigo =" .$row2['id_item'] ;

							if($result3 = mysqli_query($conn, $sql))

 							if(mysqli_num_rows($result3) > 0)

   							 if($row4 = mysqli_fetch_array($result3))
   								echo $row4['descricao'];	
		 	 	
							?></font></td>
							<td width="259" bgcolor="<?php echo $cor;?>"><font face="Arial"><?php echo invertedata2($row2['dataemprestimo'])?></font></td>
							<td width="246" bgcolor="<?php echo $cor;?>"><font face="Arial"><?php echo invertedata($row2['dataprevistadevolucao'])?></font></td>
							<td width="246" bgcolor="<?php echo $cor;?>"><font face="Arial"><?php echo invertedata2($row2['datadevolucao'])?></font></td>
						</tr>
			<?php
					}
					
					// Free result set
					mysqli_free_result($result1);
        			mysqli_free_result($result2);
					mysqli_free_result($result3);
        			// Close connection
					mysqli_close($conn);
					
			}
			}
		
			?>
			
		</table>
		<p>&nbsp;</div>
	<p>&nbsp;</p>
</form>
<p>&nbsp;</p>

</body>

</html>