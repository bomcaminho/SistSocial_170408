<?php
	require_once 'business/dataAccessObject/DaoTurmaComAluno.php';

	$daoTurmaComAluno = new DaoTurmaComAluno();
	$row = mysql_fetch_assoc($daoTurmaComAluno->selectAlunoPorCodigo($_GET['id']));
	
	if ($row['faltas'] > 0) {
		$daoTurmaComAluno->updateFalta($_GET['id'], $row['faltas'] - 1);
	}
	header('Location: listaTurmaComAlunos.php?id='.$row['nometurma'].'');
?>