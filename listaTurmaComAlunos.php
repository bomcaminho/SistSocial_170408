<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';
	
	require_once 'business/dataAccessObject/DaoTurmaComAluno.php';
	require_once 'business/dataAccessObject/DaoFamilia.php';

	require_once 'business/comuns/buttons/Button.php';
	require_once 'business/comuns/notification/Notification.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
?>

	<html lang="pt">
		<head>
			<meta charset="utf-8" />
			<title>
				Lista de Alunos por Turma - Bom Caminho
			</title>
			<meta name="description" content="overview &amp; stats" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0"
			/>
			<!--basic styles-->
			<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
			<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet"
			/>
			<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
			<!--[if IE 7]>
				<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
			<![endif]-->
			<!--page specific plugin styles-->
			<!--fonts-->
			<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"
			/>
			<!--ace styles-->
			<link rel="stylesheet" href="assets/css/ace.min.css" />
			<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
			<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
			<!--[if lte IE 8]>
				<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
			<![endif]-->
			<!--inline styles related to this page-->
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		</head>
		<body>
			<div class="navbar">
				<div class="navbar-inner ">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>.:: Grupo de Assistencia Social Bom Caminho ::.</small>
					</a><!--/.brand-->
				</div><!--/.container-fluid-->
				<div class="container-fluid">
					<p style="color: white;" align="right"><?php echo 'Seja Bem-vindo(a), '.$session->getValueSession('nomeDoUsuario') ?> </p>
				</div>
				</div>
				<!--/.navbar-inner-->
			</div>
			<div class="main-container container-fluid">
				<a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>
				<div class="sidebar" id="sidebar">
					<?php require 'menu.php';?>
						<div class="sidebar-collapse" id="sidebar-collapse">
							<i class="icon-double-angle-left">
							</i>
						</div>
				</div>
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon">
								</i>
								<a href="index.php">Home</a>
								<span class="divider">
									<i class="icon-angle-right arrow-icon">
									</i>
								</span>
							</li>
							<li class="active">
								Aluno
							</li>
						</ul>
						<!--.breadcrumb-->
					</div>
					<div class="page-content">
						<div class="page-header position-relative">
							<h1>
								Lista de Aluno
								<small>
									<i class="icon-double-angle-right">
									</i>
									Turma <?php echo $_GET['id']?>
								</small>
							</h1>
						</div>
						<!--/.page-header-->
						<div class="row-fluid">
						    <div class="span12">
						        <div class="widget-box">
						        	<a class="btn btn-default" href="imprimirAluno.php" target="_blank">
										<i class="icon-print icon-large"></i>
										<small>Imprimir</small>
									</a>
						       		<br><br>
									<?php
										$daoTurmaComAluno = new DaoTurmaComAluno();
										$query = $daoTurmaComAluno->selectPorNomeDaTurma($_GET['id']);
										if (!$query) {
											Notification::showError("Nao Foi possivel executar a consulta no banco de dados.");
										}
										else if (mysql_num_rows($query) == 0) {
											Notification::showWarning("Nenhum aluno cadastrado nesta turma");
										}
										else {
											echo '
												<table class="table table-bordered table-hover">
													<tr align="center" style="background-color: #3299CC">
														<td>Aluno</td>
														<td>Faltas</td>
														<td>Responsavel</td>
														<td>Educador</td>
														<td>Acoes</td>
													</tr>'
											;
											
											while ($row = mysql_fetch_assoc($query)) {
												if ($session->getValueSession('nomeDoUsuario') == $row['nomeeducador']) {
													if ($row['faltas'] >= 10) {
														$statusButton = 'disabled';
													} else {
														$statusButton = '';
													}
												}
												else {
													$statusButton = 'disabled';
												}
												
												$botoes = Buttons::getBotaoAdicionar("adicionarFaltaParaAluno.php", $row['id'], "Adicionar Falta", $statusButton).' '.Buttons::getBotaoRemover("removerFaltaParaAluno.php", $row['id'], "Remover Falta", $statusButton);
													
												$daoFamilia = new DaoFamilia();
												$rowResponsavel = mysql_fetch_assoc($daoFamilia->selectToCpf($row['cpfDoResponsavel']));
												echo'
													<tr align="center">
														<td td width="300px" align="center">'.$row['nomealuno'].'</td>
														<td>'.$row['faltas'].'</td>
														<td>'.$rowResponsavel['nomeDoResponsavel'].'<br>'.'CPF n&#176 '.$rowResponsavel['cpfDoResponsavel'].'</td>
														<td td width="300px" align="center">'.$row['nomeeducador'].'</td>
														<td>'.$botoes.'</td>
													</tr>
												';
											}
										}
									?>
								</div>
							</div>
						</div>
			</body>
	
	</html>