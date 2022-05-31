<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Código Item</title>
</head>

<body>

<p>&nbsp;</p>
<form method="POST" action="emprestimos_ok%202201.php" webbot-action="--WEBBOT-SELF--">
<div align="center">
		<table border="0" width="90%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="461"><b><font face="Arial" style="font-size: 11pt">
				FUNCIONÁRIO</font></b></td>
				<td width="389"><b><font face="Arial" style="font-size: 11pt">
				DATA EMPRÉSTIMO</font></b></td>
				<td width="361"><b><font face="Arial" style="font-size: 11pt">
				DATA DEVOLUÇÃO</font></b></td>
				<td><b><font face="Arial" style="font-size: 11pt">SITUAÇÃO</font></b></td>
			</tr>
			<tr>
				<td width="461"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="T1" size="17" style="font-weight: 700"></span></font></td>
				<td width="389"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="T2" size="17" style="font-weight: 700"></span></font></td>
				<td width="361"><font face="Arial">
				<span style="font-size: 11pt">
				<input name="T3" size="17" style="font-weight: 700"></span></font></td>
				<td><font face="Arial"><span style="font-size: 11pt">
				<input type="radio" value="V1" checked name="R1" style="font-weight: 700"></span><b><span style="font-size: 11pt">Emprestados
				</span></b><span style="font-size: 11pt">
				<input type="radio" name="R1" value="V2" style="font-weight: 700"></span><b><span style="font-size: 11pt">Devolvidos&nbsp;
				</span></b><span style="font-size: 11pt">
				<input type="radio" name="R1" value="V3" style="font-weight: 700"></span><b><span style="font-size: 11pt">Todos</span></b></font></td>
			</tr>
			<tr>
				<td width="461">&nbsp;</td>
				<td width="389">&nbsp;</td>
				<td width="361">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="461"><font face="Arial">
				<span style="font-size: 11pt">
				<input type="button" value="Filtrar" name="B1" style="font-weight: 700"></span><b><span style="font-size: 11pt">&nbsp;
				</span></b><span style="font-size: 11pt">
				<input type="button" value="Remover Filtro" name="B2" style="font-weight: 700"></span></font></td>
				<td width="389">&nbsp;</td>
				<td width="361">&nbsp;</td>
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


			</tr>
			
			<?php
			//Listando os dados da tabela
			include("dados.php");
						 
			

			$sql = "SELECT * FROM emprestimo where datadevolucao is null order by dataprevistadevolucao ";
			
			if($result1 = mysqli_query($conn, $sql)){
   				 if(mysqli_num_rows($result1) > 0)
   				 {
   				 	 while($row2 = mysqli_fetch_array($result1))
   				 	 {
						$cor = "";
						$datahoje = date('Y-m-d');
					 if ($row2['dataprevistadevolucao'] < $datahoje) 
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