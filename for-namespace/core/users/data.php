<?php
namespace Core\Users ;

class Data {
  private $str ;
  public function __construct(string $str) {
    $this->str = $str ;
  }
  public function __toString() {
    return $this->str ;
  }
}
