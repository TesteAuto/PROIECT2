<?php
require_once("conectare.php");

class EmailBD extends Conectare{

  function __construct()
  {
    parent::__construct("email",false);
  }
}
?>
