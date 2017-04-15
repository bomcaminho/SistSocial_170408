<?php
	require_once 'business/comuns/session/SessionUsuario.php';

	require_once 'business/dataAccessObject/DaoUsuario.php';
	require_once 'business/dataAccessObject/DaoSessionUsuario.php';
	
	require_once 'business/modelObject/ModelUsuario.php';
	require_once 'business/modelObject/ModelSessionUsuario.php';
	require_once 'business/modelObject/generic/ModelDadosPessoal.php';
	
	$ATIVO = '1';
	
	if (empty($_POST) OR (empty($_POST['email']) OR empty($_POST['password']))) {
		header("Location: login.php?error&empty");
		exit;
	}
	else {
		$daoUsuario = new DaoUsuario();
		$query = $daoUsuario->selectEmail($_POST['email']);

		if (mysql_num_rows($query) > 0) {
			$resultado = mysql_fetch_assoc($query);

			$usuario = new ModelUsuario();

			$dadosPessoal = new ModelDadosPessoal();
			$dadosPessoal->setCpf($resultado['cpf']);
			$dadosPessoal->setRg($resultado['rg']);
			$dadosPessoal->setNome($resultado['nome']);
			$dadosPessoal->setSexo($resultado['sexo']);
			$usuario->setDadosPessoal($dadosPessoal);
			
			$usuario->setEmail($resultado['email']);
			$usuario->setSenha($resultado['senha']);
			$usuario->setStatus($resultado['status']);
			$usuario->setTipoUsuario($resultado['tipousuario']);
			
			switch ($usuario->getStatus()) {
				case $ATIVO:
					if (isSenhaValida($_POST['password'], $usuario->getSenha())) {
						$session = new Session();
						
						$token = md5(uniqid(rand(), true));
 						$_SESSION['tokenSession'] = $token;
 						$_SESSION['UsuarioLogado'] = $usuario; 					
						
 						$session->setValueSession('nomeDoUsuario', $dadosPessoal->getNome());
 						$session->setValueSession('idDoUsuario', $resultado['id']);
 						$session->setValueSession('tipoDoUsuario', $usuario->getTipoUsuario());

 						$daoSessionUsuario = new DaoSessionUsuario();
 						$sessionUsuario = new ModelSessionUsuario();
 						$sessionUsuario->setUsuario($usuario);
 						$sessionUsuario->setTokenUsuario($token);
 						
 						$daoSessionUsuario->insert($sessionUsuario);
 						
 						header("Location: administracao.php");
					}
					else {
						header("Location: login.php?error&empty");
					}
					break;
					
				default:
					header("Location:login.php?bloqueio");
					break;
			}
		}
		else {
			header("Location: login.php?error&empty");
		}
	}
	
	
	function isSenhaValida($senhaDigitada, $senhaGravadaBancoDados) {
		$senhaCriptografada = hash("whirlpool", $senhaDigitada);
		return $senhaCriptografada == $senhaGravadaBancoDados;
	}
	
	
?>