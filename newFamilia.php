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
                        	Cadastrado
                        	<i class="icon-double-angle-right"></i>
                            <small>Familia Assistida</small>
                        </h1>
                    </div>
                    <div>
                   	<?php
    					if(isset($_GET['error'])) {
    						Notification::showError("Familia ja cadastrada com este Cpf.");
    					}
   					?>
					<form action="CadastroFamilia.php" method="post" id="formCadFamilia" name="formCadFamilia">
						<fieldset class="fieldset">
							<legend class="legend">Dados do Sistema</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<th colspan="2">
										<select class="form-control" style='width: 100%' id="tipoDeCadastrado" name="tipoDeCadastrado">
											<option value="NULL">Tipo de Cadastrado</option>
											<option value="Cadastrado">Cadastrado</option>
											<option value="Recadastramento">Recadastramento</option>
										</select>
									</th>
									<th colspan="2"><input class="form-control" style='width: 100%' type="text" id="dataDoCastrado" name="dataDoCastrado" placeholder="Data do Cadastrado" onkeypress="maskField(this, '##/##/####')" maxlength="10" required></th>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Dados do Pessoais</legend>	
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="cpfDoResponsavel" name="cpfDoResponsavel" placeholder="CPF" onkeypress="maskField(this, '###.###.###-##')" maxlength="14" required/></th>
									<th><input class="form-control" style='width: 100%' type="text" id="rgDoResponsavel" name="rgDoResponsavel" placeholder="RG" onkeypress="maskField(this, '##.###.###-#')" maxlength="12" required></th>
								</tr>
								<tr align="left">
									<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeDoResponsavel" name="nomeDoResponsavel" placeholder="Nome Completo" required></th>
									<th>
										<select class="form-control" style='width: 100%' id="sexoDoResponsavel" name="sexoDoResponsavel">
											<option value="NULL">Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Feminino">Feminino</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="dataDeNascimentoDoResponsavel" name="dataDeNascimentoDoResponsavel" placeholder="Data Nascimento" onkeypress="maskField(this, '##/##/####')" maxlength="10" required></th>
									<th><input class="form-control" style='width: 100%' type="text" id="cidadeDeNascimentoDoResponsavel" name="cidadeDeNascimentoDoResponsavel" placeholder="Cidade" required></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoDeNascimentoDoResponsavel" name="estadoDeNascimentoDoResponsavel" placeholder="Estado" required></th>
									<th>
										<select class="form-control" style='width: 100%' id="estadoCivilDoResponsavel" name="estadoCivilDoResponsavel">
											<option value="NULL">Estado Civil</option>
											<option value="Casado(a)">Casado(a)</option>
											<option value="Solteiro(a)">Solteiro(a)</option>
											<option value="Separado(a)">Separado(a)</option>
											<option value="Viúvo(a)">Viuvo(a)</option>
											<option value="União Estável">Uniao Estavel</option>
										</select>
									</th>
								</tr>
								<tr>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="etniaDoResponsavel" name="etniaDoResponsavel" placeholder="Etnia"></th>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="religiaoDoResponsavel" name="religiaoDoResponsavel" placeholder="Religiao"></th>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="e-mailDoResponsavel" name="e-mailDoResponsavel" placeholder="E-mail" required></th>
								</tr>
								<tr align="left">
								<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="escolaridadeDoResponsavel" name="escolaridadeDoResponsavel" placeholder="Escolaridade"></th>
								</tr>
								<tr align="left">
									<td colspan="2">
										<select class="form-control" id="situacaoDoTrabalhoDoResponsavel" name="situacaoDoTrabalhoDoResponsavel">
											<option value="NULL">Situacao de Trabalho</option>
											<option value="Trabalhando">Trabalhando</option>
											<option value="Desempregado">Desempregado</option>
											<option value="Licença">Licenca</option>
											<option value="Aposentado">Aposentado</option>
											<option value="Bico">Bico</option>
											<option value="Dor Lar">Dor Lar</option>
										</select>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="rendaPessoalDoResponsavel" name="rendaPessoalDoResponsavel" placeholder="Renda Pessoal" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="profissaoDoResponsavel" name="profissaoDoResponsavel" placeholder="Profissao"></td>
								</tr>
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="observacaoDoResponsavel" name="observacaoDoResponsavel" placeholder="Observacao"></textarea></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Endereco</legend>	
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="cepDaFamilia" name="cepDaFamilia" placeholder="CEP" onkeypress="maskField(this, '#####-###')" maxlength="9" required></td>
								</tr>
								<tr align="left">
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="ruaDaFamilia" name="ruaDaFamilia" placeholder="Avenida ou Rua" required></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="bairroDaFamilia" name="bairroDaFamilia" placeholder="Bairro" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="cidadeDaFamilia" name="cidadeDaFamilia" placeholder="Cidade" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="estadoDaFamilia" name="estadoDaFamilia" placeholder="Estado" required></td>
								</tr>
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="telResidencial" name="telResidencial" placeholder="Tel. residencial" onkeypress="maskField(this, '####-####')" maxlength="9" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telCelular" name="telCelular" placeholder="Tel. celular" onkeypress="maskField(this, '#####-####')" maxlength="10" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telRecado1" name="telRecado1" placeholder="Tel. para recado 1" onkeypress="maskField(this, '####-####')" maxlength="9" required></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telRecado2" name="telRecado2" placeholder="Tel. para recado 2" onkeypress="maskField(this, '####-####')" maxlength="9" required></td>
								</tr>
								<tr align="left">
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="4" id="pontoDeReferencia" name="pontoDeReferencia" placeholder="Ponto de Referencia" required></textarea></td>
								</tr>
						</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Dados Conjuge</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="cpfDoConjuge" name="cpfDoConjuge" placeholder="CPF" onkeypress="maskField(this, '###.###.###-##')" maxlength="14"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="rgDoConjuge" name="rgDoConjuge" placeholder="RG" onkeypress="maskField(this, '##.###.###-#')" maxlength="12"></th>
								</tr>
								<tr align="left">
									<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeDoConjuge" name="nomeDoConjuge" placeholder="Nome Completo"></th>
									<th>
										<select class="form-control" id="sexoDoConjuge" name="sexoDoConjuge" style="width: 182px">
											<option value="NULL">Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Feminino">Feminino</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="dataDeNascimentoDoConjuge" name="dataDeNascimentoDoConjuge" placeholder="Data Nascimento" onkeypress="maskField(this, '##/##/####')" maxlength="10"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="cidadeDeNascimentoDoConjuge" name="cidadeDeNascimentoDoConjuge" placeholder="Cidade"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoDeNascimentoDoConjuge" name="estadoDeNascimentoDoConjuge" placeholder="Estado"></th>
									<th>
										<select class="form-control" style='width: 100%' id="estadoCivilDoConjuge" name="estadoCivilDoConjuge">
											<option value="NULL">Estado Civil</option>
											<option value="Casado(a)">Casado(a)</option>
											<option value="Solteiro(a)">Solteiro(a)</option>
											<option value="Separado(a)">Separado(a)</option>
											<option value="Viúvo(a)">Viuvo(a)</option>
											<option value="União Estável">Uniao Estavel</option>
										</select>
									</th>
								</tr>
								<tr>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="etniaDoConjuge" name="etniaDoConjuge" placeholder="Etnia"></th>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="religiaoDoConjuge" name="religiaoDoConjuge" placeholder="Religiao"></th>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="escolaridadeDoConjuge" name="escolaridadeDoConjuge" placeholder="Escolaridade"></th>
								</tr>
								<tr align="left">
									<td colspan="2">
										<select class="form-control" id="situacaoDoTrabalhoDoConjuge" name="situacaoDoTrabalhoDoConjuge">
											<option value="NULL">Situacao de Trabalho</option>
											<option value="Trabalhando">Trabalhando</option>
											<option value="Desempregado">Desempregado</option>
											<option value="Licença">Licença</option>
											<option value="Aposentado">Aposentado</option>
											<option value="Bico">Bico</option>
											<option value="DorLar">Dor Lar</option>
										</select>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="rendaPessoalDoConjuge" name="rendaPessoalDoConjuge" placeholder="Renda Pessoal" onKeyPress="return(maskMoney(this,'.',',',event))">
									</td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="profissaoDoConjuge" name="profissaoDoConjuge" placeholder="Profissao"></td>
								</tr>
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="observaoDoConjuge" name="observaoDoConjuge" placeholder="Observacao"></textarea></td>
								</tr>
						</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Moradia</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2">
										<select class="form-control" style='width: 100%' id="situacaoDaResidencia" name="situacaoDaResidencia">
											<option value="NULL">Situacao da Residencia</option>
											<option value="Alugada">Alugada</option>
											<option value="Emprestada">Emprestada</option>
											<option value="Invadida">Invadida</option>
											<option value="Própria">Propria</option>
										</select>
									</td>
									<td colspan="2">
										<select class="form-control" style='width: 100%' id="tipoDeResidencia" name="tipoDeResidencia">
											<option value="NULL">Tipo de residencia</option>
											<option value="Apartamento">Apartamento</option>
											<option value="Barraco">Barraco</option>
											<option value="Casa">Casa</option>
										</select>
									</td>
								</tr>
								<tr>	
									<td colspan="2">
										<select class="form-control" style='width: 100%' id="tipoDeConstrucao" name="tipoDeConstrucao">
											<option value="NULL">Tipo de construcao</option>
											<option value="Alvenaria">Alvenaria</option>
											<option value="Madeira">Madeira</option>
											<option value="Misto">Misto</option>
										</select>										
									</td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="quantosComodos" name="quantosComodos" placeholder="Quantos comodos" required>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="valorDaPrestacao" name="valorDaPrestacao" placeholder="Valor da prestacao" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="quantasPessoasMoram" name="quantasPessoasMoram" placeholder="Quantas pessoas moram" required>
									</td>								
								</tr>
								<tr>
									<td>
										<select class="form-control" style='width: 100%' id="tipoDeAgua" name="tipoDeAgua">
											<option value="NULL">Agua</option>
											<option value="Encanada">Encanada</option>
											<option value="Emprestada">Emprestada</option>
											<option value="Poço">Poco</option>
										</select>
									</td>
									
									<td>
										<select class="form-control" style='width: 100%' id="tipoDeIluminacao" name="tipoDeIluminacao">
											<option value="NULL">Iluminacao</option>
											<option value="Eletropaulo">Eletropaulo</option>
											<option value="Gato">Gato</option>
											<option value="Emprestado">Emprestado</option>
										</select>
									</td>
									<td>
										<select class="form-control" style='width: 100%' id="tipoDeEsgoto" name="tipoDeEsgoto">
											<option value="NULL">Esgoto</option>
											<option value="Ar livre">Ar livre</option>
											<option value="Encanada">Encanada</option>
											<option value="Fossa">Fossa</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="4">
										<input class="form-control" style='width: 100%' type="text" id="cadastradaPlanoDeMoradia" name="cadastradaPlanoDeMoradia" placeholder="Esta cadastrada em algum plano de moradia" required>
									</td>
								</tr>			
								<tr>
									<td colspan="4">
										<input class="form-control" style='width: 100%' type="text" id="previcaoDeMudancaDoLocal" name="previcaoDeMudancaDoLocal" placeholder="Se terreno e invadido tem previsao de mudanca de local" required>
									</td>
								</tr>			
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Orcamento Familiar</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="4" style="color: blue;">Rendimentos  (R$0,00) </td>
								</tr>
								<tr>
									<td>
										<input class="form-control" style="width: 100%" type="text" id="rendaPropria" name="rendaPropria" placeholder="Renda Propria" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="rendaConjuge" name="rendaConjuge" placeholder="Renda Conjuge" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="bolsa" name="bolsa" placeholder="Bolsa" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="ajudaFamiliar" name="ajudaFamiliar" placeholder="Ajuda Familiar" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="outros1" name="outros1" placeholder="Outros 1" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="outros2" name="outros2" placeholder="Outros 2" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td colspan="2">
										<input class="form-control" style="width: 100%" type="text" id="rendaTotal" name="rendaTotal" placeholder="Renda Total (R$0,00)" onKeyPress="return(maskMoney(this,'.',',',event))">
									</td>
								</tr>
								<tr>
									<td colspan="4" style="color: red;">Despesas (R$0,00)</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoAgua" name="gastoAgua" placeholder="Agua" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoLuz" name="gastoLuz" placeholder="Luz" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoAlimentacao" name="gastoAlimentacao" placeholder="Alimentacao" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoAluguel" name="gastoAluguel" placeholder="Aluguel" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoMedicamento" name="gastoMedicamento" placeholder="Medicamentos" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="gastoDiversos" name="gastoDiversos" placeholder="Outros" onKeyPress="return(maskMoney(this,'.',',',event))" required>
									</td>
									
									<td colspan="2">
										<input class="form-control" style="width: 100%" type="text" id="despesasTotal" name="despesasTotal" placeholder="Despesas Total (R$0,00)" onKeyPress="return(maskMoney(this,'.',',',event))">
									</td>
								</tr>
							</table>
						</fieldset>		
						<fieldset class="fieldset">
							<legend class="legend">Saude</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="ubsDeAtendimento" name="ubsDeAtendimento" placeholder="UBS de Atendimento" required>
									</td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="areaDeAbrangencia" name="areaDeAbrangencia" placeholder="Area de abrangencia (cor)" required>
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem usuarios de alcool?</label></td>
									<td colspan="2">
										<input class="form-control" style="width: 100%" type="text" id="usuarioDeAlcool" name="usuarioDeAlcool" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem usuarios de drogas?</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="usuarioDeDroga" name="usuarioDeDroga" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem viciacoes de jogo no lar?</label></td>	
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="viciacoesDeJogos" name="viciacoesDeJogos" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem algum com transtorno mental?</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="transtornoMental" name="transtornoMental" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem algum familiar realizando tratamento medico?</label></td>
									<td>
										<input class="form-control" style='width: 100%' type="text" id="tratamentoMedico" name="tratamentoMedico" placeholder="Quem?" required>
									</td>
								</tr>
							</table>
						</fieldset>	
						<fieldset class="fieldset">
							<legend class="legend">Informacoes Social</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<td colspan="2"><label>Tem familiar reclusao</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="familiarReclusao" name="familiarReclusao" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Passou ou passa violencia domestica?</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="violenciaDomestica" name="violenciaDomestica" placeholder="">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem familiar assassinada?</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="familiarAssassinada" name="familiarAssassinada" placeholder="Quem?">
									</td>
								</tr>
								<tr>
									<td colspan="2"><label>Tem filhos com dificuldades na escola?</label></td>
									<td colspan="2">
										<input class="form-control" style='width: 100%' type="text" id="filhoDificuldadeNaEscola" name="filhoDificuldadeNaEscola" placeholder="Quem?">
									</td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Serviços Desejado</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<th colspan="3"><label>Assistencia social</label></th>
									<th>
										<select class="form-control" style='width: 100%' id="assistenciaSocial" name="assistenciaSocial">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Visita domiciliar</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="visitaDomiciliar" name="visitaDomiciliar">
											<option value="nao">Nao</option>	
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Cesta basica</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="cestaBasica" name="cestaBasica">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Grupo de gestante</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="grupoDeGestante" name="grupoDeGestante">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Educacao infantil</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="educacaoInfantil" name="educacaoInfantil">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Educacao juvenil</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="educacaoJuvenil" name="educacaoJuvenil">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Grupo corujinha</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="grupoCorujinha" name="grupoCorujinha">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Grupo de mulheres</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="grupoDeMulheres" name="grupoDeMulheres">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Terapia</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="terapia" name="terapia">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Procura emprego</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="procuraEmprego" name="procuraEmprego">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Procura curso</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="procuraCurso" name="procuraCurso">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
								<tr align="left">
									<th colspan="3"><label>Conselho Tutelar</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="conselhoTutelar" name="conselhoTutelar">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
									<tr align="left">
									<th colspan="3"><label>Poupatempo</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="poupaTempo" name="poupaTempo">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
									<tr align="left">
									<th colspan="3"><label>Juridicial</label></th>
									<th>
										<select class="form-control" style="width: 100%" id="juridicial" name="juridicial">
											<option value="nao">Nao</option>
											<option value="sim">Sim</option>
										</select>
									</th>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Observacoes</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="obervacaoDiversos" name="obervacaoDiversos" placeholder="Observacao"></textarea></td>
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