<?php
$AUT['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$AUT['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$AUT['caseSensitive'] = true;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$AUT['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
$AUT['servidor'] = 'localhost';    // Servidor MySQL
$AUT['usuario'] = 'root';          // Usuário MySQL
$AUT['senha'] = '';                // Senha MySQL
$AUT['banco'] = 'dw';			   // Banco de dados MySQL
$home		  ="http://localhost/projects/projetofinal/";
$AUT['paginaLogin'] = $home.'?p=login'; // Página de login
$AUT['tabela'] = 'cliente';       // Nome da tabela onde os usuários são salvos
$empresa	=" Projeto Final de Desenvolvimento Web | Alexsandro & Vinicius";
$logo		='logo.png';
$autor		="Alex e Vinícius";
$rodape		=date('Y ').$empresa." - Todos os direitos reservados";
$titulo		="PROJETO DW - MONITORAMENTO DE REDE";
$descricao	="Projeto de DW para a terceira avaliação";
$keywords	="php, MySQL, json, MySQLAdmin"
?>