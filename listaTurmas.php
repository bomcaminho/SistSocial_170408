<?php
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/dataAccessObject/DaoConnect.php';
	include_once 'business/dataAccessObject/DaoTurma.php';
	include_once 'business/dataAccessObject/DaoUsuario.php';
	
	require_once 'business/comuns/buttons/Button.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
?>
	<html lang="pt">
		<head>
			<meta charset="utf-8" />
			<title>
				Turmas - Bom Caminho
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
			
			<link href="css/StyleFrmCadUsuario.css" rel="stylesheet" />
			
			
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<script type="text/javascript" src="js/ajax/ajaxAdicionarAlunoNaTurma.js"></script>
			<script type="text/javascript" src="js/ajax/ajaxProcurarAluno.js"></script>
			
			
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
								Turmas
							</li>
						</ul>
						<!--.breadcrumb-->
					</div>
					<div class="page-content">
						<div class="page-header position-relative">
							<h1>
								Lista
								<small>
									<i class="icon-double-angle-right">
									</i>
									Turmas
								</small>
							</h1>
						</div>
						<div class="row-fluid">
						    <div class="span12">
						        <div class="widget-box">
						        	<a class="btn btn-default" href="imprime.php?user&id='.$id_u.'" target="_blank">
										<i class="icon-print icon-large"></i>
										<small>Imprimir</small>
									</a>
						       		<br><br>
									<table class="table table-bordered table-hover">
						       			<tr align="center" style="background-color: #3299CC">
											<td>Nome da Turma</td>
											<td>Educador</td>
											<td>Ações</td>
										</tr>
										<tbody>
											<tr align="center">
									        	<?php 
									        		$daoTurma = new DaoTurma();
								        			$query = $daoTurma->select();
								        			if (!$query) {
								        				echo '
															<td colspan="4"> Não foi possível executar a consulta no banco de dados</td>
														';
								        			}
								        			if (mysql_num_rows($query) == 0) {
								        				echo '
															<td colspan="4"> Nenhuma turma cadastrado</td>
														';
								        			}
								        			while($rowTurma = mysql_fetch_assoc($query)) {
								        				$daoUsuario = new DaoUsuario();
								        				$rowUsuario = mysql_fetch_assoc($daoUsuario->selectCpf($rowTurma['cpfEducador']));
														
								        				$botoes = Buttons::getBotaoVisualizar('listaTurmaComAlunos.php', $rowTurma['nome']).' '.Buttons::getBotaoExcluir('', $rowTurma['id']);

 								        				echo'
															<tr align="center" id="teste" value="d">
																<td><span id="nomeTurma" value="dina">'.$rowTurma['nome'].'<span></td>
																<td id="">'.$rowUsuario['nome'].'</td>
																<td align="center">'.$botoes.'</td>
															</tr>
														';
								        			}
									        	?>
					                    	</tr>
                                        </tbody>
									</table>
								</div>
								<div id="dina">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>