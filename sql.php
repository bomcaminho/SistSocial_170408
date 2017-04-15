<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$connection = mysql_connect('localhost','root','usbw') or die(mysql_error());
mysql_select_db('sistsocial');


ini_set('default_charset', 'utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET charecter_set_client=utf8');
mysql_query('SET charecter_set_results=utf8');
date_default_timezone_set("America/Sao_Paulo");
?>
