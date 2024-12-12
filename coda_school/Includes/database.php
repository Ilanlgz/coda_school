<?php
	$pdo = new PDO('mysql:host=localhost;dbname=coda_school','root');
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=coda_school','root');
	} catch (Exception $e) {
		$errors[] = "Erreur de connexion à la bdd {$e->getMessage()}";
	}
?>