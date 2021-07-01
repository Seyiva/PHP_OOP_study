<style type="text/css">
   .active {
    color: gray ;
   }
</style>
<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

class Link extends Tag {
  const ACTIVE = 'active' ;
  public function __construct() {
    parent::__construct('a') ;
    $this->setAttr('href','') ;
  }
  public function open() {
     $this->activateSelf() ;
     return parent::open() ;
  }
  private function activateSelf() {
    // var_dump($_SERVER['REQUEST_URI']) ;
    // var_dump($this->getAttr('href')) ;
    if($this->getAttr('href') == $_SERVER['REQUEST_URI']) { //var_dump($this->addClass('active')) ;
      $this->addClass(self::ACTIVE);
    }
  }
}

//require_once 'full_tag_class.php';


// echo (new Link())->setText(' 1.php ')->show() ."<br><br>";
// echo (new Link())->setText(' 2.php ')->show() ."<br><br>";
// echo (new Link())->setText(' 3.php ')->show() ."<br><br>";
// echo (new Link())->setText(' 4.php ')->show() ."<br><br>";
// echo (new Link())->setText(' 5.php ')->show() ."<br><br>";
