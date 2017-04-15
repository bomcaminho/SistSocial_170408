<?php

	require_once 'business/modelObject/ModelAluno.php';
	require_once 'business/dataAccessObject/DaoAluno.php';
	
	$aluno = new ModelAluno();
	
	$aluno->setCpfResponsavel("0000");
	$aluno->setCodigo($_POST['codigoAluno']);
	$aluno->setNome($_POST['nomeAluno']);
	$aluno->setSexo($_POST['sexoAluno']);
	$aluno->setDataNascimento($_POST['DataNascimentoAluno']);
	$aluno->setDeficiente($_POST['deficiente']);
	$aluno->setTipoDeficiencia($_POST['tipoDeficiencia']);
	$aluno->setObservacao($_POST['ObservacaoAluno']);
	$aluno->setCalca($_POST['calcaAluno']);
	$aluno->setCamiseta($_POST['camisetaAluno']);
	$aluno->setVestido($_POST['vestidoAluno']);
	$aluno->setCalcado($_POST['calcadoAluno']);

	$daoAluno = new DaoAluno();
	if ($daoAluno->insert($aluno)) {
		header("Location: newAluno.php?successCadastroAluno");
	}
	else {
		header("Location: newAluno.php?errorCadastroAluno");
	}
?>