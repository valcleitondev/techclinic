<?php 
	include("../conexao/conexao.php");
	$usuario =$_POST['usuario'];
	$senha =$_POST['senha'];

	if (!empty($usuario) OR !empty($senha)) {
		$login = $conexao  ->prepare("SELECT * from funcionario where usuario = :usuario and senha = :senha");
		$login->bindValue(":usuario" ,$usuario);
		$login->bindValue(":senha" ,$senha);
		$login->execute();

		$verific=$login->rowCount();
		$dados=$login->fetch(PDO::FETCH_OBJ);
		if ($verific) {
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			$_SESSION['acesso'] = $dados ->acesso;
			if ($dados->usuario === $usuario and $dados->senha === $senha) {
				if ($dados->acesso == "0") {
				$_SESSION['id'] = $dados ->id;
				header("location: ../../?pg=dashboard&mod=dashboard");	
				}
				if ($dados->acesso == "1") {
				$_SESSION['id'] = $dados ->id;
				header("location: ../../?pg=dashboard&mod=dashboard");
				}
				if ($dados->acesso == "2") {
				$_SESSION['id'] = $dados ->id;
				header("location: ../../?pg=dashboard&mod=dashboard");
				}
				else{
					echo "<script>alert('Usuário ou senha incorretos.');window.location='login.php'</script>";
				}
			}
			else{
				echo "<script>alert('Usuário ou senha incorretos.');window.location='login.php'</script>";
			}

		}else{
			echo "<script>alert('Usuário ou senha incorretos.');window.location='login.php'</script>"; 
		}
	}else{
		header("location: login.php");
	}

?>