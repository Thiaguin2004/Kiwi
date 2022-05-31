<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>CÃ³digo Item</title>
</head>

<body>

<p align="center"><b><font face="Arial">ITENS PARA SEREM AFERIDOS</font></b></p>
<form method="POST" action="afericao.php" webbot-action="--WEBBOT-SELF--">
	<!--webbot bot="SaveResults" U-File="C:\@AGN\GIOVANIHT\ferramentas\_private\form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" startspan --><strong>[Componente Salvar resultados do FrontPage]</strong><!--webbot bot="SaveResults" i-checksum="51132" endspan -->
	<p>&nbsp;</p>
	<div align="center">
		<table border="0" width="80%" cellpadding="3" bgcolor="#E9E9E9">
			<tr>
				<td bgcolor="#C0C0C0" width="154">&nbsp;</td>
				<td width="294" bgcolor="#C0C0C0"><b><font face="Arial">CÓDIGO DO ITEM</font></b></td>
				<td width="389" bgcolor="#C0C0C0"><b><font face="Arial">
				DESCRIÇÃO</font></b></td>
				<td width="203" bgcolor="#C0C0C0"><b><font face="Arial">
				DATA DA AFERIÇÃO</font></b></td>
				<td width="216" bgcolor="#C0C0C0"><b><font face="Arial">
				INTERVALO DA AFERIÇÃO</font></b></td>


			</tr>

			<?php
			//Listando os dados da tabela
			include("dados.php");
			
						 
			$sql = "SELECT * FROM item_ferramenta WHERE date_add(dataafericao, INTERVAL intervalo DAY) <= curdate()";
			
			if($result2 = mysqli_query($conn, $sql)){
   				 if(mysqli_num_rows($result2) > 0)
   				 {
   				 	 while($row2 = mysqli_fetch_array($result2))
   				 	 {

						?>
						<tr>
							<td width="154">
							
							<b><font face="Arial" color="#FF0000">Enviar agora</font></b></td>
							<td width="294"><font face="Arial"><?php echo $row2['idcodigo']?></font></td>
							<td width="389"><font face="Arial"><?php echo $row2['descricao']?></font></td>
							<td width="203"><font face="Arial"><?php echo inverteData($row2['dataafericao'])?></font></td>
							<td width="216"><font face="Arial"><?php echo $row2['intervalo']?></font></td>
						</tr>
			<?php
					}
					
					// Free result set
					
        			mysqli_free_result($result2);
        			// Close connection
					mysqli_close($conn);
					
				}
			}

			?>
			
		</table>
	</div>
	<p>&nbsp;</p>
	
	<p>&nbsp;</p>
</form>
<p>&nbsp;</p>

</body>

</html>
