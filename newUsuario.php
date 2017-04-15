<?php 
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
                      	<li class="active">Novo Usuario</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Novo Usuario</small>
                        </h1>
                    </div>
                    <div>
                    	<?php
    						if(isset($_GET['error'])) {
								echo '
        							<div class="alert alert-block alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										<i class="icon-remove red"></i>
										Ja existe um usuario com este e-mail e cpf.
									</div>
        						';
							}
							if(isset($_GET['success'])){
								echo '
        							<div class="alert alert-block alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										<i class="icon-ok green"></i>
										Usuario cadastrado com sucesso.
									</div>
        						';
							}
    					?>
                    	<form action="CadastroUsuario.php" method="post" id="formCadUsuario" name="formCadUsuario">
							<fieldset class="fieldset">
								<legend class="legend">Dados do Pessoais</legend>
								<table class="table-condensed" style="width: 650px;">
									<tr align="left">
										<th><input class="form-control" style='width: 100%' type="text" id="cpfUsuario" name="cpfUsuario" placeholder="CPF" onkeypress="maskField(this, '###.###.###-##')" maxlength="14" required/></th>
										<th><input class="form-control" style='width: 100%' type="text" id="rgUsuario" name="rgUsuario" placeholder="RG" onkeypress="maskField(this, '##.###.###-#')" maxlength="12" required></th>
									</tr>
									<tr align="left">
										<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeUsuario" name="nomeUsuario" placeholder="Nome Completo" required></th>
										<th>
											<select class="form-control" id="sexoUsuario" name="sexoUsuario" style="width: 182px" required>
												<option value="NULL">Sexo</option>
												<option value="Masculino">Masculino</option>
												<option value="Feminino">Feminino</option>
											</select>
										</th>
									</tr>
									<tr align="left">
										<th><input class="form-control" style='width: 100%' type="text" id="DataNascimentoUsuario" name="DataNascimentoUsuario" placeholder="Data Nascimento" onkeypress="maskField(this, '##/##/####')" maxlength="10" required></th>
										<th><input class="form-control" style='width: 100%' type="text" id="cidadeUsuario" name="cidadeUsuario" placeholder="Cidade" required></th>
										<th><input class="form-control" style='width: 100%' type="text" id="estadoUsuario" name="estadoUsuario" placeholder="Estado" required></th>
										<th>
											<select class="form-control" style='width: 100%' id="estadoCivilUsuario" name="estadoCivilUsuario">
											<option value="NULL">Estado Civil</option>
											<option value="Casado(a)">Casado(a)</option>
											<option value="Solteiro(a)">Solteiro(a)</option>
											<option value="Separado(a)">Separado(a)</option>
											<option value="Viúvo(a)">Viúvo(a)</option>
											<option value="União Estável">União Estável</option>
											</select>
										</th>
									</tr>
									<tr align="left">
										<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="email" id="emailUsuario" name="emailUsuario" placeholder="E-mail" required></th>
									</tr>
									<tr align="left">
										<td colspan="2">
											<select class="form-control" style='width: 100%' id="tipoUsuario" name="tipoUsuario">
												<option value="NULL">Tipo de usuario</option>
												<option value="Administrador">Administrador</option>
												<option value="Assistente Social">Assistente Social</option>
												<option value="Educador">Educador</option>
												<option value="Padrinho">Padrinho</option>
											</select>
										</td>
										<td colspan="2"><input class="form-control" style='width: 100%' type="password" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" required></td>
									</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Endereco</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="cepUsuario" name="cepUsuario" placeholder="CEP" onkeypress="maskField(this, '#####-###')" maxlength="9" required></td>
								</tr>
								<tr align="left">
									<td colspan="3"><input class="form-control" style='width: 100%' type="text" id="ruaUsuario" name="ruaUsuario" placeholder="Avenida ou Rua" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="numeroUsuario" name="numeroUsuario" placeholder="Numero" required></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="bairroUsuario" name="bairroUsuario" placeholder="Bairro" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="enderecoCidadeUsuario" name="enderecoCidadeUsuario" placeholder="Cidade" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="enderecoEstadoUsuario" name="enderecoEstadoUsuario" placeholder="Estado" required></td>
								</tr>
								<tr align="left">
									<td><input class="form-control bfh-phone" style='width: 100%' type="text" id="telefoneResidencialUsuario" name="telefoneResidencialUsuario" placeholder="Tel. Residencial" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="celularUsuario" name="celularUsuario" placeholder="Tel. Celular" onkeypress="maskField(this, '#####-####')" maxlength="10" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telefoneRecado1Usuario" name="telefoneRecado1Usuario" placeholder="Tel. Recado 1" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telefoneRecado2Usuario" name="telefoneRecado2Usuario" placeholder="Tel. Recado 2" onkeypress="maskField(this, '####-####')" maxlength="9"></td>
								</tr>
								<tr align="left">
									<td colspan="4"><textarea class="form-control" style='width: 100%' class="form-control" rows="4" id="complementoUsuario" name="complementoUsuario" placeholder="Complemento"></textarea></td>
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