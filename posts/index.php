<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
    <meta charset="utf-8" />
	<style>
	 td{
		border: 1px solid;
	 }
	</style>
  </head>
  <body>

	<div class="container">
	<h1>Posts</h1>       


<?php

//laden config db und model
require 'config.php';
require 'db.php';
require 'post.php';



$tableGateway = new PostTableGateway;

foreach ($tableGateway->findAll() as $post) {
	$tableGateway->delete($post);
}


$post1 = new Post;
$post1->setCreated("2014-10-27");
$post1->setTitle("Eintrag 1 mit tableGateway.");
$post1->setContent("Inhalt Eintrag 1.");
                
$post2 = new Post;
$post2->setCreated("2014-10-28");
$post2->setTitle("Eintrag 2 mit tableGateway.");
$post2->setContent("Inhalt Eintrag 2.");
                
$post3 = new Post;
$post3->setCreated("2014-10-29");
$post3->setTitle("Eintrag 3 mit tableGateway.");
$post3->setContent("Inhalt Eintrag 3.");



$tableGateway->create($post1);
$tableGateway->create($post2);
$tableGateway->create($post3);

echo '<p>Vorhandene Db Einträge </p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
foreach ($tableGateway->findAll() as $post) {
	echo '<tr>';
	echo '<td>'.$post->getCreated().'</td>';
	echo '<td>'.$post->getTitle().'</td>';
	echo '<td>'.$post->getContent().'</td>';
	echo '</tr>';
}
echo '</table>';




# get by attribute
echo '<p>Eintrag mit created = 2014-10-27: </p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
foreach ($tableGateway->findByAttribute('created', '2014-10-27') as $post) {
	echo '<tr>';
	echo '<td>'.$post->getCreated().'</td>';
	echo '<td>'.$post->getTitle().'</td>';
	echo '<td>'.$post->getContent().'</td>';
	echo '</tr>';
}
echo '</table>';

# get by id
echo '<p>Eintrag mit id = '.$post2->getId().'</p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
$post = $tableGateway->findById($post2->getId());
echo '<tr>';
echo '<td>'.$post->getCreated().'</td>';
echo '<td>'.$post->getTitle().'</td>';
echo '<td>'.$post->getContent().'</td>';
echo '</tr>';
echo '</table>';

# update found entry
echo '<p>Eintrag mit id = '.$post->getId().' updaten</p>';
$post->setContent("updated content.");
$tableGateway->update($post);

# get by id
echo '<p>Eintrag mit id = '.$post->getId().'</p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
$post = $tableGateway->findById($post->getId());
echo '<tr>';
echo '<td>'.$post->getCreated().'</td>';
echo '<td>'.$post->getTitle().'</td>';
echo '<td>'.$post->getContent().'</td>';
echo '</tr>';
echo '</table>';



echo '<h1>RowGateway</h1>';

$post1 = new Post;
$post1->setCreated("2014-10-27");
$post1->setTitle("Eintrag 1 mmit row gateway.");
$post1->setContent("Inhalt Eintrag 1.");

$post2 = new Post;
$post2->setCreated("2014-10-28");
$post2->setTitle("Eintrag 2 mit row gateway.");
$post2->setContent("Inhalt Eintrag 2.");

$post3 = new Post;
$post3->setCreated("2014-10-29");
$post3->setTitle("Eintrag 3 mit row gateway.");
$post3->setContent("Inhalt Eintrag 3.");

$post1->create();
$post2->create();
$post3->create();

# print all rows
echo '<p>Einträge inder Datenbank: </p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
foreach ($tableGateway->findAll() as $post) {
	echo '<tr>';
	echo '<td>'.$post->getCreated().'</td>';
	echo '<td>'.$post->getTitle().'</td>';
	echo '<td>'.$post->getContent().'</td>';
	echo '</tr>';
}
echo '</table>';

# get by id
echo '<p>Eintrag mimt id = '.$post2->getId().'</p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
$post = new Post;
$post->findById($post2->getId());
echo '<tr>';
echo '<td>'.$post->getCreated().'</td>';
echo '<td>'.$post->getTitle().'</td>';
echo '<td>'.$post->getContent().'</td>';
echo '</tr>';
echo '</table>';

# update found entry
echo '<p>Eintrag mit id = '.$post->getId().' updaten</p>';
$post->setContent("Neuer Inhalt.");
$post->update();

# get by id
echo '<p>Eintrag mit id = '.$post2->getId().'</p>';
echo '<table>';
echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
$post = new Post;
$post->findById($post2->getId());
echo '<tr>';
echo '<td>'.$post->getCreated().'</td>';
echo '<td>'.$post->getTitle().'</td>';
echo '<td>'.$post->getContent().'</td>';
echo '</tr>';
echo '</table>';



?>




 
    </div>         
  </body>
</html>