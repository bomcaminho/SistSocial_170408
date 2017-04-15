<?php
	
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoAluno.php';

	require_once 'business/comuns/notification/Notification.php';
	
	$session = new Session();
	$session->ValidaSessionUsuario();
	
	$daoAluno = new DaoAluno();
	$query = $daoAluno->selectToCodigo($_GET['codigoAluno']);
	if (!$query) {
		Notification::showError("Erro na consulta no banco de dados.");
	}
	else if (mysql_num_rows($query) == 0) {
		Notification::showError("Aluno nao cadastrado.");
	}
	else {
		$resultado = mysql_fetch_assoc($query);
		echo '<i class="icon-double-angle-right"></i>'.' '.$resultado['nome'];
	}	

?>