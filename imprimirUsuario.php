<?php

	require_once 'business/pdf/mpdf60/mpdf.php';

  	$mpdf=new mPDF();
  	$mpdf->WriteHTML('Aguarde em desenvolvimento');
  	$mpdf->Output();
  	exit();
?>