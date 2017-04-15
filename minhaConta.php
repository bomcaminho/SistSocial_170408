<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	require_once 'business/dataAccessObject/DaoUsuario.php';
	
	require_once 'business/comuns/notification/Notification.php';
	
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$daoUsuario = new DaoUsuario();
	$rowUsuario = mysql_fetch_assoc($daoUsuario->selectById($session->getValueSession('idDoUsuario')));
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
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
            </div>
            <div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>
                            <span class="divider"><i class="icon-angle-right arrow-icon"></i></span>
                     	</li>
                      	<li class="active">Minha Conta</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Usuario
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $rowUsuario['nome'] ?></small>
                        </h1>
                    </div>
                    <div>
                        <?php
    						if(isset($_GET['error'])) {
								Notification::showError("Erro na atualizacao do usuario");
    						}
							else if(isset($_GET['success'])) {
								Notification::showSuccess("Atualizacao realizada com sucesso");
							}
    					?>
                    	<form action="atualizarUsuario.php" method="post" id="formAtuUsuario" name="formAtuUsuario">
							<fieldset class="fieldset">
								<legend class="legend">Dados do Pessoais</legend>
								<table class="table-condensed" style="width: 650px;">
									<tr>
										<td><label>CPF</label></td>
										<td><label>RG</label></td>
									</tr>
									<tr align="left">
										<th><input class="form-control" style='width: 100%' type="text" id="cpfUsuario" name="cpfUsuario" readonly="readonly" value="<?php echo $rowUsuario['cpf'] ?>"></th>
										<th><input class="form-control" style='width: 100%' type="text" id="rgUsuario" name="rgUsuario" value="<?php echo $rowUsuario['rg'] ?>" readonly="readonly"></th>
									</tr>
									<tr>
										<td colspan="3"><label>Nome Completo</label></td>
										<td><label>Sexo</label></td>
									</tr>
									<tr align="left">
										<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeUsuario" name="nomeUsuario" value="<?php echo $rowUsuario['nome'] ?>" readonly="readonly"></th>
										<th><input class="form-control" style='width: 100%' type="text" id="sexoUsuario" name="sexoUsuario" value="<?php echo $rowUsuario['sexo'] ?>" readonly="readonly"></th>
									</tr>
									<tr>
										<td><label>Data Nascimento</label></td>
										<td><label>Cidade</label></td>
										<td><label>Estado</label></td>
										<td><label>Estado Civil</label></td>
									</tr>
									<tr align="left">
										<th><input class="form-control" style='width: 100%' type="text" id="DataNascimentoUsuario" name="DataNascimentoUsuario" value="<?php echo $rowUsuario['datanascimento'] ?>" readonly="readonly"></th>
										<th><input class="form-control" style='width: 100%' type="text" id="cidadeUsuario" name="cidadeUsuario" value="<?php echo $rowUsuario['cidadenascimento'] ?>" readonly="readonly"></th>
										<th><input class="form-control" style='width: 100%' type="text" id="estadoUsuario" name="estadoUsuario" value="<?php echo $rowUsuario['estadonascimento'] ?>" readonly="readonly"></th>
										<th><input class="form-control" style='width: 100%' type="text" id="estadoCivilUsuario" name="estadoCivilUsuario" value="<?php echo $rowUsuario['estadocivil'] ?>" readonly="readonly"></th>
									</tr>
									<tr>
										<td><label>e-mail</label></td>
									</tr>
									<tr align="left">
										<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="email" id="emailUsuario" name="emailUsuario" value="<?php echo $rowUsuario['email'] ?>" readonly="readonly"></th>
									</tr>
									<tr>
										<td colspan="2"><label>Tipo de usuario</label></td>
										<td colspan="2"><label>Senha</label></td>
									</tr>
									<tr align="left">
										<td colspan="2"><input class="form-control" style='width: 100%' type="email" id="tipoUsuario" name="tipoUsuario" value="<?php echo $rowUsuario['tipousuario'] ?>" readonly="readonly"></td>
										<td colspan="2"><input class="form-control" style='width: 100%' type="password" id="senhaUsuario" name="senhaUsuario" value="<?php echo $rowUsuario['senha'] ?>" required></td>
									</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Endereco</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2"><label>CEP</label></td>
								</tr>
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="cepUsuario" name="cepUsuario" value="<?php echo $rowUsuario['cep'] ?>" onkeypress="maskField(this, '#####-###')" maxlength="9" required></td>
								</tr>
								<tr>
									<td colspan="4"><label>Avenida ou Rua</label></td>
								</tr>
								<tr align="left">
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="ruaUsuario" name="ruaUsuario" value="<?php echo $rowUsuario['rua'] ?>" required></td>
								</tr>
								<tr>
									<td colspan="2"><label>Bairro</label></td>
									<td colspan="1"><label>Cidade</label></td>
									<td colspan="1"><label>Estado</label></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="bairroUsuario" name="bairroUsuario" value="<?php echo $rowUsuario['bairroendereco'] ?>" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="enderecoCidadeUsuario" name="enderecoCidadeUsuario" value="<?php echo $rowUsuario['cidadeendereco'] ?>" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="enderecoEstadoUsuario" name="enderecoEstadoUsuario" value="<?php echo $rowUsuario['estadoendereco'] ?>" required></td>
								</tr>
								<tr>
									<td><label>Tel. residencial</label></td>
									<td><label>Tel. celular</label></td>
									<td><label>Tel. para recado 1</label></td>
									<td><label>Tel. para recado 2</label></td>
								</tr>
								<tr align="left">
									<td><input class="form-control bfh-phone" style='width: 100%' type="text" id="telefoneResidencialUsuario" name="telefoneResidencialUsuario" value="<?php echo $rowUsuario['telefoneresidencial'] ?>" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="celularUsuario" name="celularUsuario" value="<?php echo $rowUsuario['celular'] ?>" onkeypress="maskField(this, '#####-####')" maxlength="10" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telefoneRecado1Usuario" name="telefoneRecado1Usuario" value="<?php echo $rowUsuario['telefonerecado1'] ?>" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telefoneRecado2Usuario" name="telefoneRecado2Usuario" value="<?php echo $rowUsuario['telefonerecado2'] ?>" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
								</tr>
								<tr>
									<td><label>Observacao</label></td>
								</tr>
								<tr align="left">
									<td colspan="4"><textarea class="form-control" style='width: 100%' class="form-control" rows="4" id="complementoUsuario" name="complementoUsuario"><?php echo $rowUsuario['complemento'] ?></textarea></td>
								</tr>
							</table>
						</fieldset>
						<div>
							<button class="btn btn-info" type="submit"><i class="icon-ok icon-large"></i>Atualizar</button>
							<a class="btn btn-success" href="administracao.php"><i class="icon-home home-icon"></i>Voltar</a>
						</div>
					</form>
                    </div>
				</div>
            </div>
		</div>
	</body>
</html>