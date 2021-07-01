<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;



class Form extends Tag {
  public function __construct()  {
     parent::__construct('form') ;
   }
}
