<?php
include('settings.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	updateToDoDone($id, false, $pdo);
	header('Location: index.php');
}
?>