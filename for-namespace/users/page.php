<?php
namespace Users;
use \Core\Admin\Data1; // подключаем класс
use \Core\Admin\Data2; // подключаем класс

class Page extends Controller	{
  private $data1 ;
  private $data2 ;
	public function __construct()	{
		$this->data1 = new Data1('note'); // вызываем просто по имени
		$this->data2 = new Data2('book'); // вызываем просто по имени
	}
  public function getFullData() {
    return $this->data1->getData() .' and '. $this->data2->getData() ;
  }
}
