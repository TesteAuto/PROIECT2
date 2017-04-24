<?php
require_once("conectare.php");

class AfisareComentarii extends Conectare{

  function __construct()
  {
    parent::__construct("comentarii",false);
  }
}
?>