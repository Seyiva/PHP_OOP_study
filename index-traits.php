<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 46.1
trait Helper	{
		private $name;
		private $age;

		public function getName()		{		return $this->name;		}
		public function getAge()		{		return $this->age;		}
}
class Counrty {
  use Helper ;
  private $population ;

  public function __construct($name, $age, $population )		{
			$this->name = $name;
			$this->age = $age;
      $this->population = $population ;
		}
  public function getPopulation()		{		return $this->population;		}
}
$cnty = new Counrty('Italy',250,895476);
echo $cnty->getName() . $cnty->getPopulation() ."<br>";

//46.2 - 46.3
trait Trait1 { private function method1() {  return 1  ; }   }
trait Trait2 { private function method2() {  return 2  ; }   }
trait Trait3 { private function method3() {  return 3  ; }   }
class Test {
  use Trait1, Trait2, Trait3 ;
  public function getSum() { return $this->method1() + $this->method2() + $this->method3() ; }
}
$test_obj = new Test() ; echo $test_obj->getSum() ."<br>";

// 47.1 - 47.2
trait Trait1_1 { private function method() {  return 5  ; }   }
trait Trait2_2 { private function method() {  return 7  ; }   }
trait Trait3_3 { private function method() {  return 9  ; }   }
class Test_tr {
  use Trait1_1, Trait2_2, Trait3_3 {
    Trait1_1::method insteadof Trait2_2 ;
    Trait1_1::method insteadof Trait3_3 ;
    Trait1_1::method as method1;
    Trait2_2::method as method2;
    Trait3_3::method as method3;
  }
  public function getSum() { return $this->method1() + $this->method2() + $this->method3() ; }
}
$test_tr = new Test_tr ;
echo $test_tr->getSum() ."<br>";
/*  class Test	{
		use TestTrait {
			TestTrait::method as public; // меняем метод на публичный
		}
	}    */

// 50.1
trait TestTrait	{
	public function method1()		{
		return 1;
	}
	// Абстрактный метод:
	abstract public function method2();
}
class Test_t	{
	use TestTrait; // используем трейт
	// Реализуем абстрактный метод:
	public function method2()		{
		return 2;
	}
}
// Fatal error: Class Test_t contains 1 abstract method and must therefore be declared abstract
// or implement the remaining methods (Test_t::method2) in W:\

// 51.1
trait Trait11 { private function method1() {  return 11  ; }   }
trait Trait12 { private function method2() {  return 12 ; }   }

class Test_m3 {
  use Trait11, Trait12 ;
  private function method3() {  return 13  ; }
  public function getSum() {
    return $this->method1() + $this->method2() + $this->method3() ;
  }
}
$trait_m3 = new Test_m3;
echo $trait_m3->getSum() ."<br>";

// 52.1
trait Trait_1 {  public function getTrait() { }  }
var_dump (trait_exists ('Trait_2')) ;
// 52.2
var_dump (get_declared_traits ( )) ;
