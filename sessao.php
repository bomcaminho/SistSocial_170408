<?php
require 'sql.php';

session_start();
$endereco = $_SERVER ['REQUEST_URI']; // captura URL
if (!isset($_SESSION['hash'])) {
	session_destroy();
	session_start();
	$_SESSION['url'] = $endereco;
	// Redireciona o visitante de volta pro login
	header("Location: login.php?nlogin"); 
	exit;
}
$hash = $_SESSION['hash'];
$query = mysql_query("Select * from user_sessions where `hash`='$hash'");
if (mysql_num_rows($query) == 0) {
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: login.php?nlogin"); 
	exit;
}
$fetch  = mysql_fetch_assoc($query);
$id = $fetch['id_user'];
$query__ = mysql_query("SELECT * FROM `usuarios` WHERE `id`='$id'");
$row = mysql_fetch_assoc($query__);
$nome_user = $row['nome'];
$sobre_nome_user = $row['sobrenome'];
$email_user = $row['email'];
$nome_comple_user = $nome_user.' '.$sobre_nome_user;
//die($id);
$level = $fetch['id_level'];
$query_ = mysql_query("SELECT * FROM `conf` LIMIT 1") or die(mysql_error());
$config = mysql_fetch_assoc($query_);
$afilhado = $config['afilhado'];
ini_set('default_charset', 'utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET charecter_set_client=utf8');
mysql_query('SET charecter_set_results=utf8');



?>