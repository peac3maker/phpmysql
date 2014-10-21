<!DOCTYPE html>
<?php
include('settings.php');
?>
<html>
<head>
	<title>Todos</title>
	<meta charset="utf-8" />	
</head>
<body>
<div>
<p>
Todos
</p>	
	<table>
<tr>
	<th>todo</th>
	<th>done</th>
	<th>edit</th>
	<th>delete</th>
</tr>
		<?php 
		foreach(loadToDosTr(false,$pdo) as $todo){
		echo '<tr><td>'.$todo['text'].'</td>
		<td><a href="./done.php?id='.$todo['id'].'">done</a></td>
		<td><a href="./edit.php?id='.$todo['id'].'">edit</a></td>
		<td><a href="./delete.php?id='.$todo['id'].'">delete</a></td>';
		}
		?>	
		</table>
	
<p>
Done
</p>
	<table>
<tr>
	<th>todo</th>
	<th>done</th>
	<th>edit</th>
	<th>delete</th>
</tr>
		<?php 
		foreach(loadToDosTr(true,$pdo) as $todo){
		echo '<tr><td>'.$todo['text'].'</td>
		<td><a href="./undone.php?id='.$todo['id'].'">undo</a></td>
		<td><a href="./edit.php?id='.$todo['id'].'">edit</a></td>
		<td><a href="./delete.php?id='.$todo['id'].'">delete</a></td>';
		}
		?>	
		</table>
	<a href="./create.php">Create a new Entry</a>
</div>
</body>	