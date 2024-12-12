<?php
	require_once('services/secureAdmView.php');
	include('view/messages.php');
	require_once('services/users.php');

	$user = getUser();
	$newUser = $_SERVER['PHP_SELF'].'?op=new';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<a href="<?php echo $newUser; ?>">Crear usuario</a><br>
<a href="admin.php?op=mng">Gestión de usuarios</a><br>
<a href="admin.php?op=cpre">Crear prestamo</a><br>
<a href="admin.php?op=spre">Listar prestamo</a><br>
<a href="managers/loginManager.php">Cerrar sesión</a><br>
<br>
<?php
	/*
	$list = getUsers();
	foreach ($list as $item) {
		print_r($item);
		echo "<br>\n";
	}
	*/
	if($_GET['op']==='new') include('view/newUser.php');	
	if($_REQUEST['op']==='mng') include('view/mngUser.php');	
	if($_REQUEST['op']==='edt') include('view/edtUser.php');
	if($_REQUEST['op']==='cpre') include('view/createPrestamo.php');
	if($_REQUEST['op']==='spre') include('view/searchPrestamo.php');
	if($_REQUEST['op']==='lpre') include('view/listaPrestamo.php');
	if($_REQUEST['op']==='epre') include('view/editPrestamo.php');
	getMessage();
?>	
</body>
</html>