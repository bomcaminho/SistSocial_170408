<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	require_once 'business/dataAccessObject/DaoFamilia.php';
	
	
	require_once 'business/comuns/notification/Notification.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$daoFamilia = new DaoFamilia();
	$rowFamilia = mysql_fetch_assoc($daoFamilia->selectById($_GET['id']));

	$session->setValueSession('cpfResponsavel', $rowFamilia['cpfDoResponsavel']);
	$session->setValueSession('nomeResponsavel', $rowFamilia['nomeDoResponsavel']);
	
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
                      	<li class="active">Familia</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="page-header position-relative">
                        <h1>
                        	Familia Assistida
                        	<i class="icon-double-angle-right"></i>
                            <small><?php echo $rowFamilia['nomeDoResponsavel'] ?></small>
                        </h1>
                    </div>
                    <div>
					<form action="CadastroFamilia.php" method="post" id="formCadFamilia" name="formCadFamilia">
						<fieldset class="fieldset">
							<legend class="legend">Dados do Sistema</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2"><label>Tipo de Cadastrado</label></td>
									<td colspan="2"><label>Data do Cadastrado</label></td>
								</tr>
								<tr align="left">
									<th colspan="2"><input class="form-control" style='width: 100%' type="text" id="tipoDeCadastrado" name="tipoDeCadastrado" value="<?php echo $rowFamilia['tipoDeCadastrado'] ?>" readonly="readonly"/></th>
									<th colspan="2"><input class="form-control" style='width: 100%' type="text" id="dataDoCastrado" name="dataDoCastrado" value="<?php echo $rowFamilia['dataDoCastrado'] ?>" readonly="readonly"/></th>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Dados do Pessoais</legend>	
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="1"><label>CPF</label></td>
									<td colspan="1"><label>RG</label></td>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="cpfDoResponsavel" name="cpfDoResponsavel" value="<?php echo $rowFamilia['cpfDoResponsavel'] ?>" readonly="readonly"/></th>
									<th><input class="form-control" style='width: 100%' type="text" id="rgDoResponsavel" name="rgDoResponsavel" value="<?php echo $rowFamilia['rgDoResponsavel'] ?>" readonly="readonly"></th>
								</tr>
								<tr>
									<td colspan="3"><label>Nome Completo</label></td>
									<td colspan="1"><label>Sexo</label></td>
								</tr>
								<tr align="left">
									<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeDoResponsavel" name="nomeDoResponsavel" value="<?php echo $rowFamilia['nomeDoResponsavel'] ?>"></th>
									<th colspan="1"><input class="form-control" style='width: 100%' type="text" id="sexoDoResponsavel" name="sexoDoResponsavel" value="<?php echo $rowFamilia['sexoDoResponsavel'] ?>"></th>
								</tr>
								<tr>
									<td colspan="1"><label>Data Nascimento</label></td>
									<td colspan="1"><label>Cidade</label></td>
									<td colspan="1"><label>Estado</label></td>
									<td colspan="1"><label>Estado Civil</label></td>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="dataDeNascimentoDoResponsavel" name="dataDeNascimentoDoResponsavel" value="<?php echo $rowFamilia['dataDeNascimentoDoResponsavel'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="cidadeDeNascimentoDoResponsavel" name="cidadeDeNascimentoDoResponsavel" value="<?php echo $rowFamilia['cidadeDeNascimentoDoResponsavel'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoDeNascimentoDoResponsavel" name="estadoDeNascimentoDoResponsavel" value="<?php echo $rowFamilia['estadoDeNascimentoDoResponsavel'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoCivilDoResponsavel" name="estadoCivilDoResponsavel" value="<?php echo $rowFamilia['estadoCivilDoResponsavel'] ?>"></th>
								</tr>
								<tr>
									<td colspan="2"><label>Etnia</label></td>
									<td colspan="2"><label>Religiao</label></td>
								</tr>
								<tr>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="etniaDoResponsavel" name="etniaDoResponsavel" value="<?php echo $rowFamilia['etniaDoResponsavel'] ?>"></th>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="religiaoDoResponsavel" name="religiaoDoResponsavel" value="<?php echo $rowFamilia['religiaoDoResponsavel'] ?>"></th>
								</tr>
								<tr>
									<td colspan="4"><label>e-mail</label></td>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="e-mailDoResponsavel" name="e-mailDoResponsavel" value="<?php echo $rowFamilia['emailDoResponsavel'] ?>"></th>
								</tr>
								<tr>
									<td colspan="4"><label>Escolaridade</label></td>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="escolaridadeDoResponsavel" name="escolaridadeDoResponsavel" value="<?php echo $rowFamilia['escolaridadeDoResponsavel'] ?>"></th>
								</tr>
								<tr>
									<td colspan="2"><label>Situacao de Trabalho</label></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="situacaoDoTrabalhoDoResponsavel" name="situacaoDoTrabalhoDoResponsavel" value="<?php echo $rowFamilia['situacaoDoTrabalhoDoResponsavel'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="rendaPessoalDoResponsavel" name="rendaPessoalDoResponsavel" value="<?php echo $rowFamilia['rendaPessoalDoResponsavel'] ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><label>Profissao</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="profissaoDoResponsavel" name="profissaoDoResponsavel" value="<?php echo $rowFamilia['profissaoDoResponsavel'] ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><label>Observacao</label></td>
								</tr>
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="observacaoDoResponsavel" name="observacaoDoResponsavel"><?php echo $rowFamilia['observacaoDoResponsavel'] ?></textarea></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Endereco</legend>	
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td><label>CEP</label></td>
								</tr>
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="cepDaFamilia" name="cepDaFamilia" value="<?php echo $rowFamilia['cepDaFamilia'] ?>"></td>
								</tr>
								<tr>
									<td><label>Avenida ou Rua</label></td>
								</tr>
								<tr align="left">
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="ruaDaFamilia" name="ruaDaFamilia" value="<?php echo $rowFamilia['ruaDaFamilia'] ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><label>Bairro</label></td>
									<td><label>Cidade</label></td>
									<td><label>Estado</label></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="bairroDaFamilia" name="bairroDaFamilia" value="<?php echo $rowFamilia['bairroDaFamilia'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="cidadeDaFamilia" name="cidadeDaFamilia" value="<?php echo $rowFamilia['cidadeDaFamilia'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="estadoDaFamilia" name="estadoDaFamilia" value="<?php echo $rowFamilia['estadoDaFamilia'] ?>" disabled></td>
								</tr>
								<tr>
									<td><label>Tel. residencial</label></td>
									<td><label>Tel. celular</label></td>
									<td><label>Tel. para recado 1</label></td>
									<td><label>Tel. para recado 2</label></td>
								</tr>
								<tr align="left">
									<td><input class="form-control" style='width: 100%' type="text" id="telResidencial" name="telResidencial" value="<?php echo $rowFamilia['telResidencial'] ?>" disabled></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telCelular" name="telCelular" value="<?php echo $rowFamilia['telCelular'] ?>" disabled></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telRecado1" name="telRecado1" value="<?php echo $rowFamilia['telRecado1'] ?>" disabled></td>
									<td><input class="form-control" style='width: 100%' type="text" id="telRecado2" name="telRecado2" value="<?php echo $rowFamilia['telRecado2'] ?>"></td>
								</tr>
								<tr align="left">
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="4" id="pontoDeReferencia" name="pontoDeReferencia"><?php echo $rowFamilia['pontoDeReferencia'] ?></textarea></td>
								</tr>
						</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Dados Conjuge</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="1"><label>CPF</label></td>
									<td colspan="1"><label>RG</label></td>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="cpfDoConjuge" name="cpfDoConjuge" value="<?php echo $rowFamilia['cpfDoConjuge'] ?>"/></th>
									<th><input class="form-control" style='width: 100%' type="text" id="rgDoConjuge" name="rgDoConjuge" value="<?php echo $rowFamilia['rgDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="3"><label>Nome Completo</label></td>
									<td colspan="1"><label>Sexo</label></td>
								</tr>
								<tr align="left">
									<th colspan="3"><input class="form-control" style='width: 100%' type="text" id="nomeDoConjuge" name="nomeDoConjuge" value="<?php echo $rowFamilia['nomeDoConjuge'] ?>"></th>
									<th colspan="1"><input class="form-control" style='width: 100%' type="text" id="sexoDoConjuge" name="sexoDoConjuge" value="<?php echo $rowFamilia['sexoDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="1"><label>Data Nascimento</label></td>
									<td colspan="1"><label>Cidade</label></td>
									<td colspan="1"><label>Estado</label></td>
									<td colspan="1"><label>Estado Civil</label></td>
								</tr>
								<tr align="left">
									<th><input class="form-control" style='width: 100%' type="text" id="dataDeNascimentoDoConjuge" name="dataDeNascimentoDoConjuge" value="<?php echo $rowFamilia['dataDeNascimentoDoConjuge'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="cidadeDeNascimentoDoResponsavel" name="cidadeDeNascimentoDoConjuge" value="<?php echo $rowFamilia['cidadeDeNascimentoDoConjuge'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoDeNascimentoDoResponsavel" name="estadoDeNascimentoDoConjuge" value="<?php echo $rowFamilia['estadoDeNascimentoDoConjuge'] ?>"></th>
									<th><input class="form-control" style='width: 100%' type="text" id="estadoCivilDoResponsavel" name="estadoCivilDoConjuge" value="<?php echo $rowFamilia['estadoCivilDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="2"><label>Etnia</label></td>
									<td colspan="2"><label>Religiao</label></td>
								</tr>
								<tr>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="etniaDoConjuge" name="etniaDoConjuge" value="<?php echo $rowFamilia['etniaDoConjuge'] ?>"></th>
									<th colspan="2" align="left"><input class="form-control" style='width: 100%' type="text" id="religiaoDoConjuge" name="religiaoDoConjuge" value="<?php echo $rowFamilia['religiaoDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="4"><label>e-mail</label></td>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="e-mailDoConjuge" name="e-mailDoConjuge" value="<?php echo $rowFamilia['emailDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="4"><label>Escolaridade</label></td>
								</tr>
								<tr align="left">
									<th colspan="4" align="left"><input class="form-control" style='width: 100%' type="text" id="escolaridadeDoConjuge" name="escolaridadeDoConjuge" value="<?php echo $rowFamilia['escolaridadeDoConjuge'] ?>"></th>
								</tr>
								<tr>
									<td colspan="2"><label>Situacao de Trabalho</label></td>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="situacaoDoTrabalhoDoConjuge" name="situacaoDoTrabalhoDoConjuge" value="<?php echo $rowFamilia['situacaoDoTrabalhoDoConjuge'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="rendaPessoalDoConjuge" name="rendaPessoalDoConjuge" value="<?php echo $rowFamilia['rendaPessoalDoConjuge'] ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><label>Profissao</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="profissaoDoConjuge" name="profissaoDoConjuge" value="<?php echo $rowFamilia['profissaoDoConjuge'] ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><label>Observacao</label></td>
								</tr>
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="observacaoDoConjuge" name="observacaoDoConjuge"><?php echo $rowFamilia['observacaoDoConjuge'] ?></textarea></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Moradia</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2"><label>Situacao da Residencia</label></td>
									<td colspan="1"><label>Tipo de Residencia</label></td>
									<td colspan="1"><label>Tipo de construcao</label></td>
								</tr>
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="situacaoDaResidencia" name="situacaoDaResidencia" value="<?php echo $rowFamilia['situacaoDaResidencia'] ?>"></td>								
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="tipoDeResidencia" name="tipoDeResidencia" value="<?php echo $rowFamilia['tipoDeResidencia'] ?>"></td>								
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="tipoDeConstrucao" name="tipoDeConstrucao" value="<?php echo $rowFamilia['tipoDeConstrucao'] ?>"></td>								
								</tr>
								<tr>
									<td colspan="2"><label>Quantos comodos</label></td>
									<td colspan="1"><label>Valor da Prestacao</label></td>
									<td colspan="1"><label>Qts pessoas moram</label></td>
								</tr>
								<tr>	
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="quantosComodos" name="quantosComodos" value="<?php echo $rowFamilia['quantosComodos'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="valorDaPrestacao" name="valorDaPrestacao" value="<?php echo $rowFamilia['valorDaPrestacao'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="quantasPessoasMoram" name="quantasPessoasMoram" value="<?php echo $rowFamilia['quantasPessoasMoram'] ?>"></td>								
								</tr>
								<tr>
									<td colspan="2"><label>Agua</label></td>
									<td colspan="1"><label>Iluminacao</label></td>
									<td colspan="1"><label>Esgoto</label></td>
								</tr>
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="tipoDeAgua" name="tipoDeAgua" value="<?php echo $rowFamilia['tipoDeAgua'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="tipoDeIluminacao" name="tipoDeIluminacao" value="<?php echo $rowFamilia['tipoDeIluminacao'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="tipoDeEsgoto" name="tipoDeEsgoto" value="<?php echo $rowFamilia['tipoDeEsgoto'] ?>"></td>
								</tr>
								<tr>
									<td colspan="4"><label>Esta cadastrada em algum plano de moradia</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="cadastradaPlanoDeMoradia" name="cadastradaPlanoDeMoradia" value="<?php echo $rowFamilia['cadastradaPlanoDeMoradia'] ?>"></td>
								</tr>			
								<tr>
									<td colspan="4"><label>Se terreno e invadido tem previsao de mudanca de local</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="previcaoDeMudancaDoLocal" name="previcaoDeMudancaDoLocal" value="<?php echo $rowFamilia['cadastradaPlanoDeMoradia'] ?>"></td>
								</tr>			
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Orcamento Familiar</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="4" style="color: blue;"><small>Rendimentos  (R$0,00)</small></td>
								</tr>
								<tr>
									<td colspan="1"><label>Renda Propria</label></td>
									<td colspan="1"><label>Renda Conjuge</label></td>
									<td colspan="1"><label>Bolsa</label></td>
									<td colspan="1"><label>Ajuda Familiar</label></td>
								</tr>								
								<tr>
									<td><input class="form-control" style="width: 100%" type="text" id="rendaPropria" name="rendaPropria" value="<?php echo $rowFamilia['rendaPropria'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="rendaConjuge" name="rendaConjuge" value="<?php echo $rowFamilia['rendaConjuge'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="bolsa" name="bolsa" value="<?php echo $rowFamilia['bolsa'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="ajudaFamiliar" name="ajudaFamiliar" value="<?php echo $rowFamilia['ajudaFamiliar'] ?>"></td>
								</tr>
								<tr>
									<td colspan="1"><label>Outros 1</label></td>
									<td colspan="1"><label>Outros 2</label></td>
									<td colspan="2"><label>Renda Total (R$0,00)</label></td>
								</tr>								
								<tr>
									<td><input class="form-control" style='width: 100%' type="text" id="outros1" name="outros1" value="<?php echo $rowFamilia['outros1'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="outros2" name="outros2" value="<?php echo $rowFamilia['outros2'] ?>"></td>
									<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="rendaTotal" value="<?php echo $rowFamilia['rendaTotal'] ?>"></td>
								</tr>
								<tr>
									<td colspan="4" style="color: red;"><small>Despesas (R$0,00)</small></td>
								</tr>
								<tr>
									<td colspan="1"><label>Agua</label></td>
									<td colspan="1"><label>Luz</label></td>
									<td colspan="1"><label>Alimentacao</label></td>
									<td colspan="1"><label>Aluguel</label></td>
								</tr>								
								<tr>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoAgua" name="gastoAgua" value="<?php echo $rowFamilia['gastoAgua'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoLuz" name="gastoLuz" value="<?php echo $rowFamilia['gastoLuz'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoAlimentacao" name="gastoAlimentacao" value="<?php echo $rowFamilia['gastoAlimentacao'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoAluguel" name="gastoAluguel" value="<?php echo $rowFamilia['gastoAluguel'] ?>"></td>
								</tr>
								<tr>
									<td colspan="1"><label>Medicamento</label></td>
									<td colspan="1"><label>Diversos</label></td>
									<td colspan="2"><label>Despesas Total (R$0,00)</label></td>
								</tr>								
								<tr>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoMedicamento" name="gastoMedicamento" value="<?php echo $rowFamilia['gastoMedicamento'] ?>"></td>
									<td><input class="form-control" style='width: 100%' type="text" id="gastoDiversos" name="gastoDiversos" value="<?php echo $rowFamilia['gastoDiversos'] ?>"></td>
									<td colspan="2"><input class="form-control" style="width: 100%" type="text" id="despesasTotal" name="despesasTotal" value="<?php echo $rowFamilia['despesasTotal'] ?>"></td>
								</tr>
							</table>
						</fieldset>		
						<fieldset class="fieldset">
							<legend class="legend">Saude</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="2"><label>UBS de Atendimento</label></td>
									<td colspan="2"><label>Area de abrangencia (cor)</label></td>
								</tr>								
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="ubsDeAtendimento" name="ubsDeAtendimento" value="<?php echo $rowFamilia['ubsDeAtendimento'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="areaDeAbrangencia" name="areaDeAbrangencia" value="<?php echo $rowFamilia['areaDeAbrangencia'] ?>"></td>
								</tr>

								<tr>
									<td colspan="1"><label>Tem usuarios de alcool?</label></td>
									<td colspan="1"><label>Tem usuarios de drogas?</label></td>
									<td colspan="2"><label>Tem viciacoes de jogo no lar?</label></td>
								</tr>
								<tr>
									<td colspan="1"><input class="form-control" style="width: 100%" type="text" id="usuarioDeAlcool" name="usuarioDeAlcool" value="<?php echo $rowFamilia['usuarioDeAlcool'] ?>" ></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="usuarioDeDroga" name="usuarioDeDroga" value="<?php echo $rowFamilia['usuarioDeDroga'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="viciacoesDeJogos" name="viciacoesDeJogos" value="<?php echo $rowFamilia['viciacoesDeJogos'] ?>"></td>
								</tr>
								<tr>
									<td colspan="4"><label>Tem algum com transtorno mental?</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="transtornoMental" name="transtornoMental" value="<?php echo $rowFamilia['viciacoesDeJogos'] ?>"></td>
								</tr>

								<tr>
									<td colspan="4"><label>Tem algum familiar realizando tratamento medico?</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="tratamentoMedico" name="tratamentoMedico" value="<?php echo $rowFamilia['tratamentoMedico'] ?>"></td>
								</tr>
							</table>
						</fieldset>	
						<fieldset class="fieldset">
							<legend class="legend">Informacoes Social</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr align="left">
									<td colspan="1"><label><small>Tem familiar reclusao</small></label></td>
									<td colspan="2"><label><small>Passou ou passa violencia domestica?</small></label></td>
									<td colspan="1"><label><small>Tem familiar assassinada?</small></label></td>
								</tr>
								<tr>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="familiarReclusao" name="familiarReclusao" value="<?php echo $rowFamilia['familiarReclusao'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="violenciaDomestica" name="violenciaDomestica" value="<?php echo $rowFamilia['violenciaDomestica'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="familiarAssassinada" name="familiarAssassinada" value="<?php echo $rowFamilia['familiarAssassinada'] ?>"></td>
								</tr>
								<tr>
									<td colspan="4"><label>Tem filhos com dificuldades na escola?</label></td>
								</tr>
								<tr>
									<td colspan="4"><input class="form-control" style='width: 100%' type="text" id="filhoDificuldadeNaEscola" name="filhoDificuldadeNaEscola" value="<?php echo $rowFamilia['familiarAssassinada'] ?>"></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Servicos Desejado</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<th colspan="2"><label>Assistencia social</label></th>
									<th colspan="1"><label>Visita domiciliar</label></th>
									<th colspan="1"><label>Cesta basica</label></th>
								</tr>
								<tr align="left">
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="assistenciaSocial" name="assistenciaSocial" value="<?php echo $rowFamilia['assistenciaSocial'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="visitaDomiciliar" name="visitaDomiciliar" value="<?php echo $rowFamilia['visitaDomiciliar'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="cestaBasica" name="cestaBasica" value="<?php echo $rowFamilia['cestaBasica'] ?>"></td>
								</tr>
								<tr>
									<th colspan="2"><label>Grupo de gestante</label></th>
									<th colspan="1"><label>Educacao infantil</label></th>
									<th colspan="1"><label>Educacao juvenil</label></th>
								</tr>
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="grupoDeGestante" name="grupoDeGestante" value="<?php echo $rowFamilia['grupoDeGestante'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="educacaoInfantil" name="educacaoInfantil" value="<?php echo $rowFamilia['educacaoInfantil'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="educacaoJuvenil" name="educacaoJuvenil" value="<?php echo $rowFamilia['educacaoJuvenil'] ?>"></td>
								</tr>
								<tr>
									<th colspan="2"><label>Grupo corujinha</label></th>
									<th colspan="1"><label>Grupo de mulheres</label></th>
									<th colspan="1"><label>Terapia</label></th>
								</tr>								
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="grupoCorujinha" name="grupoCorujinha" value="<?php echo $rowFamilia['grupoCorujinha'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="grupoDeMulheres" name="grupoDeMulheres" value="<?php echo $rowFamilia['grupoDeMulheres'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="terapia" name="terapia" value="<?php echo $rowFamilia['terapia'] ?>"></td>
								</tr>
								<tr>
									<th colspan="2"><label>Procura emprego</label></th>
									<th colspan="1"><label>Procura curso</label></th>
									<th colspan="1"><label>Conselho Tutelar</label></th>
								</tr>
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="procuraEmprego" name="procuraEmprego" value="<?php echo $rowFamilia['procuraEmprego'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="procuraCurso" name="procuraCurso" value="<?php echo $rowFamilia['procuraCurso'] ?>"></td>
									<td colspan="1"><input class="form-control" style='width: 100%' type="text" id="conselhoTutelar" name="conselhoTutelar" value="<?php echo $rowFamilia['conselhoTutelar'] ?>"></td>
								</tr>
								<tr>
									<th colspan="2"><label>Poupatempo</label></th>
									<th colspan="2"><label>Juridicial</label></th>
								</tr>
								<tr>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="poupaTempo" name="poupaTempo" value="<?php echo $rowFamilia['poupaTempo'] ?>"></td>
									<td colspan="2"><input class="form-control" style='width: 100%' type="text" id="juridicial" name="juridicial" value="<?php echo $rowFamilia['juridicial'] ?>"></td>
								</tr>
							</table>
						</fieldset>
						<fieldset class="fieldset">
							<legend class="legend">Observacoes</legend>
							<table class="table-condensed" style="width: 650px;">
								<tr>
									<td colspan="4"><textarea class="form-control" style='width: 100%' rows="3" id="obervacaoDiversos" name="obervacaoDiversos"><?php echo $rowFamilia['obervacaoDiversos'] ?></textarea></td>
								</tr>
							</table>
						</fieldset>
						<div>
							<a class="btn btn-info" href="listaDependentes.php"><i class="glyphicon glyphicon-chevron-right" ></i>Proximo Pagina</a>
						</div>
				</form>
                    </div>
				</div>
            </div>
		</div>
	</body>
</html>