<?php 
	
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/dataAccessObject/DaoConnect.php';
	require_once 'business/dataAccessObject/DaoAluno.php';
	require_once 'business/dataAccessObject/DaoDependente.php';

	
	
	require_once 'business/comuns/notification/Notification.php';
	require_once 'business/comuns/buttons/Button.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$daoDependente = new DaoDependente();
	$row = mysql_fetch_assoc($daoDependente->selectById($_GET['id']));
	
	$daoAluno = new DaoAluno();
	$query = $daoAluno->selectByNome($row['nomeDoDependente']);
	if (mysql_num_rows($query) == 0) {
		$alunoDoBC = 'Nao';
	} else {
		$alunoDoBC = 'Sim';
	}
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
                        	Dependentes
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $session->getValueSession('nomeResponsavel'); ?></small>
                        </h1>
                    </div>
                    <div>
	                    <form action="CadastroDependente.php" method="post" id="formCadDependente" name="formCadDependente">
							<fieldset class="fieldset">
								<legend class="legend">Dependente</legend>
								<table class="table-condensed" style="width: 650px;">
									<tr>
										<td colspan="2"><label>Aluno do Bom Caminho</label></td>
									</tr>
									<tr>
										<th colspan="2"><input class="form-control" style="width: 100%" type="text" id="alunoDoBomCaminho" name="alunoDoBomCaminho" value="<?php echo $alunoDoBC ?>" disabled/></th>
									</tr>
									<tr>
										<td colspan="1"><label>CPF</label></td>
										<td colspan="1"><label>RG</label></td>
									</tr>
									<tr align="left">
										<th colspan="1"><input class="form-control" style="width: 100%" type="text" id="cpfDoDependente" name="cpfDoDependente" value="<?php echo $row['cpfDoDependente'] ?>" disabled /></th>
										<th colspan="1"><input class="form-control" style="width: 100%" type="text" id="rgDoDependente" name="rgDoDependente" value="<?php echo $row['cpfDoDependente'] ?>" disabled></th>
									</tr>
									<tr>
										<td colspan="4"><label>Nome Completo</label></td>
									</tr>
									<tr align="left">
										<th colspan="4"><input class="form-control"style="width: 100%" type="text" id="nomeDoDependente" name="nomeDoDependente" value="<?php echo $row['nomeDoDependente'] ?>" disabled></th>
									</tr>
									<tr>
										<td colspan="1"><label>Data de Nascimento</label></td>
										<td colspan="2"><label>Sexo</label></td>
										<td colspan="1"><label>Grau de Parentesco</label></td>
									</tr>
									<tr align="left">
									<th colspan="1"><input class="form-control" style="width: 100%" type="text" id="dataDeNascimentoDoDependente" name="dataDeNascimentoDoDependente" value="<?php echo $row['dataDeNascimentoDoDependente'] ?>" disabled></th>
									<th colspan="2"><input class="form-control" style="width: 100%" type="text" id="sexoDoDependente" name="sexoDoDependente" value="<?php echo $row['sexoDoDependente'] ?>" disabled></th>
									<th colspan="1"><input class="form-control" style="width: 100%" type="text" id="grauDeParentesco" name="grauDeParentesco" value="<?php echo $row['grauDeParentesco'] ?>" disabled></th>
									</tr>
									<tr>
									<td colspan="2"><label>Deficiente</label></td>
									<td colspan="2"><label>Tipo de Deficiencia</label></td>
									</tr>
									<tr>
									<th colspan="2"><input class="form-control" style="width: 100%" type="text" id="deficiente" name="deficiente" value="<?php echo $row['deficiente'] ?>" disabled></th>
									<th colspan="2"><input class="form-control" style="width: 100%" type="text" id="tipoDeficiencia" name="tipoDeficiencia" value="<?php echo $row['tipoDeficiencia'] ?>" disabled></th>
									</tr>
									<tr>
									<td colspan="4"><label>Escolaridade</label></td>
									</tr>
									<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style="width: 100%" type="text" id="escolaridadeDoDependente" name="escolaridadeDoDependente" value="<?php echo $row['escolaridadeDoDependente'] ?>" disabled></th>
									</tr>
									<tr>
									<td colspan="2"><label>Situacao do Trabalho</label></td>
									<td colspan="2"><label>Renda Pessoal</label></td>
									</tr>
									<tr align="left">
									<th colspan="2"><input class="form-control" style="width: 100%" type="text" id="situacaoDoTrabalhoDependente" name="situacaoDoTrabalhoDependente" value="<?php echo $row['situacaoDoTrabalhoDependente'] ?>" disabled></th>
									<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="rendaDoDependente" name="rendaDoDependente" value="<?php echo $row['rendaDoDependente'] ?>" disabled></td>
									</tr>
									<tr>
									<td colspan="4"><label>Profissao</label></td>
									</tr>
									<tr>
									<td colspan="4"><input class="form-control" style="width: 100%" type="text" id="profissaoDoDependente" name="profissaoDoDependente" value="<?php echo $row['profissaoDoDependente'] ?>" disabled></td>
									</tr>
									<tr>
									<td colspan="4"><label>Observacao</label></td>
									</tr>
									<tr>
									<td colspan="4"><textarea class="form-control" style="width: 100%" rows="3" id="observacaoDoDependente" name="observacaoDoDependente" disabled><?php echo $row['observacaoDoDependente'] ?></textarea></td>
									</tr>
									</table>
							</fieldset>
							<div>
							<a class="btn btn-info" href="listaDependentes.php"><i class="icon-home home-icon"></i>Voltar</a>
							</div>
							</form>
                    
                    
		    		</div>
				</div>
            </div>
		</div>
	</body>
</html>