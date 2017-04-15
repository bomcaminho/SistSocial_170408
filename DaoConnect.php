<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$connection = mysql_connect('186.202.152.237','site13715758791','social102030') or die(mysql_error());
mysql_select_db('site13715758791');

ini_set('default_charset', 'utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET charecter_set_client=utf8');
mysql_query('SET charecter_set_results=utf8');
date_default_timezone_set("America/Sao_Paulo");
?>
