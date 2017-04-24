<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."profilBD.php");
require_once(ServiciiREST."principal.php");

function modificareUtilizator($id){
	$app = \Slim\Slim::getInstance();
	$db = new Profil();
	Principal::putServProfil($app, $db, $id);
	unset($app);
	unset($db);
	R::close();
}

?>