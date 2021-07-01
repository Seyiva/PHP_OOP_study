<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;
// Первый вариант класса
/*class ListItem extends Tag {
  public function __construct()  {
    parent::__construct('li') ;
  }
} */
require_once 'full_tag_class.php';
// Второй вариант класса
class ListItem extends Tag {

  public function __construct()  {
    return parent::__construct('li') ;
  }

  public function __toString(){
    return parent::show() ;
  }
}
// $link = new ListItem() ;
// echo $link->setText('item1') ;
// var_dump($link) ;
