<?php
require_once('variaveis.php');

if (isset($_GET['p'])){
$p = $_GET['p'];
$pagina = $p;
}

if (empty($p)){
	$pagina = 'home';
}elseif($p == "home"){
			substr($home,strlen($home-7));
			include('Paginas/'.$pagina.'.php');
}
elseif (!file_exists('Paginas/'.$pagina.'.php')){
	$pagina = '404 Pagina não encontrada!';
}
include("header.php");
include("menu.php");
?>
<div id="conteudo">	
	<?php

	if(file_exists('Paginas/'.$pagina.'.php')){
		substr($home,strlen($home-7));
		include("Paginas/$pagina.php");
	}else{
		echo "404 Não encontrada";
	}
	?>
</div><!--conteudo-->
<?php
include("sidebar.php");
include("rodape.php");
?>
