Página de login
<?php
include('funcoes.php');
?>
<form method="post" action="valida.php">
<label>Usuário: </label>
<input type="text" name="nome" maxlength="50" /><br>
<label>Senha:</label>
<input type="password" name="senha" maxlength="50" /><br>
<input type="submit" value="Entrar" />
</form>