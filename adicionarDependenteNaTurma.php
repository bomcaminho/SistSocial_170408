<?php
	require_once 'business/dataAccessObject/turma/TurmaDaoObject.php';
	require_once 'business/dataAccessObject/DaoTurma.php';
	
	$daoTurma = new DaoTurma();

	$turmaDaoObject = new TurmaDaoObject();
	$turma = $turmaDaoObject->getTurma(mysql_fetch_assoc($daoTurma->selectByIdade(date('Y') - $_GET['AnoNasc'])));
	
	echo '
		<fieldset class="fieldset">
			<legend class="legend">Turma</legend>
				<table class="table-condensed" style="width: 650px">
				<tr>
					<td><label>Nome da Turma</label></td>
				</tr>
				<tr>
					<td><input class="form-control" style="width: 100%" type="text" id="nomeTurma" name="nomeTurma" value="'.$turma->getNomeTurma().'" readonly="readonly"/></td>
				</tr>
				<tr>
					<td><label>Educador</label></td>
				</tr>
				<tr>
					<td><input class="form-control" style="width: 100%" type="text" id="nomeDoEducador" name="nomeDoEducador" value="'.$turma->getNomeDoEducador().'" readonly="readonly"/></td>
				</tr>
			</table>			
		</fieldset>
	';
?>