<?php

require_once("constante.php");
require_once(VENDOR."autoload.php");
require_once(BazeDate."creareBD.php");
require_once(BazeDate."autentificareBD.php");
require_once(BazeDate."emailBD.php");
require_once(BazeDate."profilBD.php");
require_once(BazeDate."videoBD.php");
require_once(BazeDate."intrebariBD.php");
require_once(BazeDate."comentariuBD.php");
require_once(BazeDate."afisareComentariiBD.php");

require_once(ServiciiREST."creareREST.php");
require_once(ServiciiREST."emailREST.php");
require_once(ServiciiREST."autentificareREST.php");
require_once(ServiciiREST."profilREST.php");
require_once(ServiciiREST."videoREST.php");
require_once(ServiciiREST."intrebariREST.php");
require_once(ServiciiREST."comentariuREST.php");
require_once(ServiciiREST."afisareComentariiREST.php");

$app = new \Slim\Slim();

// Creare Cont Nou
$app->post('/crearecontnou', 'crearecontnou');
// Autentificare cont
$app->post('/autentificare', 'autentificare');
// Trimite-ne un mesaj!
$app->post('/email', 'email');
// Adauga Comentarii
$app->post('/comentariu', 'comentariu');
// Afiseaza Comentarii
$app->get('/afiseazacomentarii', 'afiseazacomentarii');
// Profilul Meu!
$app->put('/modificareUtilizator/:id', 'modificareUtilizator');
// Video
$app->get('/video', 'video');
// Intrebari
$app->get('/intrebari', 'intrebari');

$app->run();
?>
