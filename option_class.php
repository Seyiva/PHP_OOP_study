<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

class Option extends Tag {
  public function __construct()  {
    parent::__construct('option') ;
  }
  public function setSelected() {
    $this->setAttr('selected') ;
    return $this ;
  }

} 
