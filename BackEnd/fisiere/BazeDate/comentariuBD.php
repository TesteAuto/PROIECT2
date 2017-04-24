<?php
require_once("conectare.php");

class ComentariuBD extends Conectare{

  function __construct()
  {
    parent::__construct("comentarii",false);
  }
}
?>
