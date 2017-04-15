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
    </head>
	<body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="#" class="brand">
                        <small><i class="trash"></i>Bom Caminho</small>
                    </a>
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
                    <div>
                    <?php
 						if(isset($_GET['errorResponsavel'])) {
							Notification::showError("Familia Assistida nao localizada no sistema.");						
 						}
 						else if(isset($_GET['successCadastroVisita'])) {
							Notification::showSuccess("Relatorio de Visita a Familia Assistida cadastrada com sucesso.");						
 						}

 						else if(isset($_GET['errorCadastroVisita'])) {
							Notification::showError("Erro ao cadastrar o relatorio de Visita a Familia Assistida.");						
 						}
                    ?>
                    <form action="ProcurarResponsavel.php?page=newVisita" method="post" id="formCadUsuario" name="formCadUsuario">
						<fieldset class="fieldset">
							<legend class="legend">Familia Assistida</legend>
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
									<td><button class="btn btn-success btn-small" type="submit"><i class="icon-search icon-large"></i><small>Procurar</small></button></td>
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
											<textarea class="form-control" rows="7" style="width: 100%" id="descricaoVisita" name="descricaoVisita" placeholder="Parecer do Grupo de Assistencia Social"></textarea>
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