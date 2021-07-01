<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';


class Textarea extends Tag {
  public function __construct()  {
    parent::__construct('textarea');
  }
}
// echo (new Textarea)->setAttr('name', 'text')->setText('mymess')->show();
