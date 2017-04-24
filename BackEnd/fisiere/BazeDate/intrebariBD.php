<?php
require_once("conectare.php");

class Intrebari extends Conectare{

  function __construct()
  {
    parent::__construct("intrebari",false);
  }
}
?>