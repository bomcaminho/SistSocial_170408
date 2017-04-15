<?php 
	require_once 'business/comuns/session/SessionUsuario.php';
	require_once 'business/dataAccessObject/DaoConnect.php';

	$session = new Session();
	$session->ValidaSessionUsuario();
echo '
	<ul class="nav nav-list">
		<li>
			<a href="administracao.php">
				<i class="icon-cog"></i>
				<span class="menu-text"> Cadastro </span>
			</a>
    	</li>
    	<li>
    		<a href="listaFamilias.php">
    			<i class="icon-group"></i>
    			<span class="menu-text"> Famílias </span>
    		</a>
    	</li>
    	<li>
    		<a href="listaAlunos.php">
    			<i class="icon-user"></i>
    			<span class="menu-text"> Alunos </span>
    		</a>
    	</li>
    	<li>
    		<a href="listaEducadores.php">
    			<i class="icon-user"></i>
    			<span class="menu-text"> Educadores </span>
    		</a>
    	</li>
		<li>
			<a href="visaoGeral.php">
				<i class="icon-globe"></i>
				<span class="menu-text"> Visão geral </span>
			</a>
		</li>
	';

	if ($session->getValueSession('tipoDoUsuario') == 'Administrador') {
		echo '
			<li>
    			<a href="listaUsuarios.php">
    				<i class="icon-user"></i>
    				<span class="menu-text"> Usuarios </span>
    			</a>
    		</li>
		';
	}

	echo '
		<li>
    		<a href="minhaConta.php">
    			<i class="icon-user red"></i>
    			<span class="menu-text"> Minha Conta </span>
    		</a>
    	</li>
		<li>
    		<a href="listaTurmas.php">
    			<i class="glyphicon glyphicon-education"></i>
    			<span class="menu-text"> Turmas </span>
    		</a>
    	</li>
   			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					<span class="menu-text"> Buscar </span>
					<b class="arrow icon-angle-down"></b>
				</a>
				<ul class="submenu">
					<li>
						<a href="turma.php?">
							<i class="icon-white icon-search"></i>
    						<span class="menu-text">Familia</span>
							</a>
						</li>
    					<li>
							<a href="turma.php?">
							<i class="icon-white icon-search"></i>
    						<span class="menu-text">Aluno</span>
							</a>
    					</li>
    					<li>
							<a href="turma.php?">
							<i class="icon-white icon-search"></i>
    						<span class="menu-text">Visita</span>
							</a>
    					</li>
    			</ul>    				
    		</li>
	';
	
	if ($session->getValueSession('tipoDoUsuario') == 'Administrador' || $session->getValueSession('tipoDoUsuario') == 'Assistente Social') {	
		echo '
			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					<span class="menu-text"> Formularios </span>
					<b class="arrow icon-angle-down"></b>
				</a>
				<ul class="submenu">
					<li>
						<a href="turma.php?" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>
    						<span class="menu-text">Familia</span>
						</a>
						<ul class="submenu">
							<li>
								<a href="formularioFamilia.php">
									<i class="glyphicon glyphicon-file"></i>
    								<span class="menu-text">Familiar</span>
								</a>
    						</li>
							<li>
								<a href="formularioDependente.php?">
									<i class="glyphicon glyphicon-file"></i>
    								<span class="menu-text">Dependente</span>
								</a>
    						</li>
						</ul>
					</li>
   					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>
   							<span class="menu-text">Visita</span>
						</a>
						<ul class="submenu">
							<li>
								<a href="turma.php?">
									<i class="glyphicon glyphicon-file"></i>
    								<span class="menu-text">Ficha de Visita</span>
								</a>
    						</li>
						</ul>
   					</li>
    			</ul>    				
    		</li>
		';
	}
	
	echo '
		<li>
			<a href="logout.php">
				<i class="icon-off icon-white"></i>
				<span class="menu-text">Sair</span>
			</a>
		</li>
	</ul>
	';
?>