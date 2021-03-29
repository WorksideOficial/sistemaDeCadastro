<?php include_once"_inc/header.php";?>
<?php
$url = (isset($_GET['url'])) ? strip_tags($_GET['url']) : '';
$parametros = explode('/', $url);
$permitidas = array('users','user');

if(isset($_GET['s']) && $_GET['s'] != ''){
	include_once"pages/busca.php";
}else{
	if($url == ''){
		include_once"pages/home.php";
	}elseif(in_array($parametros[0], $permitidas)){
		include_once"pages/".$parametros[0].'.php';
	}elseif($parametros[0] == 'categoria'){
			if(isset($parametros[1]) && !isset($parametros[2])){
					include_once"pages/categoria.php";
			}elseif(isset($parametros[2])){
				include_once"pages/categoria.php";
			}
	}else{
		include_once"pages/404.php";
	}
}
?>

<?php include_once"_inc/footer.php";?>