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
				<td align="center">Formulário de Dependente</td>
			</tr>
  		</table>
  		<br>
  		<br>
  	');
  	
  	$mpdf->WriteHTML('
		<table class="table" width="650px" border="0" cellspacing="3">
  			</tr>
  				<tr bgcolor="#678EB9">
					<td class="legend" colspan="4">Dados do Dependente</td>
  				</tr>
  			<tr>
				<td class="label" colspan="2">Aluno do Bom Caminho</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="2"></td>
  			</tr>
  			<tr>
  				<td class="label" colspan="1">CPF</td>
				<td class="label" colspan="1">RG</td>
  				<td></td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td></td>
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
				<td class="label">Grau de Parentesco</td>
  				<td class="label">Deficiente</td>
  				<td class="label">Tipo de Deficiência</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Escolaridade</td>
  			</tr>
  			<tr>
				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Situação de Trabalho</td>
  				<td class="label" colspan="1">Profissão</td>
  				<td class="label" colspan="2">Renda Pessoal</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td class="text" bgcolor="#E8E8E8" colspan="2"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Observação</td>
  			</tr>
  			<tr>
				<td colspan="4" bgcolor="#E8E8E8" height="80"></td>
  			</tr>
  			  			</tr>
  				<tr bgcolor="#678EB9">
					<td class="legend" colspan="4">Dados do Dependente</td>
  				</tr>
  			<tr>
				<td class="label" colspan="2">Aluno do Bom Caminho</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="2"></td>
  			</tr>
  			<tr>
  				<td class="label" colspan="1">CPF</td>
				<td class="label" colspan="1">RG</td>
  				<td></td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td></td>
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
				<td class="label">Grau de Parentesco</td>
  				<td class="label">Deficiente</td>
  				<td class="label">Tipo de Deficiência</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8"></td>
				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  				<td class="text" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Escolaridade</td>
  			</tr>
  			<tr>
				<td class="text" colspan="4" bgcolor="#E8E8E8"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="1">Situação de Trabalho</td>
  				<td class="label" colspan="1">Profissão</td>
  				<td class="label" colspan="2">Renda Pessoal</td>
  			</tr>
  			<tr>
				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td class="text" bgcolor="#E8E8E8" colspan="1"></td>
  				<td class="text" bgcolor="#E8E8E8" colspan="2"></td>
  			</tr>
  			<tr>
				<td class="label" colspan="4">Observação</td>
  			</tr>
  			<tr>
				<td colspan="4" bgcolor="#E8E8E8" height="80"></td>
  			</tr>
		</table>
	');
  	
  	$mpdf->Output();
  	exit();
?>