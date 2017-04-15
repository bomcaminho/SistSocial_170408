<?php
	
	require_once 'business/dataAccessObject/DaoSessionUsuario.php';
	require_once 'business/comuns/session/SessionUsuario.php';
	
	$session = new Session();
	
	$daoSessionUsuario = new DaoSessionUsuario();
	$daoSessionUsuario->delete($session->getTokenUsuario());
	
	$session->logout();
?>