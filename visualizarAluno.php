<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';
	require_once 'business/dataAccessObject/DaoAluno.php';
	
	require_once 'business/dataAccessObject/DaoFamilia.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();

	$daoAluno = new DaoAluno();
	$row = mysql_fetch_assoc($daoAluno->selectById($_GET['id']));
	
	$daoFamilia = new DaoFamilia();
	$rowFamilia = mysql_fetch_assoc($daoFamilia->selectToCpf($row['cpfResponsavel']));
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
                      	<li class="active">Visualizar Aluno</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Aluno
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $row['nome'] ?></small>
                        </h1>
                    </div>
                    <div>
					<form action="CadastroAluno.php" method="post" id="formCadUsuario" name="formCadUsuario">
						<fieldset class="fieldset">
							<legend class="legend">Responsavel</legend>
							<table class="table-condensed" style="width: 650px">
								<tr>
									<td><label>CPF</label></td>
									<td colspan="4"><label>Nome do Responsavel</label></td>
								</tr>
								<tr>
									<td><input class="form-control" style="width: 100%" type="text" id="cpfResponsavel" name="cpfResponsavel" value="<?php echo $row['cpfResponsavel'] ?>" disabled/></td>
									<td colspan="3"><input class="form-control" style="width: 100%" type="text" id="cpfResponsavel" name="cpfResponsavel" value="<?php echo $rowFamilia['nomeDoResponsavel'] ?>" disabled/></td>
								</tr>
								<tr>
									<td colspan="4"><label>Telefone em caso de emergencia</label></td>
								</tr>
								<tr>
									<td><input class="form-control" style="width: 100%" type="text" id="NomeDoResponsavel" name="NomeDoResponsavel" value="<?php echo $rowFamilia['telResidencial'] ?>" disabled/></td>
									<td><input class="form-control" style="width: 100%" type="text" id="NomeDoResponsavel" name="NomeDoResponsavel" value="<?php echo $rowFamilia['telCelular'] ?>" disabled/></td>
									<td><input class="form-control" style="width: 100%" type="text" id="NomeDoResponsavel" name="NomeDoResponsavel" value="<?php echo $rowFamilia['telRecado1'] ?>" disabled/></td>
									<td><input class="form-control" style="width: 100%" type="text" id="NomeDoResponsavel" name="NomeDoResponsavel" value="<?php echo $rowFamilia['telRecado2'] ?>" disabled/></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Dados Pessoais</legend>
								<table class="table-condensed" style="width: 650px">
									<tr>
										<td colspan="3"><label>Codigo</label></td>
									</tr>
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="codigoAluno" name="codigoAluno" value="<?php echo $row['codigo'] ?>" disabled/></td>
									</tr>
									<tr>
										<td colspan="3"><label>Nome Completo</label></td>
										<td colspan="1"><label>Sexo</label></td>
									</tr>
									<tr>
										<td colspan="3"><input class="form-control" style="width: 100%" type="text" id="nomeAluno" name="nomeAluno" value="<?php echo $row['nome'] ?>" disabled/></td>
										<td colspan="1"><input class="form-control" style="width: 100%" type="text" id="sexoAluno" name="sexoAluno" value="<?php echo $row['sexo'] ?>" disabled/></td>
									</tr>
									<tr>
										<td colspan="1"><label>Data Nascimento</label></td>
										<td colspan="2"><label>Deficiente</label></td>
										<td colspan="1"><label>Tipo de Deficiencia</label></td>
									</tr>
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="DataNascimentoAluno" name="DataNascimentoAluno" value="<?php echo $row['datanascimento'] ?>" disabled/></td>
										<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="deficiente" name="deficiente" value="<?php echo $row['deficiente'] ?>" disabled/></td>
										<td><input class="form-control" style="width: 100%" type="text" id="tipoDeDeficiente" name="tipoDeDeficiente" value="<?php echo $row['tipodeficiencia'] ?>" disabled/></td>
									</tr>
									<tr>
										<td colspan="4"><label>Observacao</label></td>
									</tr>
									<tr>
										<td colspan="4">
											<textarea class="form-control" style="width: 100%" id="ObservacaoAluno" name="ObservacaoAluno" disabled><?php echo $row['observacao'] ?></textarea>
										</td>
									</tr>
								</table>
							</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Vestuario</legend>
								<table class="table-condensed" style="width: 650px">
									<tr>
										<td><label>Calca</label></td>
										<td><label>Camiseta</label></td>
										<td><label>Vestido</label></td>
										<td><label>Calcado</label></td>
									</tr>
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="calcaAluno" name="calcaAluno" value="<?php echo $row['calca'] ?>" disabled /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="camisetaAluno" name="camisetaAluno" value="<?php echo $row['camiseta'] ?>" disabled /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="vestidoAluno" name="vestidoAluno" value="<?php echo $row['vestido'] ?>" disabled /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="calcadoAluno" name="calcadoAluno" value="<?php echo $row['calcado'] ?>" disabled /></td>
									</tr>
								</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Turma</legend>
								<table class="table-condensed" style="width: 650px">
									<tr>
										<td colspan="1"><label>Nome da Turma</label></td>
										<td colspan="3"><label>Horario</label></td>
									</tr>
									<tr>
										<td><input class="form-control" style="width: 100%" type="text" id="vestidoAluno" name="vestidoAluno" value="<?php echo $row['vestido'] ?>" disabled /></td>
										<td><input class="form-control" style="width: 100%" type="text" id="calcadoAluno" name="calcadoAluno" value="<?php echo $row['calcado'] ?>" disabled /></td>
									</tr>
									<tr>
										<td colspan="4"><label>Monitor</label></td>
									</tr>
									<tr>
										<td colspan="4"><input class="form-control" style="width: 100%" type="text" id="vestidoAluno" name="vestidoAluno" value="<?php echo $row['vestido'] ?>" disabled /></td>
									</tr>
								</table>
						</fieldset>
						<div>
							<a class="btn btn-info" href="listaAlunos.php"><i class="icon-home home-icon"></i>Voltar</a>
						</div>
					</form>
		            </div>
				</div>
            </div>
		</div>
	</body>
</html>
