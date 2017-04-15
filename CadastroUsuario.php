<?php
	include_once 'business/modelObject/generic/ModelDadosPessoal.php';
	include_once 'business/modelObject/generic/ModelEndereco.php';
	include_once 'business/modelObject/ModelUsuario.php';
	
	include_once 'business/dataAccessObject/DaoUsuario.php';
		
	// Dados Pessoais 
	$dadosPessoal = new ModelDadosPessoal();
	$dadosPessoal->setCpf($_POST['cpfUsuario']);
	$dadosPessoal->setRg($_POST['rgUsuario']);
	$dadosPessoal->setNome($_POST['nomeUsuario']);
	$dadosPessoal->setSexo($_POST['sexoUsuario']);
	$dadosPessoal->setDataNascimento($_POST['DataNascimentoUsuario']);
	$dadosPessoal->setCidade($_POST['cidadeUsuario']);
	$dadosPessoal->setEstado($_POST['estadoUsuario']);
	$dadosPessoal->setEstadoCivil($_POST['estadoCivilUsuario']);
		
	$usuario = new ModelUsuario();
	$usuario->setDadosPessoal($dadosPessoal);
	$usuario->setEmail($_POST['emailUsuario']);
	$usuario->setTipoUsuario($_POST['tipoUsuario']);
	
	$senhaCriptografada = hash("whirlpool", $_POST['senhaUsuario']);
	$usuario->setSenha($senhaCriptografada);
	
	$usuario->setStatus("1");
	
	//Endereço
	$endereco = new ModelEndereco();
	$endereco->setCep($_POST['cepUsuario']);
	$endereco->setRua($_POST['ruaUsuario']);
	$endereco->setNumero($_POST['numeroUsuario']);
	$endereco->setBairro($_POST['bairroUsuario']);
	$endereco->setCidade($_POST['enderecoCidadeUsuario']);
	$endereco->setEstado($_POST['enderecoEstadoUsuario']);
	$endereco->setTelefoneResidencial($_POST['telefoneResidencialUsuario']);
	$endereco->setCelular($_POST['celularUsuario']);
	$endereco->setTelefoneRecado1($_POST['telefoneRecado1Usuario']);
	$endereco->setTelefoneRecado2($_POST['telefoneRecado2Usuario']);
	$endereco->setComplemento($_POST['complementoUsuario']);
	
	$usuario->setEndereco($endereco);

	$daoUsuario = new DaoUsuario();
	if ($daoUsuario->insert($usuario)) {
		header("Location: newUsuario.php?success");
	}
	else {
		header("Location: newUsuario.php?error");
	}
?>