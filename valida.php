<?php
include("funcoes.php");
include("variaveis.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$usuario = (isset($_POST['nome'])) ? $_POST['nome'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	
	if (validaUsuario($usuario, $senha) == true) {
		header("Location: $home?p=servicos");
	}else{
		expulsaVisitante();
	}
}
?>