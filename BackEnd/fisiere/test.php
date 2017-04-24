<?php
require_once("CurlPostDao.php");
require_once("CurlGetDao.php");
require_once("CurlPutDao.php");
require_once("CurlDeleteDao.php");

class Teste
{
  public function testePOST() {
    $dao = new CurlPostDao("http://localhost/PROIECT2/BackEnd","/crearecontnou", array(
      "utilizator" => 'exemplu5',
      "parola" => 'exemplu5',
      "email" => 'exemplu5@yahoo.com',
      "poza" => 'exemplu5',
      "status" => 'exemplu5@yahoo.com',
      )
    );
    return $dao->getResponse();
}

public function runTests()
{
    try {
     print_r($this->testePOST());
 } catch (Exception $e) {
    var_dump("Eroare in test.php");
}
}

}
//http://localhost/PROIECT2/BackEnd/fisiere/test.php
$test = new Teste();
$test->runTests();