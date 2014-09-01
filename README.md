#Projeto: Test Connection Server
=================================
- IFPB - Tecnologia em Redes de Computadores
- Equipe: Alexandro Ferreira da Silva & Vinicius Campos da Silva

Projeto final da disciplina desenvolvimento web, consiste na implementação de uma página com sistema de login e autenticação em banco
de dados e uma ferramenta de teste de conexão onde é possivel fazer uma requisição via ip para um servidor, e retornar a informação
se ele está online ou offline.

#Instalação
===========

Para o funcionamento correto da página, é necessário ter instalado em sua maquina as seguintes aplicações:

- PHP + MySQL + Apache ( no nosso caso usamos o easyPHP, software que contem todas essas aplicações
- Browser atualzado ( chrome, firefox, etc)

--Para que a página funcione se faz necessário a modificação de alguns arquivos, listados abaixo:
  - É prciso criar um banco de dados com: 
  
  	- Nome do banco = dw
  	- tabela = cliente
  	- coluna 1 = id ( do tipo INT e auto-incrementável e PRIMARY)
  	- coluna 2 =  nome ( do tipo VARCHAR e tamanho 100 )
  	- coluna 3 = senha ( DO TIPO varchar e tamanho 100 )

- ARQUIVO= variaveis.php
  - Para esse arquivo se faz necessário a modificação dos seguintes parâmetros:
      
       - $home		="http://localhost/projects/projetofinal/"; ( é necessário colocar o diretório raiz onde vc salvou
                                                                     os arquivos do github)
       - $AUT['servidor'] = 'localhost';    // Servidor MySQL
       - $AUT['usuario'] = 'root';          // Usuário MySQL
       - $AUT['senha'] = '';                // Senha MySQL
       - $AUT['banco'] = 'dw';			   // Banco de dados MySQL
       - $AUT['paginaLogin'] = $home.'?p=login'; // Página de login
       - $AUT['tabela'] = 'cliente';       // Nome da tabela onde os usuários são salvos
       
Feita essas configurações, já será possivel usar a pagina e todas as suas funcionalidades.
       

      
