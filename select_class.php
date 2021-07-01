<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// require_once 'full_tag_class.php';
// require_once 'option_class.php';


class Select extends Tag {
  private $items = [] ;

  public function add(Option $opti) { // чтобы падали объекты класса li
    $this->items[] = $opti ;
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
}
