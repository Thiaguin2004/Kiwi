<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Código Item</title>
</head>

<body>

<form method="GET" action="incluir_func.php">

	<p>&nbsp;</p>
	<div align="center">
		<table border="0" width="50%" cellpadding="3" bgcolor="#E9E9E9">
			<tr>
				
				<td width="558" bgcolor="#C0C0C0"><b><font face="Arial">
				NOME</font></b></td>
				<td width="358" bgcolor="#C0C0C0"><b><font face="Arial">
				MATRÍCULA</font></b></td>

			</tr>
			<?php
			//Listando os dados da tabela
			include("dados.php");
			
			$sql = "SELECT idcodigo,nome,matricula FROM funcionarios order by idcodigo";
			if($result = mysqli_query($conn, $sql)){
   				 if(mysqli_num_rows($result) > 0)
   				 {
   				 	 while($row = mysqli_fetch_array($result))
   				 	 {

						?>
						<tr>
							
							<td width="558"><font face="Arial"><?php echo $row['nome']?></font></td>
							<td width="558"><font face="Arial"><?php echo $row['matricula']?></font></td>
						</tr>
			<?php
					}
					
					// Free result set
        			mysqli_free_result($result);
        			// Close connection
					mysqli_close($conn);
					
				}
			}

			?>
			
		</table>
	</div>
	<p>&nbsp;</p>
</form>
<p>&nbsp;</p>

</body>

</html>