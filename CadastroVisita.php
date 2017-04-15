<?php
	
	require_once 'business/comuns/session/SessionUsuario.php';
	
	require_once 'business/modelObject/ModelVisita.php';
	require_once 'business/dataAccessObject/DaoVisita.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$visita = new ModelVisita();
	
	$visita->setCpf($session->getValueSession('cpfDoResponsavel'));
	$visita->setDataVisita($_POST['dataVisita']);
	$visita->setNomeAssistenteSocial1($_POST['nomeAssistenteSocial1']);
	$visita->setNomeAssistenteSocial2($_POST['nomeAssistenteSocial2']);
	$visita->setDescricaoVisita($_POST['descricaoVisita']);
	$visita->setParecerDaVisita($_POST['parecerDaVisita']);
	
	$daoVisita = new DaoVisita();
	if ($daoVisita->insert($visita)) {
		header("Location: newVisita.php?success");
	}
	else {
		header("Location: newVisita.php?error");
	}
?>