<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$codigoAluno = substr(md5(uniqid(rand(), true)), 0, 6);
?>


<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <title>Bom Caminho</title>
        <meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="css/ace.min.css" />
        <link rel="stylesheet" href="css/ace-responsive.min.css" />
        <link rel="stylesheet" href="css/ace-skins.min.css" />
		
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		
        <!--fonts-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <link href="css/StyleFrmCadUsuario.css" rel="stylesheet" />
        <script type="text/javascript" src="js/Masks/MasksFields.js"></script>
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
            </div>
        </div>
        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>
            <div class="sidebar" id="sidebar">
				<?php require 'menu.php';?>
            </div>
            <div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>
                            <span class="divider"><i class="icon-angle-right arrow-icon"></i></span>
                     	</li>
                      	<li class="active">Novo Aluno</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Novo Aluno</small>
                        </h1>
                    </div>
                    <?php
 						if(isset($_GET['errorResponsavel'])) {
							echo '
       							<div class="alert alert-block alert-error">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-remove red"></i>
									Responsavel nao encontrado no sistema.
								</div>
        					';
						}
						else if(isset($_GET['errorCadastroAluno'])) {
							echo '
       							<div class="alert alert-block alert-error">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-remove red"></i>
									Nao foi possivel cadastrar o aluno
								</div>
        					';
								
						}
						else if(isset($_GET['successCadastroAluno'])) {
							echo '
       							<div class="alert alert-block alert-error">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									Aluno Cadastrado com sucesso.
								</div>
        					';
								
						}
    				?>
                    <div>
                    <form action="ProcurarResponsavel.php?page=newAluno" method="post" id="formCadUsuario" name="formCadUsuario">
						<fieldset class="fieldset">
							<legend class="legend">Responsavel</legend>
							<table class="table-condensed" style="width: 650px">
								<tr>
									<td>
										<?php
											$cpfResponsavel = "CPF do Responsavel";
											if(isset($_GET['successResponsavel'])) {
												$cpfResponsavel = $_SESSION['cpfResponsavel'];
											}
											echo '
												<input class="form-control" style="width: 100%" type="text" id="cpfResponsavel" name="cpfResponsavel" onkeypress="maskField(this, '."'###.###.###-##')".'" maxlength="14" placeholder="'.$cpfResponsavel.'" required/>'
        									;
										?>
									</td>
									<td><button class="btn btn-success" type="submit"><i class="icon-search icon-large"></i><small>Procurar</small></button></td>
								</tr>						
								<tr>
									<td colspan="4">
										<?php
											$nomeResponsavel = "Nome do Responsavel";
											if(isset($_GET['successResponsavel'])) {
												$nomeResponsavel = $_SESSION['nomeResponsavel'];
											}
											echo '
												<input class="form-control" style="width: 100%" type="text" id="cpf_cada" name="cpf_cada" placeholder="'.$nomeResponsavel.'" disabled/>'
											;
										?>
									</td>
								</tr>
							</table>
						</fieldset>
					</form>
					<form action="CadastroAluno.php" method="post" id="formCadUsuario" name="formCadUsuario">
						<fieldset class="fieldset">
							<legend class="legend">Dados Pessoais</legend>
								<table class="table-condensed" style="width: 650px">
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="codigoAluno" name="codigoAluno" value="<?php echo strtoupper($codigoAluno); ?>" disabled/></td>
									</tr>
									<tr>
										<td colspan="3"><input class="form-control" style="width: 100%" type="text" id="nomeAluno" name="nomeAluno" placeholder="Nome Completo" required/></td>
										<td>
											<select class="form-control" style="width: 100%" id="sexoAluno" name="sexoAluno">
												<option value="NULL">Sexo</option>
												<option value="Masculino">Masculino</option>
												<option value="Feminino">Feminino</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="DataNascimentoAluno" name="DataNascimentoAluno" placeholder="Data Nascimento" onkeypress="maskField(this, '##/##/####')" maxlength="10" required/></td>
										<td colspan="2">
											<select class="form-control" style="width: 100%" id="deficiente" name="deficiente">
												<option value="NULL">Deficiente</option>
												<option value="sim">Sim</option>
												<option value="nao">Nao</option>
											</select>
										</td>
										<td>
											<select class="form-control" style="width: 100%" id="tipoDeficiencia" name="tipoDeficiencia">
												<option value="NULL">Tipo de Deficiencia</option>
												<option value="auditiva">Auditiva</option>
												<option value="fisico">Fisico</option>
												<option value="mental">Mental</option>
												<option value="visual">Visual</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="4">
											<textarea class="form-control" style="width: 100%" id="ObservacaoAluno" name="ObservacaoAluno" placeholder="Observacao"></textarea>
										</td>
									</tr>
								</table>
							</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Vestuario</legend>
								<table class="table-condensed" style="width: 650px">
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="calcaAluno" name="calcaAluno" placeholder="Calca" /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="camisetaAluno" name="camisetaAluno" placeholder="Camiseta" /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="vestidoAluno" name="vestidoAluno" placeholder="Vestido" /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="calcadoAluno" name="calcadoAluno" placeholder="Calcado" /></td>
									</tr>
								</table>
						</fieldset>
						<div>
							<button class="btn btn-info" type="submit"><i class="icon-ok icon-large"></i>Cadastrar</button>
							<button class="btn" type="reset"><i class="icon-repeat icon-large"></i>Limpar</button>
						</div>
					</form>
		            </div>
				</div>
            </div>
		</div>
	</body>
</html>
