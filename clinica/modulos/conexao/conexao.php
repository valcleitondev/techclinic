<?php
	try{
		$conexao = new PDO('mysql:host=localhost;dbname=clinica','root','');
	}catch(exception $e){
		echo "erro";
	}
?>