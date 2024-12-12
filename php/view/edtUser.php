<?php
$list=getUserById($_REQUEST ['id']) ;
$user = $list['user'];
$name = $list['name'];
?>
<form action="managers/userManager.php" method="post">
	<input type="hidden" name="op" value="edt">
	<input type="hidden" name="mail" value="<?php echo $user?>">
	<input type="email" name="newmail" value="<?php echo $user?>" required>
    <input type="text" name="name" value="<?php echo $name?>" required>
	<input type="submit" value="Entrar">
</form>