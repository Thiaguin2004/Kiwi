<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<title>EmprÃ©stimo/DevoluÃ§Ã£o</title>
</head>

<body>

<table border="0" width="100%" cellpadding="0" height="87">
	<tr>
		<td width="319" bgcolor="#006600">
		<p align="center"><b>
		<a style="text-decoration: none" href="index2.php?prog=emprestimo.php"><font face="Arial" color="#FFFFFF">
		Empréstimo</font></a></b></td>
		<td width="319" bgcolor="#006600">
		<p align="center"><b>
		<a style="text-decoration: none" href="index2.php?prog=devolucao.php"><font face="Arial" color="#FFFFFF">
		Devolução</font></a></b></td>
		<td>&nbsp;</td>
		<td width="267" align="center" bgcolor="#336699"><b>
		<a style="text-decoration: none" href="index2.php?prog=emprestimos.php">
		<font face="Arial" color="#FFFFFF">Relatórios</font></a></b></td>
		<td width="237" align="center" bgcolor="#336699"><b>
		<a href="index2.php?prog=afericao.php" style="text-decoration: none">
		<font face="Arial" color="#FFFFFF">Itens para aferição</font></a></b></td>
		<td width="226" align="center" bgcolor="#336699"><b>
		<a href="index2.php?prog=cadastrofunc.php" style="text-decoration: none">
		<font face="Arial" color="#FFFFFF">Cadastro funcionários</font></a></b></td>
		<td width="226" align="center" bgcolor="#336699"><b>
		<a href="index2.php?prog=cadastrousuario.php" style="text-decoration: none">
		<font face="Arial" color="#FFFFFF">Cadastro de usuários</font></a></b></td>
	</tr>
</table>
<p><b><font face="Arial">

<?php
if ($_GET['prog']!= "")
   include($_GET['prog']);


?>
</font></b></p>

</body>

</html>
