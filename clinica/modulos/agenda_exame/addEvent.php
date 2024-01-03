<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['exame']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['cliente'])){
	
	$exame = $_POST['exame'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$cliente = $_POST['cliente'];

	$sql = "INSERT INTO agenda_exame(exame, start, end, cliente) values ('$exame', '$start', '$end', '$cliente')";
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
