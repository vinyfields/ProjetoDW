<?php
	include('funcoes.php');
	protegePagina(); 
?>
Verificador de Conexão:
</br>
<form method="POST" enctype="multipart/form-date" action="">
	Verifique IP:
	<input type="text" name="ip"><br/>
	<input type="submit" name="enviar" value="verificar">	
</form>
<?php
if(isset($_POST['enviar'])){
			$ip = $_POST['ip'];
	$pcs = array(
		"PC 1" => $ip
		);
		 
		foreach ($pcs as $pc => $ipp) {
			$ping = `ping $ip -n 1 -l 1`;
			//echo $ping;
			?>
			</br>
			<?php
			if (preg_match("/bytes=/", $ping)) {
				echo $pc . ": <b><font color='#00FF00'> ONLINE </font></b>" . "<br />";
			} else {
				echo $pc . ": <b><font color='#FF0000'> OFFLINE </font></b>" . "<br />";
			}
		}

}
			


	
?>