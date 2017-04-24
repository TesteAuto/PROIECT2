<?php
require_once("conectare.php");

class Profil extends Conectare{

  function __construct()
  {
    parent::__construct("utilizator",false);
  }
}
?>