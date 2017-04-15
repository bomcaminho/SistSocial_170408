<?php 
	
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/dataAccessObject/DaoConnect.php';
	require_once 'business/dataAccessObject/DaoDependente.php';
	
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
                        	Lista de Dependentes
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $session->getValueSession('nomeResponsavel'); ?></small>
                        </h1>
                    </div>
                    <div>
						<?php echo Buttons::getBotaoAdicionar("newDependente.php", '','Dependente',''); ?>
						<br><br>                    
                    </div>
                    <div>
                    <?php
                    	$daoDependente = new DaoDependente();
						$query = $daoDependente->selectByCpfDoResponsavel($session->getValueSession('cpfResponsavel'));
						
						if (!$query) {
							Notification::showError('Erro na consulta no banco de dados.');
						} else if (mysql_num_rows($query) == 0) {
							Notification::showError('Familia nao possui dependente cadastrado no sistema.');
						} else {
							echo '
        						<table class="table table-bordered table-hover">
									<tr align="center" style="background-color: #3299CC">
										<td>Nome</td>
										<td>Grau de Parentesco</td>
										<td>Situacao do Trabalho</td>
										<td>Acoes</td>
									</tr>
							';
						}
						while($row = mysql_fetch_assoc($query)) {
							$botoes = Buttons::getBotaoVisualizar("visualizarDependente.php", $row['id']).' '.Buttons::getBotaoExcluir("dependente", $row['id']);
							echo '
        							<tr align="center">
										<td>'.$row['nomeDoDependente'].'</td>
										<td>'.$row['grauDeParentesco'].'</td>
										<td>'.$row['situacaoDoTrabalhoDependente'].'</td>
										<td>'.$botoes.'</td>
									</tr>
        					';		
						} 
						echo '</table>';
					?>
            		</div>
            		<div>
            			<a class="btn btn-info" href="visualizarFamilia.php?id=<?php echo $_GET['id'] ?>"><i class="glyphicon glyphicon-chevron-left" ></i>Voltar Pagina</a>
						<a class="btn btn-info" href="listaVisitaDomiciliar.php"><i class="glyphicon glyphicon-chevron-right"></i>Proximo Pagina</a>
					</div>
				</div>
            </div>
		</div>
	</body>
</html>