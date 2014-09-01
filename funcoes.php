<?php 
	require_once('variaveis.php');

	// AUTENTICAÇÃO NO BANCO DE DADOS / VERIFICAÇÃO SE A PAGINA ESTÁ CONECTADA:
	if ($AUT['conectaServidor'] == true) {
		$AUT['link'] = mysql_connect($AUT['servidor'], $AUT['usuario'], $AUT['senha']) 
		or die("MySQL: Não foi possível conectar-se ao servidor [".$AUT['servidor']."].");
		mysql_select_db($AUT['banco'], $AUT['link']) 
		or die("MySQL: Não foi possível conectar-se ao banco de dados [".$AUT['banco']."].");
	}

	// VERIFICA E INICIA A SESSÃO:
	if ($AUT['abreSessao'] == true) {
		session_start();
	}
	//REQUISITA AO BANCO DE DADOS INFORMAÇÕES DO USUÁRIO E COMPARA COM AS QUE FORAM INFORMADAS:
	function validaUsuario($usuario, $senha) {
		global $AUT;

		$cS = ($AUT['caseSensitive']) ? 'BINARY' : '';

		// FUNÇÃO USADA PARA SINALIZAR O ENVIO DE INFORMAÇÕES PARA O BD, INSERINDO UMA BARRA
		$nusuario = addslashes($usuario);
		$nsenha = addslashes($senha);

		// FAZ UMA CONSULTA SQL PARA PROCURAR O USUÁRIO NA LISTA.
		$sql = "SELECT `id`, `nome` FROM `".$AUT['tabela']."` WHERE ".$cS." `nome` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
		$query = mysql_query($sql);
		$resultado = mysql_fetch_assoc($query);

		// VERIFICA SE ENCONTROU ALGUM USUÁRIO VÁLIDO:
		if (empty($resultado)) {
			// USUÁRIO INVÁLIDO
			return false;

		} else {
			// USUÁRIO VÁLIDO
			$_SESSION['usuarioID'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
			$_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

			// Verifica a opção se sempre validar o login
			if ($AUT['validaSempre'] == true) {
				// Definimos dois valores na sessão com os dados do login
				$_SESSION['usuarioLogin'] = $usuario;
				$_SESSION['usuarioSenha'] = $senha;
			}

			return true;
		}
	}
	/*INICIO DA FUNÇÃO PARA PROTEÇÃO DAS PAGINAS PARA VISTANTES*/
	function protegePagina() {
		global $AUT;

		if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
			// Não há usuário logado, manda pra página de login
			expulsaVisitante();
		} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
			// Há usuário logado, verifica se precisa validar o login novamente
			if ($AUT['validaSempre'] == true) {
				// Verifica se os dados salvos na sessão batem com os dados do banco de dados
				if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
					// Os dados não batem, manda pra tela de login
					expulsaVisitante();
				}
			}
		}
	}

	/*FUNÇÃO TERMINA A SESSÃO,APAGA OS REGISTROS DO USUÁRIOE E MOVE O VISITANTE PARA A PAGINA INICIAL*/
	function expulsaVisitante() {
		global $AUT;
		// Remove as variáveis da sessão (caso elas existam)
		unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
		// Manda pra tela de login
		header("Location: ".$AUT['paginaLogin']);
	}

	function inserir($sql){
		if(mysql_query($sql)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
?>