<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'listItem_class.php';
require_once 'htmlList_class.php';

class Ol extends HtmlList {
  public function __construct()  {
     parent::__construct('ol') ;
   }
   public function __toString(){
     return self::showLi() ;
   }
}
// $ol = new Ol;
// echo $ol->addLi((new ListItem())->setText('item7'));
