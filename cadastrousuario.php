<?php

include("dados.php");

$idusuario	= "";
$cpf 	= "";
$usuario 	= "";
$senha 	= "";


if ( isset( $_GET['id'] )  )
{
	$sql = "SELECT * FROM usuarios where id=" .$_GET['id'] ;
	   if($result = mysqli_query($conn, $sql))
   		if(mysqli_num_rows($result) > 0)
   		   if($row = mysqli_fetch_array($result))
   		   {
			$idusuario  = $row['id'];
			$cpf 		= $row['cpf'];
			$usuario 	= $row['usuario'];
			$senha 		= $row['senha'];


		   }


}

if($descricao!="")
{
   $botao = "ALTERAR";
   $form = "alterar_usuario.php";
}
else
{
   $botao = "INCLUIR";
   $form = "incluir_usuario.php";
}

?>

<p>&nbsp;</p>
<form method="GET" action="<?php echo $form;?>">
	
	<p>&nbsp;</p>
	<div align="center">
		<table border="0" width="50%" cellspacing="0" cellpadding="4">
			
			<tr>
				<td ><b><font face="Arial">ID</font></b></td>
				<td>
				<input type="text" id="idusuario" <?php if ($idusuario!="") echo "readonly"; ?> value="<?php echo $idusuario; ?>" name="idusuario" size="13" onkeypress="return somenteNumeros(event)" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
		

			<tr>
				<td width="293"><b><font face="Arial">CPF</font></b></td>
				<td>
				<input type="text" name="cpf" value="<?php echo $cpf?>" size="11" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
			<tr>
				<td width="293"><b><font face="Arial">USUÁRIO</font></b></td>
				<td>
				<input type="text" id="usuario" value="<?php echo $usuario; ?>" size="25" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
			<tr>
				<td width="293"><b><font face="Arial">SENHA</font></b></td>
				<td>
				<input type="text" id="senha" name="senha" value="<?php echo $senha;?>" size="15" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
			<tr>
				<td width="293">&nbsp;</td>
				<td><input type="submit" value="incluir_usuario.php" name="B1"><input type="reset" value="Cancelar" name="B2"><p>
				&nbsp;</td>
			</tr>
		</table>
	</div>
	<div align="center">
		<table border="0" width="70%" cellpadding="3" bgcolor="#E9E9E9">
			<tr>
				<td bgcolor="#C0C0C0" > X </td>
				<td width="400" bgcolor="#C0C0C0"><b><font face="Arial">ID</font></b></td>
				<td width="558" bgcolor="#C0C0C0"><b><font face="Arial">
				CPF</font></b></td>
				<td width="558" bgcolor="#C0C0C0"><b><font face="Arial">
				USUÁRIO</font></b></td>
				<td width="558" bgcolor="#C0C0C0"><b><font face="Arial">
				SENHA</font></b></td>


			</tr>

			<?php
			//Listando os dados da tabela
			
			$sql = "SELECT * FROM usuarios";
			
			if($result = mysqli_query($conn, $sql)){
   				 if(mysqli_num_rows($result) > 0)
   				 {
   				 	 while($row = mysqli_fetch_array($result))
   				 	 {

						?>
						<tr>
							<td width="45"><b>
							<font face="Arial" color="#FF0000"> <a href="excluir_usuario.php?id=<?php echo $row['id']?>">X</a>
							</font></b></td>
							<td width="558"><font face="Arial"><?php echo $row['id']?></font></td>
							<td width="558"><font face="Arial"><?php echo $row['cpf']?></a></font></td>
							<td width="558"><font face="Arial"><?php echo $row['usuario']?></font></td>
							<td width="558"><font face="Arial"><?php echo $row['senha']?></font></td>
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
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</form>
<p>&nbsp;</p>

<script>
	/*document.getElementById("codigodoitem").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890".indexOf(chr) < 0)
           return false;
       };
	document.getElementById("intervalo").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890".indexOf(chr) < 0)
           return false;
       };
       */
       
</script>

</body>

</html>
