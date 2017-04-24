<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."comentariuBD.php");
require_once(ServiciiREST."principal.php");

function comentariu(){
	$app = \Slim\Slim::getInstance();
	$db = new ComentariuBD();
	Principal::postComentariuServ($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>