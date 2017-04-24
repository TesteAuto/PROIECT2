<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."emailBD.php");
require_once(ServiciiREST."principal.php");

function email(){
	$app = \Slim\Slim::getInstance();
	$db = new EmailBD();
	Principal::postEmailServ($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>