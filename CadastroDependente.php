<?php
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/modelObject/ModelDependente.php';
	require_once 'business/dataAccessObject/DaoDependente.php';
	
	require_once 'business/modelObject/ModelAluno.php';
	require_once 'business/dataAccessObject/DaoAluno.php';

	require_once 'business/modelObject/ModelTurmaComAluno.php';
	require_once 'business/dataAccessObject/DaoTurmaComAluno.php';
		
	$session = new Session();
	$session->ValidaSessionUsuario();
		
	$dependente = new ModelDependente();
	$daoDependente = new DaoDependente();
	
	$cpfResponsavel = $session->getValueSession('cpfResponsavel');
	
	$dependente->setCpfDoResponsavel($cpfResponsavel);
	$dependente->setCpfDoDependente($_POST['cpfDoDependente']);
	$dependente->setRgDoDependente($_POST['rgDoDependente']);
	$dependente->setNome($_POST['nomeDoDependente']);
	$dependente->setDataNascimento($_POST['dataDeNascimentoDoDependente']);
	$dependente->setSexo($_POST['sexoDoDependente']);
	$dependente->setGrauDeParentesco($_POST['grauDeParentesco']);
	$dependente->setDeficiente($_POST['deficiente']);
	$dependente->setTipoDeficiencia($_POST['tipoDeficiencia']);
	$dependente->setEscolaridade($_POST['escolaridadeDoDependente']);
	$dependente->setSituacaoDoTrabalho($_POST['situacaoDoTrabalhoDependente']);
	$dependente->setRendaPessoal($_POST['rendaDoDependente']);
	$dependente->setProfissao($_POST['profissaoDoDependente']);
	$dependente->setObservacao($_POST['observacaoDoDependente']);
	
	$alunoDoBomCaminho = $_POST['alunoDoBomCaminho'];
	if($alunoDoBomCaminho == "NULL") {
		header("Location: newDependente.php?errorAlunoDoBomCaminho");
	}
	else if($alunoDoBomCaminho == "Sim") {
		$aluno = new ModelAluno();
		
		$aluno->setCpfResponsavel($dependente->getCpfDoResponsavel());
		
		$codigoAluno = substr(md5(uniqid(rand(), true)), 0, 6);
		$aluno->setCodigo(strtoupper($codigoAluno));

		$aluno->setNome($dependente->getNome());
		$aluno->setSexo($dependente->getSexo());
		$aluno->setDataNascimento($dependente->getDataNascimento());
		$aluno->setDeficiente($dependente->getDeficiente());
		$aluno->setTipoDeficiencia($dependente->getTipoDeficiencia());
		$aluno->setObservacao($dependente->getObservacao());
		$aluno->setCalca('0');
		$aluno->setCamiseta('0');
		$aluno->setVestido('0');
		$aluno->setCalcado('0');
		
		$daoAluno = new DaoAluno();
		if ($daoAluno->insert($aluno)) {
			$daoDependente->insert($dependente);
			
			$turmaComAluno = new ModelTurmaComAluno();
			$turmaComAluno->setNomeTurma($_POST['nomeTurma']);
			$turmaComAluno->setNomeEducador($_POST['nomeDoEducador']);
			$turmaComAluno->setNomeAluno($aluno->getNome());
			$turmaComAluno->setCpfDoResponsavel($aluno->getCpfResponsavel());
			
			$turmaComAluno->setFalta('0');
			$turmaComAluno->setStatus('0');
			
			$daoTurmaComAluno = new DaoTurmaComAluno();
			$daoTurmaComAluno->insert($turmaComAluno);
			
			header("Location: newDependente.php?success");
			
		} else {
			header("Location: newDependente.php?error");
		}
	}
	else {
		if ($daoDependente->insert($dependente)) {
			header("Location: newDependente.php?success");
		}
		else {
			header("Location: newDependente.php?error");
		}
	}

?>