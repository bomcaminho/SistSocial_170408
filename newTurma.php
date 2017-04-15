<?php 
	include_once 'business/dataAccessObject/DaoUsuario.php';

	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';
	
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
        <script type="text/javascript" src="js/Masks/ValidateFieldNumber.js"></script>
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
                      	<li class="active">Nova Turma</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Nova Turma</small>
                        </h1>
                    </div>
                    <?php
    					if(isset($_GET['error'])) {
							echo '
        						<div class="alert alert-block alert-error">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-remove red"></i>
									Ja existe uma turma com este nome.
								</div>
        					';
						}
						if(isset($_GET['success'])) {
							echo '
        						<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									Turma cadastrada com sucesso.
								</div>
        					';
						}
    				?>
                    <div>
                    <form action="CadastroTurma.php" method="post" id="formCadTurma" name="formCadTurma">
						<fieldset class="fieldset">
							<legend class="legend">Educador</legend>
							<table class="table-condensed" style="width: 650px">
								<tr>
									<td>											
										<select class="form-control" style="width: 100%" id="educador" name="educador">
											<option value="NULL">Selecione o Educador</option>
											<?php 
												$daoUsuario = new DaoUsuario();
												$query = $daoUsuario->selectTipoUsuario("Educador");
												if ($query == null) {
													echo'<option value="NO">Nao foi possivel listar os educadores</option>';
												}
												else {
													while($row = mysql_fetch_assoc($query))
													{
														echo' <option value="'.$row['cpf'].','.$row['nome'].'">'.$row['nome'].'</option>';
													}
												}
											?>
										</select>
									</td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
								<legend class="legend">Turma</legend>
									<table class="table-condensed" style="width: 650px">
										<tr>
											<td colspan="4"><input class="form-control" style="width: 100%" type="text" id="nomeTurma" name="nomeTurma" placeholder="Nome da Turma" required/></td>
										</tr>
										<tr>
											<td><input class="form-control" style="width: 100%" type="text" id="idadeMinima" name="idadeMinima" placeholder="Idade Minima" maxlength="2" onkeypress="maskField(this,'')" required/></td>
											<td><input class="form-control" style="width: 100%" type="text" id="idadeMaxima" name="idadeMaxima" placeholder="Idade Maxima" maxlength="2" onkeypress="maskField(this,'')" required/></td>
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