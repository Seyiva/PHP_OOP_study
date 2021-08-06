<?php
namespace Core\Admin ;

class Data2 {
  private $str ;
  public function __construct(string $str) {
    $this->str = $str ;
  }
  public function getData() {
    return $this->str ;
  }
}
$d2 =new Data1('Data2str') ;
echo $d2->getData() ;
