<?php
require_once("conectare.php");

class Creare extends Conectare{

  function __construct()
  {
    parent::__construct("utilizator",false);
  }
}
?>
