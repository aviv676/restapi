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
			
$app->get("/data_diri", function($request, $response){
	$parameter = $request->getQueryParams();
	$umur = $parameter["umur"];
	$result = array(
		"nama" => $parameter["nama"],
		"alamat" => $parameter["alamat"],
		"umur" => $umur
	);
	return $response->withJson($result);
});

$app->post("/login", function($request, $response){
	$parameter = $request->getParsedBody();
	$result = array(
		"username" => $parameter["username"],
		"password" => $parameter["password"],
	);
	return $response->withJson($result);
});



$app->run();