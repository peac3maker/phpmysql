<!DOCTYPE html>
<?php
include('settings.php');
if(isset($_POST['text'])){	
	$text = $_POST['text'];
	createToDo($text,$pdo);	
	echo' successfully created todo';
}
?>
<html>
<head>
	<title>Todo</title>
	<meta charset="utf-8" />
</head>
<body>
<div>
<form action="create.php" method="POST">
	<p class="text">
		<label for="name">Text</label>
		<textarea name="text" id="text" required></textarea>
		
	</p>
	
	<input type="submit" value="Create" />
</form>
<a href="./index.php">Back to index</a>
</div>
</body>	