<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."intrebariBD.php");
require_once(ServiciiREST."principal.php");

function intrebari(){
	$app = \Slim\Slim::getInstance();
	$db = new Intrebari();
	Principal::getIntrebari($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>