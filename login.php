<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login - Bom Caminho</title>

		<meta name="description" content="Pagina de login" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="space-20"></div>
							<div class="row-fluid">
								<div class="center">
									<h3 class="white">Assistência Social Bom Caminho</h3>
									<h6 class="blue">&copy; Grupo de Assistência Social Bom Caminho</h6>
								</div>
							</div>
							<div class="space-6"></div>
							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													Insira suas credenciais
													<?php 
														if (isset($_GET['error'])) {
															echo '<br><h6 class="red">Login ou senha incorretos!</h6>';
														}
														if (isset($_GET['bloqueio'])) {
															echo '<br>Conta bloqueada!';
														}
														if (isset($_GET['afilhado'])) {
															echo '<br>Infelizmente você não pode fazer login no momento, espere até que o afilhamento esteja habilitado!';
														}
														if (isset($_GET['nlogin'])) {
															echo '<br>Você deve fazer o login para acessar esta página!';
														}
														if (isset($_GET['login'])) {
															echo '<br>Obrigador por acessar nosso site volte sempre!';
														}
													?>
												</h4>
                                            
												<div class="space-6"></div>
												<form method="post" action="logar.php">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="email" name="email" id="email">
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="password" name="password" id="password">
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">

															<button class="width-35 pull-right btn btn-small btn-primary" type="submit">
																<i class="icon-key"></i>
																Login
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
												<div>
													<br>
												</div>
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Recuperar Senha
												</h4>

												<div class="space-6"></div>
												<p>
													Insira seu email para receber instruções de recuperação
												</p>

												<form method="post" action="n_pass.php">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" name="email" id="email">
																<i class="icon-envelope"></i>
															</span>
														</label>

														<div class="clearfix">
															<button class="width-35 pull-right btn btn-small btn-danger">
																<i class="icon-lightbulb"></i>
																Enviar!
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Voltar para a area de login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
	</body>
</html>
