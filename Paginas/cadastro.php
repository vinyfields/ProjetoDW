Pagina de cadastro
<?php
	require_once('funcoes.php');


	if(isset($_POST['Cadastrar'])){
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$sql_inserir = "INSERT INTO cliente (nome, senha) VALUES ('$usuario', '$senha')";
			if(inserir($sql_inserir)){
				echo 'Usuário cadastrado com sucesso. ID: '.mysql_insert_id();
				unset ($_POST['Cadastrar']);
			}else{
			echo 'Erro ao cadastrar usuário: '.mysql_error();
			}
	}
?>



<body>
	<form method="POST" enotype="multipart/form-data" action="">
		<p>Usuário: <input type="text" name="usuario"/></p>
		<p>Senha: <input type="password" name="senha"/></p>
		<input type="submit" name="Cadastrar" value="Cadastrar"/>
	</form>
</body>