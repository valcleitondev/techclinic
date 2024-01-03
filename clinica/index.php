<?php
    include('modulos/login/verifica.php');
    include('modulos/conexao/conexao.php');
    $acao = isset($_REQUEST['acao'])? $_REQUEST ['acao']: null;
    $pg = isset($_REQUEST['pg'])?$_REQUEST['pg']:'Dashboard';
    $mod = isset($_REQUEST['mod'])?$_REQUEST['pg']:'Sistema';
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>TechClinic</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="Backup/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="Backup/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="Backup/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="Backup/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="Backup/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="Backup/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="Backup/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="Backup/assets/vendor/modernizr/modernizr.js"></script>
		<link rel="apple-touch-icon" sizes="76x76" href="Backup/assets/img/apple-icon.png">
		<link rel="icon" sizes="96x96" href="modulos/img/logo.png">
		<script src="Bakup/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="modulos/funcao/funcao_cep.js"></script>

	</head>
	<body>
		<section class="body">
			<header class="page-header">
				<h2></h2>
			</header>

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="?mod=dashboard&pg=dashboard" class="logo"><img src="modulos/img/logo2.png" height="35" alt="Porto Admin" /></a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<div class="navbar-btn navbar-btn-right">
							<a class="btn btn-danger update-pro" href="modulos/login/logout.php" title="Logout" ><i class="fa fa-sign-out"></i><span> Logout</span></a>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navegação
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
					<?php 
			         	if ($_SESSION['acesso'] == 0) {
			        ?>
							<div class="nano">
								<div class="nano-content">
									<nav id="menu" class="nav-main" role="navigation">
										<ul class="nav nav-main">
											<li>
												<a href="?mod=dashboard&pg=dashboard">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Clientes</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=cliente&mod=cliente&acao=cadastrar">Cadastrar Cliente</a>
													</li>
													<li>
														<a href="?pg=cliente&mod=cliente">Lista de Clientes</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-group" aria-hidden="true"></i>
													<span>Funcionários</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=funcionario&mod=funcionario&acao=cadastrar_f">Cadastrar Funcionário</a>
													</li>
													<li>
														<a href="?pg=funcionario&mod=funcionario">Lista de Funcionários</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-user-md" aria-hidden="true"></i>
													<span>Consultas</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=consulta&mod=consulta&acao=cadastrar">Cadastrar Consulta</a>
													</li>
													<li>
														<a href="?pg=consulta&mod=consulta&acao=listar">Lista de Consultas</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-stethoscope" aria-hidden="true"></i>
													<span>Exames</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=exame&mod=exame&acao=cadastrar">Cadastrar Exame</a>
													</li>
													<li>
														<a href="?pg=exame&mod=exame&acao=listar">Lista de Exames</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-calendar" aria-hidden="true"></i>
													<span>Agendas</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=agenda&mod=agenda">Agenda/Consulta</a>
													</li>
													<li>
														<a href="?pg=agenda_exame&mod=agenda_exame">Agenda/Exame</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-money" aria-hidden="true"></i>
													<span>Caixa</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=caixa&mod=caixa&acao=pg_consulta">Pagamento/Consulta</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=pg_exame">Pagamento/Exame</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=reforcar">Reforçar caixa</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=retirar">Retirar do caixa</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=saldo">Saldo do caixa</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-bar-chart-o" aria-hidden="true"></i>
													<span>Finanças</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=caixa&mod=caixa">Receitas</a>
													</li>
													<li>
														<a href="?pg=financeiro&mod=financeiro">Despesas</a>
													</li>
													<li>
														<a href="?pg=financeiro&mod=financeiro&acao=despesas">Lançar Despesa</a>
													</li>
													<li>
														<a href="?pg=financeiro&mod=financeiro&acao=buscar">Lançar Salário</a>
													</li>
												</ul>
											</li> 
										</ul>
									</nav>
								</div>
							</div>
					<?php 
          				}else if ($_SESSION['acesso'] == 1) {
        			?>	
        					<div class="nano">
								<div class="nano-content">
									<nav id="menu" class="nav-main" role="navigation">
										<ul class="nav nav-main">
											<li>
												<a href="?mod=dashboard&pg=dashboard">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="?pg=cliente&mod=cliente&acao=lc_medico">
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Lista de Clientes</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
					<?php 
				         }else{
				    ?>
				    		<div class="nano">
								<div class="nano-content">
									<nav id="menu" class="nav-main" role="navigation">
										<ul class="nav nav-main">
											<li>
												<a href="?mod=dashboard&pg=dashboard">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Clientes</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=cliente&mod=cliente&acao=cadastrar">Cadastrar Cliente</a>
													</li>
													<li>
														<a href="?pg=cliente&mod=cliente">Lista de Clientes</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-calendar" aria-hidden="true"></i>
													<span>Agendas</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=agenda&mod=agenda">Agenda/Consulta</a>
													</li>
													<li>
														<a href="?pg=agenda_exame&mod=agenda_exame">Agenda/Exame</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-money" aria-hidden="true"></i>
													<span>Caixa</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=caixa&mod=caixa&acao=pg_consulta">Pagamento/Consulta</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=pg_exame">Pagamento/Exame</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=reforcar">Reforçar caixa</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=retirar">Retirar do caixa</a>
													</li>
													<li>
														<a href="?pg=caixa&mod=caixa&acao=saldo">Saldo do caixa</a>
													</li>
												</ul>
											</li>
											<li class="nav-parent">
												<a>
													<i class="fa fa-bar-chart-o" aria-hidden="true"></i>
													<span>Finanças</span>
												</a>
												<ul class="nav nav-children">
													<li>
														<a href="?pg=caixa&mod=caixa">Receitas</a>
													</li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
							</div>
					<?php 
				        }
				    ?>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">

					<!-- start: page -->
					<?php
			            if (file_exists("modulos/$mod/$pg.php")) {
			              include("modulos/$mod/$pg.php");
			            }elseif ($pg == 'Dashboard' AND $mod == 'Sistema') {
			              include("modulos/dashboard/dashboard.php");
			            }else{
			              include("modulos/sistema/404.php");
			            }
			        ?>
					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<?php if($pg and $mod != "agenda" and $pg and $mod != "agenda_exame"){ ?>
		<script src="Backup/assets/vendor/jquery/jquery.min.js"></script>
		<?php } ?>
		<script src="Backup/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="Backup/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="Backup/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="Backup/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="Backup/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="Backup/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="Backup/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="Backup/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="Backup/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="Backup/assets/javascripts/theme.init.js"></script>

	</body>
</html>