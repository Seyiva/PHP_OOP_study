<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 68.1 - 68.4

class Image extends Tag {

  public function __construct()	{
      $this->setAttr('src','')->setAttr('alt','') ;
			parent:: __construct('img') ;
	}
  public function __toString(){
    return parent::open() ;
  }
}
