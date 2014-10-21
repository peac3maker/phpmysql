<?php 
$database='Todo';
$user='todouser';
$password='test123';
$dsn="mysql:host=localhost;dbname=$database"; // mysql
try {
$pdo = new PDO($dsn,$user,$password); // mysql
} catch(PDOException $e) {
die ('Oops'); // Exit, displaying an error message
}

function createToDo($text, $pdo){
	$sql='INSERT INTO todo(text) VALUES(?)';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($text));
}

function loadToDo($id,$pdo){
	$sql='select id, text, date, done from todo where id=?';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($id));
	if($row=$pds->fetch()) {
	return $row;
	}
}

function loadToDosTr($done,$pdo){
	$sql='select id, text, date, done from todo where done=?';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($done));	
	$rows=$pds->fetchAll();
	return $rows;
}

function updateToDoDone($id, $done, $pdo){
	$sql='update todo set done = ? where id=?';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($done,$id));	
}

function updateToDo($id, $text, $pdo){
	$sql='update todo set text = ? where id=?';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($text,$id));	
}

function deleteToDo($id, $pdo){
	$sql='delete from todo where id=?';
	$pds=$pdo->prepare($sql);
	$pds->execute(array($id));	
}

?>