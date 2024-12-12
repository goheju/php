<?php
$list=getPrestamoById($_REQUEST ['id']) ;
print_r($list);
$id = $list['idloan'];
$user = $list['user'];
$capital = $list['capital'];
$interes = $list['interes'];
$meses = $list['peridicity'];
?>
<form action="managers/userManager.php" method="post">
	<input type="hidden" name="op" value="epre">
	<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="email" name="mail" value="<?php echo $user?>" required>
    <input type="text" name="capital" value="<?php echo $capital?>" required>
    <input type="text" name="interes" value="<?php echo $capital?>" required>
    <input type="text" name="meses" value="<?php echo $capital?>" required>
	<input type="submit" value="Editar">
</form>