<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."videoBD.php");
require_once(ServiciiREST."principal.php");

function video(){
	$app = \Slim\Slim::getInstance();
	$db = new Video();
	Principal::getVideo($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>