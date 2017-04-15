<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	require_once 'business/comuns/notification/Notification.php';
	
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
        <link rel="stylesheet" href="css/font-awesome.min.css" />
		
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		
        <!--fonts-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <link href="css/StyleFrmCadUsuario.css" rel="stylesheet" />
        <script type="text/javascript" src="js/Masks/MasksFields.js"></script>
        <script type="text/javascript" src="js/Masks/MaskMoney.js"></script>
        
        <script type="text/javascript" src="js/ajax/ajaxAdicionarDependenteNaTurma.js"></script>
        
        
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
                      	<li class="active">Familia</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Dependente</small>
                        </h1>
                    </div>
                    <div>
                    <?php
	                    if(isset($_GET['errorAlunoDoBomCaminho'])) {
	                    	Notification::showError("Obrigatorio informar se o dependente e aluno do Bom Caminho.");
	                    }
	                    else if(isset($_GET['error'])) {
	                    	Notification::showError("Erro no cadastrado do dependente no banco de dados.");
	                    }
	                    else if(isset($_GET['success'])) {
	                    	Notification::showSuccess("Dependente cadastrado com sucesso.");
	                    }
                    ?>
					<form action="CadastroDependente.php" method="post" id="formCadDependente" name="formCadDependente">
						<fieldset class="fieldset">
							<legend class="legend">Dependente</legend>	
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<th colspan="2">
										<select class="form-control" style='width: 100%' id="alunoDoBomCaminho" name="alunoDoBomCaminho">
											<option value="NULL">Aluno do Bom Caminho</option>
											<option value="Sim">Sim</option>
											<option value="Nao">Nao</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="cpfDoDependente" name="cpfDoDependente" placeholder="CPF" onkeypress="maskField(this, '###.###.###-##')" maxlength="14" required/></th>
									<th><input class="form-control" style='width: 100%' type="text" id="rgDoDependente" name="rgDoDependente" placeholder="RG" onkeypress="maskField(this, '##.###.###-#')" maxlength="12" required></th>
								</tr>
								<tr align="left">
									<th colspan="4"><input class="form-control" style='width: 100%' type="text" id="nomeDoDependente" name="nomeDoDependente" placeholder="Nome Completo" required></th>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="dataDeNascimentoDoDependente" name="dataDeNascimentoDoDependente" placeholder="Data Nascimento" onkeypress="maskField(this, '##/##/####')" maxlength="10" onblur="adicionarDependenteNaTurma()" required></th>
									<th>
										<select class="form-control" style='width: 100%' id="sexoDoDependente" name="sexoDoDependente">
											<option value="NULL">Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Feminino">Feminino</option>
										</select>
									</th>
									<th>
										<input class="form-control" style='width: 100%' type="text" id="grauDeParentesco" name="grauDeParentesco" placeholder="Grau de Parentesco" required>
									</th>
								</tr>
								<tr>
									<td colspan="2">
										<select class="form-control" style="width: 100%" id="deficiente" name="deficiente">
											<option value="NULL">Deficiente</option>
											<option value="sim">Sim</option>
											<option value="nao">Nao</option>
										</select>
									</td>
									<td colspan="2">
										<select class="form-control" style="width: 100%" id="tipoDeficiencia" name="tipoDeficiencia">
											<option value="NULL">Tipo de Deficiencia</option>
											<option value="auditiva">Auditiva</option>
											<option value="fisico">Fisico</option>
											<option value="mental">Mental</option>
											<option value="visual">Visual</option>
										</select>
									</td>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="escolaridadeDoDependente" name="escolaridadeDoDependente" placeholder="Escolaridade" required></th>
								</tr>
								<tr align="left">
									<td colspan="2">
										<select class="form-control" id="situacaoDoTrabalhoDependente" name="situacaoDoTrabalhoDependente">
											<option value="NULL">Situacao do Trabalho</option>
											<option value="Trabalhando">Trabalhando</option>
											<option value="Desempregado">Desempregado</option>
											<option value="Licença">Licenca</option>
											<option value="Aposentado">Aposentado</option>
											<option value="Bico">Bico</option>
											<option value="Nao Trabalha">Nao Trabalha</option>
										</select>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="rendaDoDependente" name="rendaDoDependente" placeholder="Renda Pessoal" onKeyPress="return(maskMoney(this,'.',',',event))">
									</td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="profissaoDoDependente" name="profissaoDoDependente" placeholder="Profissao"></td>
								</tr>
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="observacaoDoDependente" name="observacaoDoDependente" placeholder="Observacao"></textarea></td>
								</tr>
								
							</table>
						</fieldset>
						<div id="adicionarDependenteNaTurma">
						</div>
					<div>
						<button class="btn btn-info" type="submit"><i class="icon-ok icon-large"></i>Cadastrar</button>
						<button class="btn" type="reset"><i class="icon-repeat icon-large"></i>Limpar</button>
						<a class="btn btn-success" href="administracao.php"><i class="icon-home home-icon"></i>Finalizar</a>
					</div>
				</form>
            	</div>
				</div>
            </div>
		</div>
	</body>
</html>