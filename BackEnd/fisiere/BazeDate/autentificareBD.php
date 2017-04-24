<?php
require_once("conectare.php");

class Autentificare extends Conectare{

  function __construct()
  {
    parent::__construct("utilizator",false);
  }
}
?>
