<?php
	require_once 'business/dataAccessObject/DaoTurmaComAluno.php';

	$daoTurmaComAluno = new DaoTurmaComAluno();
	$row = mysql_fetch_assoc($daoTurmaComAluno->selectAlunoPorCodigo($_GET['id']));
	
	$daoTurmaComAluno->updateFalta($_GET['id'], $row['faltas'] + 1);
	header('Location: listaTurmaComAlunos.php?id='.$row['nometurma'].'');
?>