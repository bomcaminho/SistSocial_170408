<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';
	
	require_once 'business/comuns/notification/Notification.php';
		
	$session = new Session();
	$session->ValidaSessionUsuario();
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
        <script type="text/javascript" src="js/ajax/ajaxProcurarResponsavel.js"></script>
        
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
                      	<li class="active">Visita a Familia Assistida</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Visita a Familia Assistida</small>
                        </h1>
                    </div>
                    <?php
	                    if(isset($_GET['success'])) {
	                    	Notification::showSuccess("Relatorio de visita a familia assistida gravada com sucesso.");
	                    } else if(isset($_GET['error'])) {
	                    	Notification::showError("Erro na gravação do relatorio da visita.");
	                    }
                    ?>
                    <div>
						<fieldset class="fieldset">
							<legend class="legend">Familia Assistida</legend>
							<table class="table-condensed" style="width: 650px">
								<tr>
									<td><input class="form-control" style="width: 100%" type="text" id="cpfResponsavel" name="cpfResponsavel" onkeypress="maskField(this, '###.###.###-##')" maxlength="14" placeholder="CPF do Responsavel" required/></td>
									<td><button class="btn btn-success btn-small" onclick="getDadosResponsavel();"><i class="icon-search icon-large"></i><small>Procurar</small></button></td>
								</tr>						
								<tr align="left">
									<td colspan="4"><span style="margin-left: 10px" id="nomeResponsavel"></span></td>
								</tr>
							</table>
						</fieldset>
		            </div>
		            <div>
		            	<form action="CadastroVisita.php" method="post" id="formCadVisita" name="formCadVisita">
							<fieldset class="fieldset">
								<legend class="legend">Relatorio</legend>
								<table class="table-condensed" style="width: 650px;">
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="dataVisita" name="dataVisita" placeholder="Data da Visita" onkeypress="maskField(this, '##/##/####')" maxlength="10" required/></td>
									</tr>
									<tr>
										<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="nomeAssistenteSocial1" name="nomeAssistenteSocial1" placeholder="Nome do Assistente Social" required/></td>
										<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="nomeAssistenteSocial2" name="nomeAssistenteSocial2" placeholder="Nome do Assistente Social" required/></td>
									</tr>
									<tr>
										<td colspan="4">
											<textarea class="form-control" rows="7" style="width: 100%" id="descricaoVisita" name="descricaoVisita" placeholder="Descricao da Visita"></textarea>
										</td>
									</tr>
								</table>
							</fieldset>
							<fieldset class="fieldset">
								<legend class="legend">Parecer</legend>
								<table class="table-condensed" style="width: 650px;">
									<tr>
										<td colspan="4">
											<textarea class="form-control" rows="7" style="width: 100%" id="parecerDaVisita" name="parecerDaVisita" placeholder="Parecer do Grupo de Assistencia Social"></textarea>
										</td>
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