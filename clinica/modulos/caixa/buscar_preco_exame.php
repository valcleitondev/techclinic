<?php
include("../conexao/conexao.php");
	$id = $_GET['id'];
	if(!empty($id)){
		$select = $conexao->prepare("SELECT preco FROM exame WHERE id = :id");
		$select->bindValue(":id", $id);
		$select->execute();
		$exame = $select->fetch(PDO::FETCH_ASSOC);
		echo $exame['preco'];
	}
?>