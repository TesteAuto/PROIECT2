<?php
use \Firebase\JWT\JWT;
class Principal {
  // Creare Cont Nou
  public static function postServCreareContNou($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postCreareContNou($arr);
      $json = Principal::raspuns($row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
// Autentificare cont
  public static function postServAutentificare($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postAutentficareMetoda($arr);
      $key = "key";
      if(!$row->eroare) {
              $issuedAt = time();
              $notBefore = $issuedAt;
              $expire = $notBefore + 60 * 60 * 24;
              $serverName = 'localhost/PROIECT/BackEnd';
              $payload = array(
                  'iat'  => $issuedAt,
                  'iss'  => $serverName,
                  'nbf'  => $notBefore,
                  'exp'  => $expire,
                  'credentials' => (array)$row,
              );
              $jwt = JWT::encode($payload, $key, 'HS256');
              $json = Principal::raspuns($jwt);
              $app->response()->header('Content-Type', 'application/json');
              echo $json;
      }else{
            $json = Principal::raspuns($row->eroare);
            $app->response()->header('Content-Type', 'application/json');
            echo $json;
      }
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
// Trimite-ne un mesaj!
 public static function postEmailServ($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postEmailMetoda($arr);
      $json = Principal::raspuns($row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
 // Adauga comentariu
 public static function postComentariuServ($app, $db){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->postComentariuMetoda($arr);
      $json = Principal::raspuns($row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
 // Afisare Comentarii
 public static function getAfisareComentarii($app, $db){
    try {
      $row = $db->getMetodaAfisareComentarii();
      $json = Principal::raspuns((object)$row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
//Profilul Meu!
   public static function putServProfil($app, $db, $id){
    try {
      $request = $app->request();
      $arr = json_decode($request->getBody(),true);
      $row = $db->putMetodaProfil($id,$arr);
      $json = Principal::raspuns($row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
 // Video
 public static function getVideo($app, $db){
    try {

      $row = $db->getMetodaVideo();
      $json = Principal::raspuns((object)$row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
  // Intrebari
 public static function getIntrebari($app, $db){
    try {

      $row = $db->getMetodaIntrebari();
      $json = Principal::raspuns((object)$row);
      $app->response()->header('Content-Type', 'application/json');
      echo $json;
    } catch(Exception $e) {
     echo $e->getMessage();
   }
 }
private static function raspuns($response)
{
  if(is_array($response)) {
    return json_encode($response[0]);
  } else {
    return json_encode((array)$response);
  }
}
}

?>
