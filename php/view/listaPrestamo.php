<form action="admin.php" method="post">
	<input type="hidden" name="op" value="lpre">
	<input type="text" name="textToSearch" size="50" required>
	<input type="submit" value="Buscar">
</form>
<pre>Resultados de la búsqueda</pre>
<table>
	<tbody>
		<tr><th>Usuario</th><th >Capital</th><th>Intereses</th><th>Meses</th><th>Cuota</th> <th colspan="2">Opciones</th>  </tr>
<?php
if(isset($_POST['textToSearch'])) {
	$list = prestamoList($_REQUEST['textToSearch']);
	foreach ($list as $item) {
        $id = $item['idloan'];
		$mail = $item['user'];
        $capital = $item['capital'];
        $interes = $item['interes'];
        $meses = $item['periodicity'];
        $cuota = ($capital*($interes/12/100)*pow(1+($interes/12/100),$meses))/(pow(1+($interes/12/100),$meses)-1);
        $cuota = number_format($cuota,2);
		$edtLink = "<a href='admin.php?op=epre&id=$id'>Editar</a>";
		$delLink = "<a href='managers/userManager.php?op=depre&id=$id' id='$id' onclick='confirmar(this.id)'>
		<img src='images/del-24.png' alt='Delete icon'></a>";
		echo "<tr><td>$mail</td><td>$capital</td><td>$interes</td><td>$meses</td><td>$cuota</td><td>$delLink $edtLink</td></tr>\n";
	}	
}
?>
</tbody>
</table>
<script type="text/javascript">
	function confirmar(id) {
		ok = confirm('Usuario: '+id+'\n¿Continuar con la eliminación?');
		if(!ok) event.preventDefault();
	}
</script>