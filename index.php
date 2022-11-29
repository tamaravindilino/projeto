<?php 
// 	header('Access-Control-Allow-Origin: *');
// 	header('Content-type: application:json');
// 	header("Content-type: text/html; charset=utf-8");

// 	date_default_timezone_set("America/Sao_Paulo");

// print "<pre>"; 
// var_dump($_GET);
// var_dump();
// exit;

// 	/* Definindo e validando variáveis iniciais */
// 	if(isset($_GET['path'])){
// 		$path = explode("/",$_GET['path']);
// 	}else{
// 		echo "Caminho não existe!";
// 		exit;
// 	}
	
// 	$api = isset($path[0]) ? $path[0] : "Caminho não existe!" ;
// 	$acao = isset($path[1]) ? $path[1] : "";
// 	$param = isset($path[2]) ? $path[2] : "";
// 	$method = $_SERVER['REQUEST_METHOD'];

// 	include_once("api/cliente/clientes.php");

// print "<pre>"
?>



<?php 
    //Incia sessão
    session_start();
    header("Location: controle.php");
?>

