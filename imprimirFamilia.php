<?php
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoFamilia.php';
	require_once 'business/pdf/mpdf60/mpdf.php';

	require_once 'business/comuns/formulario/familia/FormularioDeFamiliaEmPDF.php';
		
	
	require_once 'business/dataAccessObject/DaoVisita.php';
	require_once 'business/comuns/formulario/visita/FormularioDeVisitaDomiciliarEmPDF.php';	
	
	
	
	$teste = new FormularioDeFamiliaEmPDF($_GET['id']);
	$teste->show();

// 	$modelVisita = new ModelVisita();
// 	$visita = new FormularioDeVisitaDomiciliarEmPDF($modelVisita);
// 	$visita->show();
	

	
// 	$formularioVisita = "Ok";
	
// 	$daoVisita = new DaoVisita();
// 	$query = $daoVisita->selectToCpf('324.567.888-99');
	
// 	if ($query == null) {
// 		$formularioVisita = "Erro";
// 	}
	
	
	//$count = mysql_num_rows($query);
	
	
	//$query = (new DaoVisita())->selectToCpf("324.567.888-99");
// 	if (mysql_num_rows($query) > 0) {
// 			while($rowVisita = mysql_fetch_assoc($query)) {
// 			$modelVisita = (new VisitaDomiciliarDaoObject())->getVisitaDomiciliar($rowVisita);
	
// 			$formularioVisita .= (new FormularioDeVisitaDomiciliarEmPDF($modelVisita))->getContent();
// 		}
// 	}

	
	
	
// 	echo $formularioVisita;
	
	
	
	
	
?>