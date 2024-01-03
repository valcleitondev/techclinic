<?php
	include("../conexao/conexao.php");

	if (isset($_POST['usar_caixa'])) {
		$redirecionar = 1;
		$usar_caixa = $_POST['usar_caixa'];
		if($_POST['usar_caixa']){
			if($_POST['quitar']){
				//Usando dinheiro do caixa
				$despesa = 0;
				foreach($_POST['quitar'] as $checkSelecionado) {
					$deletar = $conexao->prepare("DELETE FROM despesas WHERE id = :id");
					$deletar->bindValue(":id", $checkSelecionado);

					$select = $conexao->prepare("SELECT valor FROM despesas WHERE id = :id");
					$select->bindValue(":id", $checkSelecionado);
					$select->execute();
					$valor = $select->fetch();

					$despesa += $valor['valor']; //Aqui´vai contabilizar o total da conta que tenho que pagar
				}
				
				// Buscar saldo atual do caixa, para ver se é possivel a ação
				$capturar = $conexao->prepare("SELECT saldo_final FROM caixa WHERE id = :id");
				$capturar->bindValue(":id",$_SESSION['last_id']);
				$capturar->execute();
				$valor_antigo = $capturar->fetch();

				if($despesa>$valor_antigo['saldo_final']){
					$_SESSION['mensagem']=0;//Saldo insuficiente
				}else{
					$deletar->execute();
					$_SESSION['mensagem'] = 1;//Mensagem de sucesso
					// Retirar o dinheiro do caixa
					$novo_valor = $valor_antigo['saldo_final']-$despesa;//Valor que tinha no caixa - Valor das despsas
					$editar = $conexao->prepare("UPDATE caixa SET saldo_final = :novo_saldo");
					$editar->bindValue(":novo_saldo",$novo_valor);
					$editar->execute();


					$inserir = $conexao->prepare("INSERT INTO fluxo_caixa (id, acao, receita_despesa, valor) VALUES (:id, :acao, :receita_despesa, :valor)");
					$inserir->bindValue(":id", $_SESSION['last_id']);
					$inserir->bindValue(":acao", 5);
					$inserir->bindValue(":receita_despesa", "-");
					$inserir->bindValue(":valor", $despesa);
					$inserir->execute();
				}
			}			
		}else if($usar_caixa==0){
			// Não usa dinheiro do caixa
			if($_POST['quitar']) {
				foreach($_POST['quitar'] as $checkSelecionado) {
					$deletar = $conexao->prepare("DELETE FROM despesas WHERE id = :id");
					$deletar->bindValue(":id", $checkSelecionado);
					$deletar->execute();
					$_SESSION['mensagem']=1;//mensagem de sucesso
				}
			}
		}
		header("location: financeiro.php");
	}else if(isset($_POST['apagar'])){
		$redirecionar = 1;
		foreach($_POST['quitar'] as $checkSelecionado) {
			$deletar = $conexao->prepare("DELETE FROM despesas WHERE id = :id");
			$deletar->bindValue(":id", $checkSelecionado);
			if($deletar->execute()){
				$_SESSION['mens'] = "Despesa deletada com sucesso.";
				$_SESSION['color'] = 1;
			}else{
				$_SESSION['mens'] = "A despesa não foi deletada, tente novamente.";
				$_SESSION['color'] = 0;
			}
		}
		header("location: financeiro.php");
	}else if(!isset($_POST['quitar']) OR !isset($_POST['usar_caixa'])){
		$_SESSION['mensagem'] = 2;//Não foi enviado nenhum valor
		if($redirecionar == 1 OR empty($redirecionar)){
			header("location: financeiro.php");
		}
	}
?>