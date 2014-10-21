<!DOCTYPE html>
<?php
include('settings.php');
if(isset($_POST['id'])){	
	$id = $_POST['id'];	
	deleteToDo($id, $pdo);	
}
?>
<html>
<head>
	<title>Todos</title>
	<meta charset="utf-8" />
</head>
<body>
<div>
	<form action="delete.php" method="POST">
		<?php 
		if(isset($_GET['id'])){
		$id = $_GET['id'];
		echo 'Are you sure you want to delete the todo with id: '.$id.' ?
		<input type="hidden" name="id" value="'.$id.'" />
		<input type="submit" value="Delete" />';
		}
		?>
	</form>
	<a href="./index.php">Back to index</a>
</div>
</body>	