<?php
	require_once 'business/dataAccessObject/DaoFamilia.php';
	require_once 'business/dataAccessObject/DaoUsuario.php';
	require_once 'business/dataAccessObject/DaoAluno.php';
	require_once 'business/dataAccessObject/DaoDependente.php';
	
	$codigoID = $_GET['id'];

	switch($_GET['tp']) {
		case 'familia':
			$daoFamilia = new DaoFamilia();
			
			$row = mysql_fetch_assoc($daoFamilia->selectToCpf($codigoID));
			
			$daoDependente = new DaoDependente();
			$daoDependente->deleteAllFamilia($row['cpfDoResponsavel']);
			
			// Aluno
			
			
			$daoFamilia->deleteById($codigoID);
			header("Location: listaFamilias.php");
			break;
			
		case 'usuario':
			$daoUsuario = new DaoUsuario();
			$daoUsuario->deleteCodigoID($codigoID);
			header("Location: listaUsuarios.php");
			break;
			
		case 'aluno':
			$daoAluno = new DaoAluno();
			$daoAluno->deleteById($codigoID);
			header("Location: listaAlunos.php");
			break;
			
		case 'dependente':
			$daoDependente = new DaoDependente();
			$daoDependente->deleteById($codigoID);
			header("Location: listaDependentes.php");
			break;
			
			
		default:
			header("Location: administracao.php");
			break;
	}

?>