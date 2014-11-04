<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">          
    <title>V. 08</title>
  </head>

  <body>
	<?php 
		require 'php/db_config.php';
		require 'classes/Lebewesen.php';
		require 'classes/Mensch.php';
		require 'classes/Schweizer.php';
		require 'classes/PostTableGateway.php';
		require 'classes/Post.php';
		
		echo '<h1>Aufgabe 3: Anweisungen ausführen</h1>';
		
		$mensch = new Mensch();
		echo '<p>Name von Mensch anzeigen: '.$mensch->getName().' </p>';
		$mensch->umbenennen('Chuck Norris');
		echo '<p>Ubenannter Mensch: '.$mensch->getName().' </p>';
		echo '<p>'.$mensch->getName().' Alter: '.$mensch->getAlter().' Jahre</p>';
		if ("Mensch" == get_class($mensch)) {
			echo '<p>'.$mensch->getName().' ist ein Mensch</p>';
		} else {
			echo '<p>'.$mensch->getName().' ist kein Mensch</p>';
		}
		echo '<p>Der Vorfahre von '.$mensch->getName().': '.$mensch->getVorfahre().'</p>';
		$mensch->neueEvolutionstheorie("Alien");	
		echo '<p>Der neue Vorfahre von '.$mensch->getName().': '.$mensch->getVorfahre().'</p>';
		
		$bankangestellter = new Schweizer();
		try {
			$bankangestellter->umbenennen("Ospel");
		} catch (Exception $e) {
			echo '<p>Exception abgefangen: ',  $e->getMessage(), "</p>";
		}
		
		echo '<h1>Aufgabe 4:</h1>';
				
		$tableGateway = new PostTableGateway;
				
		foreach ($tableGateway->findAll() as $post) {
			$tableGateway->delete($post);
		}
		
		$entry1 = new Post;
		$entry1->setCreated("2014-10-228");
		$entry1->setTitle("Eintrag eins mit RowdataGateway");
		$entry1->setContent("Inhalt für Eintrag 1.");
		
		$entry1->create();
		
		# print all rows
		echo '<p>Einträge in der Datenbank: </p>';
		echo '<table border="1">';
		echo '<tr><th>Created</th><th>Title</th><th>Content</th><th>Current Version</th></tr>';
		foreach ($tableGateway->findAll() as $post) {
			echo '<tr>';
			echo '<td>'.$post->getCreated().'</td>';
			echo '<td>'.$post->getTitle().'</td>';
			echo '<td>'.$post->getContent().'</td>';
			echo '<td>'.$post->getCurrentVersion().'</td>';
			echo '</tr>';
		}
		echo '</table>';
		
		
		$entry1_2 = new Post();
		$entry1_2->findById($entry1->getId());
				
		$entry1->setTitle("Neuer Titel");
		$entry1_2->setTitle("Richtiger Titel");
		
		$entry1->update();
		
		try {
			$entry1_2->update();
		} catch (Exception $e) {
			echo '<p>Fehler abgefangen: ',  $e->getMessage(), "</p>";
		}
		
		# print all rows
		echo '<p>Einträge in der Datenbank: </p>';
		echo '<table border="1">';
		echo '<tr><th>Created</th><th>Title</th><th>Content</th><th>Current Version</th></tr>';
		foreach ($tableGateway->findAll() as $post) {
			echo '<tr>';
			echo '<td>'.$post->getCreated().'</td>';
			echo '<td>'.$post->getTitle().'</td>';
			echo '<td>'.$post->getContent().'</td>';
			echo '<td>'.$post->getCurrentVersion().'</td>';
			echo '</tr>';
		}
		echo '</table>';
		
	?>
  </body>
</html>
