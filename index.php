<?php

require_once ("vendor/autoload.php");

use Slim\App;
use Slim\Container;

$settings = array(
	"settings" => array(
		"displayErrorDetails" => true 
	)
);
$container = new Container($settings);
$app = new App($container);
			
$app->get("/pesanan", function($request, $response){
	$parameter = $request->getQueryParams();
	$umur = $parameter["AlamatPengiriman"];
	$result = array(
		"NamaBarang" => $parameter["NamaBarang"],
		"Ukuran" => $parameter["Ukuran"],
		"AlamatPengiriman" => $umur
	);
	return $response->withJson($result);
});

$app->post("/login", function($request, $response){
	$parameter = $request->getParsedBody();
	$result = array(
		"e-mail" => $parameter["e-mail"],
		"password" => $parameter["password"],
	);
	return $response->withJson($result);
});



$app->run();