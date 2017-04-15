<?php
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	require_once 'business/dataAccessObject/DaoFamilia.php';
	require_once 'business/dataAccessObject/DaoDependente.php';
	require_once 'business/dataAccessObject/DaoUsuario.php';
	require_once 'business/dataAccessObject/DaoVisita.php';
	require_once 'business/dataAccessObject/DaoAluno.php';
	
	
	$session = new Session();
	$session->ValidaSessionUsuario();
?>

<html lang="pt">
	<head>
		<title>Visão Geral - Bom Caminho</title>
		<meta http-equiv="Content-Type" content="text/html: charset=utf-8" />

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<link href="css/StyleFrmCadUsuario.css" rel="stylesheet" />
	</head>
	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>.:: Grupo de Assistencia Social Bom Caminho ::.</small>
					</a><!--/.brand-->
				</div><!--/.container-fluid-->
				<div class="container-fluid">
					<p style="color: white;" align="right"><?php echo 'Seja Bem-vindo(a), '.$session->getValueSession('nomeDoUsuario') ?> </p>
				</div>
			</div><!--/.navbar-inner-->
		</div>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="sidebar" id="sidebar">
				<?php require 'menu.php';?>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="administracao.php">Home</a>
							<span class="divider">
								<i class="icon-double-angle-right"></i>
							</span>
						</li>
						<li>Visão Geral</li>
					</ul>
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Relatorio Basico
							<small>
								<i class="icon-double-angle-right"></i>
								Visão Geral
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<div class="span 12">
									<?php 
										if ($session->getValueSession('tipoDoUsuario') == 'Administrador') {
											$daoUsuario = new DaoUsuario();
											echo '
												<a class="btn btn-app radius-4"><i class="icon-user bigger-260"></i>Usuários<br>
													<strong class="black">'. $daoUsuario->size() .'</strong>
												</a>
											';											
										}
									?>
									<fieldset class="fieldset">
										<legend class="legend">Familia Assistida</legend>
										<a class="btn btn-app btn-danger radius-4"><i class="icon-group bigger-260"></i>Famílias<br>
											<strong class="black">
											<?php 
												$daoFamilia = new DaoFamilia();
												echo $daoFamilia->size();
											?>
											</strong>
										</a>
										<a class="btn btn-app btn-info radius-4"><i class="icon-user bigger-260"></i>Dependente<br>
											<strong class="black">
												<?php 
													$daoDependente = new DaoDependente();
													echo $daoDependente->size();
												?>
											</strong>
										</a>
										<a class="btn btn-app btn-warning radius-4"><i class="icon-home bigger-260"></i>Visitas<br>
											<strong class="black">
												<?php 
													$daoVista = new DaoVisita();
													echo $daoVista->size();
												?>
											</strong>
										</a>
									</fieldset>
									<fieldset class="fieldset">
										<legend class="legend">Alunos</legend>
										<a class="btn btn-app btn-success radius-4"><i class="icon-group bigger-260"></i>Aluno<br>
											<strong class="black">
												<?php 
													$daoAluno = new DaoAluno();
													echo $daoAluno->size();
												?>
											</strong>
										</a>
										<a class="btn btn-app btn-danger radius-4"><i class="icon-user bigger-260"></i>Meninas<br>
											<strong class="black">
												<?php 
													echo $daoAluno->sizeBySexo("Feminino");
												?>
											</strong>
										</a>
										<a class="btn btn-app btn-primary radius-4"><i class="icon-user bigger-260"></i>Meninos<br>
											<strong class="black">
												<?php 
													echo $daoAluno->sizeBySexo("Masculino");
												?>
											</strong>
										</a>
									</fieldset>									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
