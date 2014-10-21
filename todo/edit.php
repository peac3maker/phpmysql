<!DOCTYPE html>
<?php
include('settings.php');
if(isset($_POST['text']) && isset($_POST['id'])){	
	$text = $_POST['text'];
	$id = $_POST['id'];
	updateToDo($id, $text,$pdo);	
echo' successfully edited todo';	
}
if(isset($_GET['id'])){		
	$id = $_GET['id'];
	$todo = loadToDo($id,$pdo);		
}
?>
<html>
<head>
	<title>Todo</title>
	<meta charset="utf-8" />
</head>
<body>
<div>
<form action="edit.php" method="POST">
	<?php
	if(isset($todo) && $todo != null){
	echo '<p class="text">
		<label for="name">Text</label>
		<textarea name="text" id="text" required>'.$todo['text'].'</textarea>			
	</p>
	
	<p class="text">
		<label for="name">done</label>
	<input type="checkbox" value="'.$todo['done'].'" enabled="false"></input>
	</p>
	<p class="text">
		<label for="name">date</label>
		<input type="date" value="'.$todo['date'].'"></input>
	</p>
	<input type="hidden" name="id" value="'.$todo['id'].'"></input>
	<input type="submit" value="Edit" />';
	}
	?>
</form>
<a href="./index.php">Back to index</a>
</div>
</body>	