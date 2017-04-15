<?php
	
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoFamilia.php';

	require_once 'business/comuns/notification/Notification.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$daoFamilia = new DaoFamilia();
	$query = $daoFamilia->selectToCpf($_GET['cpfResponsavel']);
	if (!$query) {
		Notification::showError("Erro na consulta no banco de dados.");
	}
	else if (mysql_num_rows($query) == 0) {
		Notification::showError("Familia assistida nao localizada.");
	}
	else {
		$resultado = mysql_fetch_assoc($query);

		$session->setValueSession('cpfDoResponsavel', $resultado['cpfDoResponsavel']);
		echo '<i class="icon-double-angle-right"></i>'.' '.$resultado['nomeDoResponsavel'];
	}	

?>