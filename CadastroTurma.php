<?php

	include_once 'business/modelObject/ModelTurma.php';
	include_once 'business/dataAccessObject/DaoTurma.php';

	$educador = explode(',', $_POST['educador']);
	
	$turma = new ModelTurma();
	$turma->setCpfEducador($educador[0]);
	$turma->setNomeDoEducador($educador[1]);
	$turma->setNomeTurma($_POST['nomeTurma']);
	$turma->setIdadeMinima($_POST['idadeMinima']);
	$turma->setIdadeMaxima($_POST['idadeMaxima']);
	
	$daoTurma = new DaoTurma();
	if ($daoTurma->insert($turma)) {
		header("Location: newTurma.php?success");
	}
	else {
		header("Location: newTurma.php?error");
	}
?>
