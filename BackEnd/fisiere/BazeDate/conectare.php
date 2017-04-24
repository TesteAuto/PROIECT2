<?php
require_once(VENDOR."rb.php");
require_once(PHPMAILER."PHPMailerAutoload.php");
require_once(PHPMAILER."class.phpmailer.php");

abstract class Conectare{


  protected $tabel = null;
  protected $xdispense = null;

  public function __construct($tabel, $xdispense = false) {
    date_default_timezone_set('Europe/Bucharest');
    try{
      R::ext('xdispense', function( $type ){
        return R::getRedBean()->dispense( $type );
      });
      R::setup('mysql:host=localhost;dbname=disertatie','root','root');
    } catch (\RedBeanPHP\RedException $rbe) {
      throw $rbe;
    }
    $this->tabel = $tabel;
    $this->xdispense = $xdispense;
  }
  // Creare Cont Nou
  public function postCreareContNou($params = array()) {
   try {
     if($this->xdispense) {
       $bean = R::xdispense($this->tabel);
     } else {
       $bean = R::dispense($this->tabel);
     }
     $utilizator = R::findOne('utilizator',' utilizator = ? ',array($params['utilizator']));
      if(is_object($utilizator)!='false'){
        foreach ($params as $key => $value){
             // criptare parola
             if($key == 'parola'){
                      $bean["parola"] = hash("sha256", $value);
             }else{
                      $bean[$key] = $value;
              }
        }
        return R::exportAll(R::load($this->tabel, R::store($bean)));
      }else{
          return 'Nume utilizator deja existent';
      }
    }catch (\RedBeanPHP\RedException $rbe) {
   throw $rbe;
 }
}
//Autentificare cont
  public function postAutentficareMetoda($params = array()) {
   try {
          $utilizator = $params['utilizator'];
          $parola = hash("sha256", $params['parola']);
          $bean = R::findOne($this->tabel, "utilizator = ? AND parola = ?", array($utilizator,$parola));
          $ob = new stdClass();
          if(!$bean) {
            $ob->eroare = ("Introduceţi credenţiale valide");
            return $ob;
          }else{
            $ob->id = $bean->id;
            $ob->utilizator = $bean->utilizator;
            $ob->parola = $bean->parola;
            $ob->email = $bean->email;
            $ob->poza = $bean->poza;
            $ob->status = $bean->status;
            return $ob;
          }
    }catch (\RedBeanPHP\RedException $rbe) {
        echo json_encode($rbe->getMessage());
 }
}
//Profilul Meu!
  public function putMetodaProfil($id, $param = array()) {

    try {
      $bean = R::findOne($this->tabel, "id = ?", array($id));
      if(!$bean) {
        return "Nu exista in baza de date";
      }else{
        foreach ($param as $key => $value) {
            // criptare parola
             if($key == 'parola'){
                      $bean["parola"] = hash("sha256", $value);
             }else{
                      $bean[$key] = $value;
              }
        }
          return (array)R::exportAll(R::load($this->tabel, R::store($bean)));
      }
    } catch (Exception $e) {
      echo "Eroare: ".$e->getMessage();
    }
  }
// Trimite-ne un mesaj!
 public static function email($email, $subiect,$mesaj){
   try {
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                   
    $mail->Host = 'smtp.mail.ru';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'stela.ceban.82@mail.ru';                
    $mail->Password = 'Aa1234!!';                         
    $mail->SMTPSecure = 'ssl';                           
    $mail->Port = 465;                                   

    $mail->From = 'stela.ceban.82@mail.ru';
    $mail->FromName = 'Stela';
    $mail->addAddress($email, $email);                
    $mail->SMTPDebug = 0;

    $mail->isHTML(true);                                 

    $mail->Subject = $subiect;
    $mail->Body    = $mesaj;
    $mail->AltBody = '';
    if($mail->send()) {
        return true;
    } else {
        return false;
    }
  } catch(Exception $e) {
   echo $e->getMessage();
 }
}
public function postEmailMetoda($params = array()) {
   try {
     $email = $params['email'];
     $subiect = $params['subiect'];
     $mesaj = $params['mesaj'];
     $verificare = Conectare::email($email,$subiect,$mesaj);
     if($verificare=='true'){
         if($this->xdispense) {
           $bean = R::xdispense($this->tabel);
         } else {
           $bean = R::dispense($this->tabel);
         }
         foreach ($params as $key => $value){
          $bean[$key] = $value;
        }
        $bean->data = date("Y-m-d", time());
        return R::exportAll(R::load($this->tabel, R::store($bean)));
     }else{
        $ob = new stdClass();
        $ob->eroare = "Mesajul nu a fost trimis cu succes!";
        return $ob;
     }
  }catch (\RedBeanPHP\RedException $rbe) {
   throw $rbe;
 }
}
// Adauga comentariu
public function postComentariuMetoda($params = array()) {
   try {
     $id_utilizator = $params['id_utilizator'];
     $titlu = $params['titlu'];
     $comentariu = $params['comentariu'];
         if($this->xdispense) {
           $bean = R::xdispense($this->tabel);
         } else {
           $bean = R::dispense($this->tabel);
         }
         foreach ($params as $key => $value){
          $bean[$key] = $value;
        }
        $bean->data = date("Y-m-d", time());
        return R::exportAll(R::load($this->tabel, R::store($bean)));
  }catch (\RedBeanPHP\RedException $rbe) {
   throw $rbe;
 }
}
// Afisare Comentarii
 public function getMetodaAfisareComentarii() {
    try {
      return R::getAll("SELECT utilizator.utilizator, utilizator.poza, comentarii.titlu, comentarii.comentariu, comentarii.data
             FROM comentarii INNER JOIN utilizator ON comentarii.id_utilizator=utilizator.id;");
    } catch (\RedBeanPHP\RedException $rbe) {
      throw $rbe;
    }
  }
// Video
 public function getMetodaVideo() {
    try {
      return R::getAll("SELECT * FROM $this->tabel");
    } catch (\RedBeanPHP\RedException $rbe) {
      throw $rbe;
    }
  }
// Intrebari
 public function getMetodaIntrebari() {
    try {
      return R::getAll("SELECT * FROM $this->tabel");
    } catch (\RedBeanPHP\RedException $rbe) {
      throw $rbe;
    }
  }
}
?>
