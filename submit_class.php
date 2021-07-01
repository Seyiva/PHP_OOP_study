<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// require_once 'full_tag_class.php';
// require_once 'input_class.php';

class Submit extends Input {
  public function __construct()  {
    $this->setAttr('type', 'submit') ;
    parent::__construct();
  }
}

  // echo new Submit;
