<?php
require_once('secureAccess.php');
require_once('dao/daoUsers.php');


function getUserById($id) {
	return getUserById_DAO($id)[0];
}

function getUsers() {
	return getUsers_DAO();
}

function userSearch($textToSearch) {
	return userSearch_DAO($textToSearch);
}

function prestamoList($textToSearch) {
	return prestamoList_DAO($textToSearch);
}
function getPrestamoById($id) {
	return getPrestamoById_DAO($id)[0];
}
?>
