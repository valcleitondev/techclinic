<?php
include("../conexao/conexao.php");
	$id = $_GET['id'];
	if(!empty($id)){
		$select = $conexao->prepare("SELECT preco FROM consulta WHERE id = :id");
		$select->bindValue(":id", $id);
		$select->execute();
		$consulta = $select->fetch(PDO::FETCH_ASSOC);
		echo $consulta['preco'];
	}
?>