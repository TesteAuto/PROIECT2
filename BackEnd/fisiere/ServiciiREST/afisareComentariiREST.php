<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."afisareComentariiBD.php");
require_once(ServiciiREST."principal.php");

function afiseazacomentarii(){
	$app = \Slim\Slim::getInstance();
	$db = new AfisareComentarii();
	Principal::getAfisareComentarii($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>