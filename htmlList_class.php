<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// Первый вариант класса
/* class HtmlList extends Tag {
  private $items = [] ;

  public function addItem(ListItem $li) { // чтобы падали объекты класса li
    $this->items[] = $li ;
    return $this ;
  }

  public function show() {
    $result = $this->open() ;

    foreach ($this->items as $item) {
      $result .= $item->show() ;
    }

    $result .= $this->close() ;

    return $result ;
  }
} */
require_once 'full_tag_class.php';
require_once 'listItem_class.php';

//3

class HtmlList extends Tag{
  private $items = [] ;
  private $name ;
  public function __construct($name)  {
    $this->name = $name ;
    return parent::__construct($name) ;

  }
  public function addLi(ListItem $listitem) {
    $this->items[] = $listitem;
    return $this ;
  }
  public function showLi() {
    $res = $this->open() ;
    foreach ($this->items as $item) {
      $res .= $item ;
    }
    $res .= $this->close() ;
    return $res ;
  }

  public function __toString() {
    return self::showLi() ;
  }
}


// $ul = new HtmlList('ul') ;
//  echo $ul->addLi((new ListItem())->setText('item5'))
//       ->addLi((new ListItem())->setText('item6'));
// var_dump($ul) ;
// var_dump($ul->showLi()) ;
//var_dump($ul->show()) ;
