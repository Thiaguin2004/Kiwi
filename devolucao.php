<?php
//Listando os dados da tabela
include("dados.php");

$campofoco="";
if (isset($_GET['campofoco']) )
  $campofoco=$_GET['campofoco'];
else
  $campofoco= "item";

			
?>
			
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>

<body>

<script language="javascript">


function ferramenta(t)
{

   codigo = t.value;
   chamada = "index2.php?prog=devolucao.php&itemferr=" + codigo + "&campofoco=matricula";
   window.location.href =chamada;
   
   
}

function funcionario(t)
{
   codigo = t.value;
   codferr = document.form0.item.value
   
   chamada = "index2.php?prog=devolucao.php&codfunc=" + codigo +"&itemferr=" + codferr +"&campofoco=B1" ;
  
   window.location.href =chamada;

}

</script>

<?php

$nomefun="";
$nomefer="";
$codigofer="";
$codfunc="";

//Buscando o funcionario
if (isset($_GET['codfunc']) )
{
   //Buscando a ferramenta no banco
   $codfunc = $_GET['codfunc'];
   $sql = "SELECT * FROM funcionarios where matricula=" . $codfunc;

      
	if($result = mysqli_query($conn, $sql)){
   		if(mysqli_num_rows($result) > 0)
   		{
   			if($row = mysqli_fetch_array($result))
   				 	$nomefun = $row['nome'];

		}
	}

}



//Buscando a ferramenta
if (isset($_GET['itemferr']) )
{
   //Buscando a ferramenta no banco
   $codigofer = $_GET['itemferr'];
   $sql = "SELECT * FROM item_ferramenta where idcodigo=" . $codigofer;

   
	if($result = mysqli_query($conn, $sql)){
   		if(mysqli_num_rows($result) > 0)
   		{
   			if($row = mysqli_fetch_array($result))
   				 	$nomefer = $row['descricao'];

		}
	}

}


?>

<p align="center"><b><font face="Arial">DEVOLUÇÃO DE FERRAMENTAS</font></b></p>
<form method="GET" action="devolver_emprestimo.php" name="form0" id="form0">

	<p>&nbsp;</p>

	<div align="center">
		<table border="0" width="50%" cellspacing="0" cellpadding="4" bgcolor="#C0C0C0">
			
			<tr>
				<td width="293"><b><font face="Arial">FERRAMENTA</font></b></td>
				<td>
				<input onchange="javascript:ferramenta(this)" value="<?php echo $codigofer;?>" onkeypress="return somenteNumeros(event)" type="text" id="item" name="item" size="32" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
			
			<tr>
				<td width="293">&nbsp;</td>
				<td>
				<b><font face="Arial"><?php echo $nomefer;?></font></b></td>
			</tr>
			<tr>
				<td width="293"><b><font face="Arial">FUNCIONÁRIO</font></b></td>
				<td>
				<input type="text"  onchange="javascript:funcionario(this)" value="<?php echo $codfunc;?>" onkeypress="return somenteNumeros(event)" id="matricula" name="matricula" size="15" style="font-family: Arial; font-size: 18pt"></td>
			</tr>
			<tr>
				<td width="293">&nbsp;</td>
				<td>
				<b><font face="Arial"><?php echo $nomefun;?></font></b></td>
			</tr>
			
			<tr>
				<td width="293">&nbsp;</td>
				<td><input type="submit" value="DEVOLVER" id="B1" name="B1" <?php if( ($nomefer=="") || ($nomefun=="")) echo "DISABLED" ?> > <input type="reset" value="CANCELAR" name="B2"></td>
			</tr>
		</table>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</form>
<p>&nbsp;</p>

<script language="javascript">
document.getElementById("<?php echo $campofoco;?>").focus();
</script>


</body>

</html>
