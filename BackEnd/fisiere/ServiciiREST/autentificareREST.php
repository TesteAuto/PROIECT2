 <?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."autentificareBD.php");
require_once(ServiciiREST."principal.php");

function autentificare(){
	$app = \Slim\Slim::getInstance();
	$db = new Autentificare();
	Principal::postServAutentificare($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>