<?php 
	
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/dataAccessObject/DaoConnect.php';
	require_once 'business/dataAccessObject/DaoVisita.php';
	
	require_once 'business/comuns/notification/Notification.php';
	require_once 'business/comuns/buttons/Button.php';
	
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
        <link rel="stylesheet" href="css/font-awesome.min.css" />
		
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		
        <!--fonts-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <link href="css/StyleFrmCadUsuario.css" rel="stylesheet" />
        <script type="text/javascript" src="js/Masks/MasksFields.js"></script>
        <script type="text/javascript" src="js/Masks/MaskMoney.js"></script>
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
                        	Historico de Visitas Domiciliar
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $session->getValueSession('nomeResponsavel'); ?></small>
                        </h1>
                    </div>
                    <div>
                    	<?php
                    		$daoVisita = new DaoVisita();
							$query = $daoVisita->selectToCpf($session->getValueSession('cpfResponsavel'));
						
							if (!$query) {
								Notification::showError('Erro na consulta no banco de dados.');
							} else if (mysql_num_rows($query) == 0) {
								Notification::showError('Familia nao possui visita cadastrado no sistema.');
							} else {
								echo '
        							<table class="table table-bordered table-hover">
										<tr align="center" style="background-color: #3299CC">
											<td>Data da Visita</td>
											<td>Assistentes Sociais</td>
											<td>Descricao</td>
        									<td>Parecer</td>
										</tr>
								';
								while($row = mysql_fetch_assoc($query)) {
									echo '
        								<tr align="center">
											<td width="180px" align="center">'.$row['data'].'</td>
											<td width="180px" align="center">'.$row['nomeAssistenteSocial1'].' / '.$row['nomeAssistenteSocial2'].'</td>
											<td align="justify">'.$row['descricao'].'</td>
        									<td align="justify">'.$row['parecer'].'</td>
										</tr>
        							';		
								} 
								echo '</table>';
							}
						?>
            		</div>
            		<div>
						<a class="btn btn-info" href="listaDependentes.php"><i class="glyphicon glyphicon-chevron-left"></i>Voltar Pagina</a>
					</div>
				</div>
            </div>
		</div>
	</body>
</html>