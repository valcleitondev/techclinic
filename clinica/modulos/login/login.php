<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Login-TechClinic</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<link rel="shortcut icon" href="../img/logo.png"/>

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../../Backup/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../../Backup/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../../Backup/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../../Backup/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../../Backup/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../../Backup/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../../Backup/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../../Backup/assets/vendor/modernizr/modernizr.js"></script>
		<style type="text/css">
			body{
				background-image: url("../img/img8.jpg");
				background-color: #333;
			}
		</style>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="" class="logo pull-left">
					<img src="../img/logo2.png" height="70" alt="" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Entrar</h2>
					</div>
					<div class="panel-body" style="background-color: rgba(255, 255, 255, 0.7);">
						<form action="validacao.php" method="post">
							<div class="form-group mb-lg">
								<label>Usuário</label>
								<div class="input-group input-group-icon">
									<input name="usuario" type="text" class="form-control input-lg" placeholder="Usuário" required="Usuário" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Senha</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="senha" type="password" class="form-control input-lg" placeholder="Senha" required="Senha" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Lembre De Mim</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs" value="entrar" name="entrar">Entrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="../../Backup/assets/vendor/jquery/jquery.js"></script>
		<script src="../../Backup/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../../Backup/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../../Backup/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../../Backup/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../../Backup/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../../Backup/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../../Backup/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../../Backup/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../../Backup/assets/javascripts/theme.init.js"></script>

	</body>
</html>