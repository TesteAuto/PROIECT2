<?php
require_once("conectare.php");

class Video extends Conectare{

  function __construct()
  {
    parent::__construct("video",false);
  }
}
?>