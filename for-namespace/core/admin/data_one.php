<?php
namespace Core\Admin ;

class Data1 {
  private $str ;
  public function __construct(string $str) {
    $this->str = $str ;
  }
  public function getData() {
    return $this->str ;
  }
}
$d1 =new Data1('Data1str') ;
echo $d1->getData() ;
