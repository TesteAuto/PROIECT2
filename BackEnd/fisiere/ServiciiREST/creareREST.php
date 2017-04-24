<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."creareBD.php");
require_once(ServiciiREST."principal.php");

function crearecontnou(){
	$app = \Slim\Slim::getInstance();
	$db = new Creare();
	Principal::postServCreareContNou($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>