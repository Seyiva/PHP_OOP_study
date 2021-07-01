<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'input_class.php';

class Hidden extends Input {
  public function __construct() {
    $this->setAttr('type','hidden') ;
    parent::__construct('input') ;
  }
}
// echo (new Hidden())->setAttr('name','id') ;
