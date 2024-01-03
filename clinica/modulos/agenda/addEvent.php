<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['consulta']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['cliente'])){
	
	$consulta = $_POST['consulta'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$cliente = $_POST['cliente'];

	$sql = "INSERT INTO events(consulta, start, end, cliente) values ('$consulta', '$start', '$end', '$cliente')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
