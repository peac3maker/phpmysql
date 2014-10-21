<?php
include('settings.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	updateToDoDone($id, true, $pdo);
	header('Location: index.php');
}
?>