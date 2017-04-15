<?php
	require_once 'business/modelObject/generic/ModelDadosPessoal.php';
	require_once 'business/modelObject/generic/ModelEndereco.php';
	require_once 'business/modelObject/ModelFamilia.php';
	
	require_once 'business/dataAccessObject/DaoFamilia.php';
	
	// Dados Sistemas
	$dadosFamilia = new ModelFamilia();
	$dadosFamilia->setTipoDeCadastrado($_POST['tipoDeCadastrado']);
	$dadosFamilia->setDataDoCadastrado($_POST['dataDoCastrado']);
	
	// Dados do Pessoais
	
	$dadosPessoal = new ModelDadosPessoal();
	$dadosPessoal->setCpf($_POST['cpfDoResponsavel']);
	$dadosPessoal->setRg($_POST['rgDoResponsavel']);
	$dadosPessoal->setNome($_POST['nomeDoResponsavel']);
	$dadosPessoal->setSexo($_POST['sexoDoResponsavel']);
	$dadosPessoal->setDataNascimento($_POST['dataDeNascimentoDoResponsavel']);
	$dadosPessoal->setCidade($_POST['cidadeDeNascimentoDoResponsavel']);
	$dadosPessoal->setEstado($_POST['estadoDeNascimentoDoResponsavel']);
	$dadosPessoal->setEstadoCivil($_POST['estadoCivilDoResponsavel']);
	$dadosPessoal->setEtnia($_POST['etniaDoResponsavel']);
	$dadosPessoal->setReligiao($_POST['religiaoDoResponsavel']);
	$dadosPessoal->setEmail($_POST['e-mailDoResponsavel']);
	$dadosPessoal->setEscolaridade($_POST['escolaridadeDoResponsavel']);
	$dadosPessoal->setSituacaoDoTrabalho($_POST['situacaoDoTrabalhoDoResponsavel']);
	$dadosPessoal->setRendaPessoal($_POST['rendaPessoalDoResponsavel']);
	$dadosPessoal->setProfissao($_POST['profissaoDoResponsavel']);
	$dadosPessoal->setObservacao($_POST['observacaoDoResponsavel']);
	
 	$dadosFamilia->setDadosPessoal($dadosPessoal);
	
	// Endereco
	
	$endereco = new ModelEndereco();
	$endereco->setCep($_POST['cepDaFamilia']);
	$endereco->setRua($_POST['ruaDaFamilia']);
	$endereco->setBairro($_POST['bairroDaFamilia']);
	$endereco->setCidade($_POST['cidadeDaFamilia']);
	$endereco->setEstado($_POST['estadoDaFamilia']);
	$endereco->setTelefoneResidencial($_POST['telResidencial']);
	$endereco->setCelular($_POST['telCelular']);
	$endereco->setTelefoneRecado1($_POST['telRecado1']);
	$endereco->setTelefoneRecado2($_POST['telRecado2']);
	$endereco->setComplemento($_POST['pontoDeReferencia']);

	$dadosFamilia->setEndereco($endereco);
	
	// Dados Conjuge
	
	$dadosConjuge = new ModelDadosPessoal();
	$dadosConjuge->setCpf($_POST['cpfDoConjuge']);
	$dadosConjuge->setRg($_POST['rgDoConjuge']);
	$dadosConjuge->setNome($_POST['nomeDoConjuge']);
	$dadosConjuge->setSexo($_POST['sexoDoConjuge']);
	$dadosConjuge->setDataNascimento($_POST['dataDeNascimentoDoConjuge']);
	$dadosConjuge->setCidade($_POST['cidadeDeNascimentoDoConjuge']);
	$dadosConjuge->setEstado($_POST['estadoDeNascimentoDoConjuge']);
	$dadosConjuge->setEstadoCivil($_POST['estadoCivilDoConjuge']);
	$dadosConjuge->setEtnia($_POST['etniaDoConjuge']);
	$dadosConjuge->setReligiao($_POST['religiaoDoConjuge']);
	$dadosConjuge->setEscolaridade($_POST['escolaridadeDoConjuge']);
	$dadosConjuge->setSituacaoDoTrabalho($_POST['situacaoDoTrabalhoDoConjuge']);
	$dadosConjuge->setRendaPessoal($_POST['rendaPessoalDoConjuge']);
	$dadosConjuge->setProfissao($_POST['profissaoDoConjuge']);
	$dadosConjuge->setObservacao($_POST['observaoDoConjuge']);

	$dadosFamilia->setDadosConjuge($dadosConjuge);
	
	// Moradia
	
	$dadosFamilia->setSituacaoDaResidencia($_POST['situacaoDaResidencia']);
	$dadosFamilia->setTipoDeResidencia($_POST['tipoDeResidencia']);
	$dadosFamilia->setTipoDeConstrucao($_POST['tipoDeConstrucao']);
	$dadosFamilia->setQuantosComodos($_POST['quantosComodos']);
	$dadosFamilia->setValorDaPrestacao($_POST['valorDaPrestacao']);
	$dadosFamilia->setQuantasPessoasMoram($_POST['quantasPessoasMoram']);
	$dadosFamilia->setAgua($_POST['tipoDeAgua']);
	$dadosFamilia->setLuz($_POST['tipoDeIluminacao']);
	$dadosFamilia->setEsgoto($_POST['tipoDeEsgoto']);
	$dadosFamilia->setCadastradaPlanoDeMoradia($_POST['cadastradaPlanoDeMoradia']);
	$dadosFamilia->setPrevicaoDeMudancaDoLocal($_POST['previcaoDeMudancaDoLocal']);
	
	// Orcamento Familiar

	$dadosFamilia->setRendaPropria($_POST['rendaPropria']);
	$dadosFamilia->setRendaConjuge($_POST['rendaConjuge']);
	$dadosFamilia->setBolsa($_POST['bolsa']);
	$dadosFamilia->setAjudaFamiliar($_POST['ajudaFamiliar']);
	$dadosFamilia->setOutros1($_POST['outros1']);
	$dadosFamilia->setOutros2($_POST['outros2']);
 	$dadosFamilia->setRentaTotal($_POST['rendaTotal']);
	$dadosFamilia->setGastoAgua($_POST['gastoAgua']);
	$dadosFamilia->setGastoLuz($_POST['gastoLuz']);
	$dadosFamilia->setGastoAlimentacao($_POST['gastoAlimentacao']);
	$dadosFamilia->setGastoAluguel($_POST['gastoAluguel']);
	$dadosFamilia->setGastoMedicamento($_POST['gastoMedicamento']);
	$dadosFamilia->setGastoDiversos($_POST['gastoDiversos']);
 	$dadosFamilia->setDespesasTotal($_POST['despesasTotal']);
	
	// Saude
	
	$dadosFamilia->setUbsDeAtendimento($_POST['ubsDeAtendimento']);
	$dadosFamilia->setAreaDeAbrangencia($_POST['areaDeAbrangencia']);
	$dadosFamilia->setUsuarioDeAlcool($_POST['usuarioDeAlcool']);
	$dadosFamilia->setUsuarioDeDroga($_POST['usuarioDeDroga']);
	$dadosFamilia->setViciacoesDeJogos($_POST['viciacoesDeJogos']);
	$dadosFamilia->setTranstornoMental($_POST['transtornoMental']);
	$dadosFamilia->setTratamentoMedico($_POST['tratamentoMedico']);
	
	// Informacoes Social
	
	$dadosFamilia->setFamiliarReclusao($_POST['familiarReclusao']);
	$dadosFamilia->setViolenciaDomestica($_POST['violenciaDomestica']);
	$dadosFamilia->setFamiliarAssassinada($_POST['familiarAssassinada']);
	$dadosFamilia->setFilhoDificuldadeNaEscola($_POST['filhoDificuldadeNaEscola']);
	
	// Serviços Desejado
	
	$dadosFamilia->setAssistenciaSocial($_POST['assistenciaSocial']);
	$dadosFamilia->setVisitaDomiciliar($_POST['visitaDomiciliar']);
	$dadosFamilia->setCestaBasica($_POST['cestaBasica']);
	$dadosFamilia->setGrupoDeGestante($_POST['grupoDeGestante']);
	$dadosFamilia->setEducacaoInfantil($_POST['educacaoInfantil']);
	$dadosFamilia->setEducacaoJuvenil($_POST['educacaoJuvenil']);
	$dadosFamilia->setGrupoCorujinha($_POST['grupoCorujinha']);
	$dadosFamilia->setGrupoDeMulheres($_POST['grupoDeMulheres']);
	$dadosFamilia->setTerapia($_POST['terapia']);
	$dadosFamilia->setProcuraEmprego($_POST['procuraEmprego']);
	$dadosFamilia->setProcuraCurso($_POST['procuraCurso']);
	$dadosFamilia->setConselhoTutelar($_POST['conselhoTutelar']);
	$dadosFamilia->setPoupaTempo($_POST['poupaTempo']);
	$dadosFamilia->setJuridicial($_POST['juridicial']);
	
	// Observacoes
	
	$dadosFamilia->setObervacaoDiversos($_POST['obervacaoDiversos']);

	$daoFamilia = new DaoFamilia();
	if ($daoFamilia->insert($dadosFamilia)) {
		session_start("mae");
		$_SESSION['cpfResponsavel'] = $dadosPessoal->getCpf();
		header("Location: newDependente.php?");
	}
	else {
		header("Location: newFamilia.php?error");
	}
?>