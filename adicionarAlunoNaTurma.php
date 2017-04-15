<?php
	require_once 'business/dataAccessObject/DaoAluno.php';
	require_once 'business/dataAccessObject/DaoTurma.php';
	
	
	$daoAluno = new DaoAluno();
	$query = $daoAluno->selectAll();

	$daoTurma = new DaoTurma();
	$rowTurma = mysql_fetch_assoc($daoTurma->selectById($_GET['codigoTurma']));
	
echo '

	<fieldset class="fieldset">
		<legend class="legend">Turma</legend>
			<table class="table-condensed" style="width: 650px">
			<tr>
				<td><label>Nome da Turma</label></td>
			</tr>
			<tr>
				<td><input class="form-control" style="width: 100%" type="text" id="nomeTurma" name="nomeTurma" value="'.$rowTurma['nome'].'" readonly="readonly"/></td>
			</tr>
			<tr>
				<td><label>Educador</label></td>
			</tr>
			<tr>
				<td><input class="form-control" style="width: 100%" type="text" id="nomeDoEducador" name="nomeDoEducador" value="'.$rowTurma['nomeDoEducador'].'" readonly="readonly"/></td>
			</tr>
		</table>			
	</fieldset>
	<fieldset class="fieldset">
		<legend class="legend">Aluno</legend>
		<table class="table-condensed" style="width: 650px">
			<tr>
				<td>
					<input class="form-control" style="width: 100%" type="text" id="codigoAluno" name="codigoAluno" placeholder="Digite o codigo do aluno"/>
				</td>
				<td>
					<button class="btn btn-success btn-small" onclick="getDadosAlunos();"><i class="icon-search icon-large"></i>Procurar</button>
				</td>
			</tr>
			<tr>
				<td colspan="4"><span style="margin-left: 10px" id="nomeAluno"></span></td>
			</tr>
		</table>
	</fieldset>
	<button class="btn btn-info" id="cadastrar" name="cadastrar" onclick="getDadosAlunos();"><i class="icon-ok icon-large"></i>Cadastrar</button>							
';
					



	

?>