<?php
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoFamilia.php';
	require_once 'business/pdf/mpdf60/mpdf.php';

  	$mpdf=new mPDF();
  	$mpdf->allow_charset_conversion = true;
  	$mpdf->charset_in = "ISO-8859-1";
  	
  	$mpdf->SetTitle('Dina');
  	
  	$teste = file_get_contents('css/StyleFormularioDeImpressao.css');
  	
  	$mpdf->WriteHTML($teste, 1);
  	
  	$mpdf->WriteHTML('
  		<table class="header" width="650px" border="0" cellspacing="3">
  			<tr>
				<td><img src="assets/img/logo.png" width="130" height="70"></td>
				<td align="center">Formul�rio de Fam�lia Assistida</td>
			</tr>
  		</table>
  		<br>
  		<br>
  	');
  	
  	$mpdf->WriteHTML('
		<table class="table" width="650px" border="0" cellspacing="3">
			<tr>
				<td class="label">Tipo de Cadastrado</td>
				<td class="label">Data do Cadastrado</td>
			</tr>
			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
			</tr>
  				<tr bgcolor="#678EB9">
					<td class="legend" colspan="4">Dados Pessoais</td>
  				</tr>
  			<tr>
				<td class="label">CPF</td>
				<td class="label">RG</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="3">Nome</td>
				<td class="label">Sexo</td>
  			</tr>
  			<tr>
				<td class="text" colspan="3" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Data Nascimento</td>
				<td class="label">Cidade</td>
  				<td class="label">Estado</td>
  				<td class="label">Estado Civil</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">E-mail</td>
				<td class="label" colspan="1">Etnia</td>
  				<td class="label" colspan="1">Religi�o</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Escolaridade</td>
				<td class="label">Situa��o de Trabalho</td>
  				<td class="label">Profiss�o</td>
  				<td class="label">Renda Pessoal</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Observa��o</td>
  			</tr>
			<tr>
				<td colspan="4" bgcolor="#E8E8E8" height="70"></td>
			</tr>
			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Endere�o</td>
			</tr>
			<tr>
				<td class="label">CEP</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Avenida ou Rua</td>
  			</tr>
  			<tr>
  				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">Bairro</td>
				<td class="label" colspan="1">Cidade</td>
  				<td class="label" colspan="1">Estado</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Tel. Residencial</td>
				<td class="label">Tel. Celular</td>
  				<td class="label">Tel. para Recado 1</td>
  				<td class="label">Tel. para Recado 1</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Ponto de Refer�ncia</td>
  			</tr>
  			<tr>
				<td colspan="4" bgcolor="#E8E8E8" height="70"></td>
  			</tr>
			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Dados do Conjuge</td>
  			</tr>
  			<tr>
				<td class="label">CPF</td>
				<td class="label">RG</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="3">Nome</td>
				<td class="label">Sexo</td>
  			</tr>
  			<tr>
				<td class="text" colspan="3" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Data Nascimento</td>
				<td class="label">Cidade</td>
  				<td class="label">Estado</td>
  				<td class="label">Estado Civil</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">E-mail</td>
				<td class="label" colspan="1">Etnia</td>
  				<td class="label" colspan="1">Religi�o</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label">Escolaridade</td>
				<td class="label">Situa��o de Trabalho</td>
  				<td class="label">Profiss�o</td>
  				<td class="label">Renda Pessoal</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Observa��o</td>
  			</tr>
  			<tr>
				<td colspan="4" bgcolor="#E8E8E8" height="70"></td>
  			</tr>
  			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Moradia</td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">Situa��o da Resid�ncia</td>
				<td class="label" colspan="1">Tipo da Resid�ncia</td>
  				<td class="label" colspan="1">Tipo de Constru��o</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">Quantos comodos</td>
				<td class="label" colspan="1">Valor da Presta��o</td>
  				<td class="label" colspan="1">Qts pessoas moram</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">�gua</td>
				<td class="label" colspan="1">Ilumina��o</td>
  				<td class="label" colspan="1">Esgoto</td>
  			</tr>
  			<tr>
				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Est� cadastrada em algum plano de moradia</td>
  			</tr>
  			<tr>
				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">O terreno e invadido? Tem previs�o de mudan�a de local</td>
  			</tr>
  			<tr>
				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Or�amento Familiar</td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Renda Pr�pria</td>
				<td class="label" colspan="1">Renda Conjuge</td>
  				<td class="label" colspan="1">Bolsa</td>
  				<td class="label" colspan="1">Ajuda Familiar</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Outros 1</td>
				<td class="label" colspan="1">Outros 2</td>
  				<td class="label" colspan="2">Renda Total</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">�gua</td>
				<td class="label" colspan="1">Luz</td>
  				<td class="label" colspan="1">Alimenta��o</td>
  				<td class="label" colspan="1">Aluguel</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Medicamento</td>
				<td class="label" colspan="1">Diversos</td>
  				<td class="label" colspan="2">Despesas Total</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  			</tr>
  				<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Sa�de</td>
  			</tr>
  			<tr>
				<td class="label" colspan="2">UBS de Atendimento</td>
				<td class="label" colspan="2">�rea de abrang�ncia (cor)</td>
  			</tr>
  			<tr>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Tem usu�rios de alcool?</td>
				<td class="label" colspan="1">Tem usu�rios de drogas?</td>
  				<td class="label" colspan="2">Tem vicia��es de jogo no lar?</td>
  			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Tem algum com transtorno mental?</td>
			</tr>
  			<tr>
  				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Tem algum familiar realizando tratamento medico?</td>
			</tr>
  			<tr>
  				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
  				<td></td>
  			</tr>
  			
  			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Informa��es Sociais</td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Tem familiar reclus�o?</td>
				<td class="label" colspan="2">Passou ou passa viol�ncia domestica?</td>
				<td class="label" colspan="1">Deve familiar assassinada?</td>
  			</tr>
  			<tr>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="2" bgcolor="#E8E8E8"></td>
  				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Tem filhos com dificuldades na escola?</td>
  			</tr>
  			<tr>
  				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr bgcolor="#678EB9">
				<td class="legend" colspan="4">Servi�os Desejados</td>
			</tr>
  			<tr>
				<td class="label" colspan="1">Assist�ncia Social</td>
				<td class="label" colspan="1">Visita Domiciliar</td>
				<td class="label" colspan="1">Cesta B�sica</td>
				<td class="label" colspan="1">Grupo de Gestantes</td>
			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
			</tr>
  			<tr>
				<td class="label" colspan="1">Educa��o Infantil</td>
				<td class="label" colspan="1">Educa��o Juvenil</td>
				<td class="label" colspan="1">Grupo de Corujinha</td>
				<td class="label" colspan="1">Grupo de Mulheres</td>
			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
			</tr>
  			<tr>
				<td class="label" colspan="1">Terapia</td>
				<td class="label" colspan="1">Procura Emprego</td>
				<td class="label" colspan="1">Procura Curso</td>
				<td class="label" colspan="1">Conselho Tutelar</td>
			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
			</tr>
  			<tr>
				<td class="label" colspan="1">Poupatempo</td>
				<td class="label" colspan="1">Assist�ncia Judicial</td>
			</tr>
  			<tr>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
				<td class="text" colspan="1" bgcolor="#E8E8E8"></td>
			</tr>
		</table>
	');
  	
  	$mpdf->Output();
  	exit();
?>