<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

//28.1
class Post {
  private $name ;
  private $salary ;
  public function __construct($name, $salary)  {
    $this->name = $name ;
    $this->salary = $salary ;
  }
  public function getName()	{
		return $this->name;
	}
  public function getPostSalary()	{
    return $this->salary;
  }
}
//28.2
$programmer = new Post('Programmer', 1500) ;
$manager = new Post('Manager', 800) ;
$bloger = new Post('Bloger', 250) ;
//28.3
class Employee  {
  private $name ;
  private $surname  ;
  private $post ;
  public function __construct($name, $surname, Post $post)	{
    $this->name = $name;
    $this->surname = $surname;
    $this->post = $post;
  }
  public function getName()	{
    return $this->name;
  }
  public function getSurname()	{
    return $this->surname;
  }
  public function getPost()	{
    return $this->post;
  }
  public function getPostName() {
    return $this->post->getName() ;
  }
  public function getSalary() {
    return $this->post->getPostSalary() ;
  }
  public function changePost(Post $post){
    $this->post = $post;
  }
}
//28.7
$employee = new Employee('Sandra', 'Koln', $manager) ;
echo $employee->getName(). $employee->getSurname() . $employee->getPostName() . $employee->getSalary(); //28.8
$employee->changePost($bloger) ; echo $employee->getPostName() . '<br>' ;

// 29.1
class ArraySumHelper	{
		public static function getSum1($arr)		{
			return self::getSum($arr, 1);
		}

		public static function getSum2($arr)		{
			return self::getSum($arr, 2);
		}

		public static function getSum3($arr)		{
			return self::getSum($arr, 3);
		}

		public static function getSum4($arr)		{
			return self::getSum($arr, 4);
		}

		private static function getSum($arr, $power) {
			$sum = 0;
			foreach ($arr as $elem) {
				$sum += pow($elem, $power);
			}
			return $sum;
		}
	}
// 29.2
echo ArraySumHelper::getSum2([4], 2) . '<br>'; // выведет 6
// 30.1
class Num {
  public static $num1 = 2;
  public static $num2 = 3 ;
}
echo Num::$num1 + Num::$num2 . '<br>';
// 30.2
class Num_for_self {
  private static $num1 = 4;
  private static $num2 = 3 ;

  public static function getSum()
  {
    return self::$num1 + self::$num2 ;
  }
}
echo  Num_for_self::getSum() . '<br>' ;
// 30.4
class Geometry	{
		private static $pi = 3.14; // вынесем Пи в свойство

		public static function getCircleSquare($radius)		{
			return self::$pi * $radius * $radius;
		}

		public static function getCircleСircuit($radius)		{
			return 2 * self::$pi * $radius;
		}
    public static function getCircleVolume($radius) {
      return 4/3 * self::$pi * self::getSum3($radius) ;
    }

    public static function getSum3($arr)		{
			return self::getSum($arr, 3);
		}

		private static function getSum($arr, $power) {
			$sum = 0;
			foreach ($arr as $elem) {
				$sum += pow($elem, $power);
			}
			return $sum;
		}
	}
echo  Geometry::getCircleVolume([6])  . '<br>';

// 31.1 , 31.2
class User_s {
  private static $count = 0 ;
  public $name ;
  public function __construct($name)  {
    $this->name = $name ;
    self::$count++ ;
  }
  public static function getCount() {
    return self::$count ;
  }
}
$user1 = new User_s('user1'); echo User_s::getCount() . ' ';
$user2 = new User_s('user2'); echo User_s::getCount() . '<br>';
// 32.1 , 32.2
class Circle	{
		const PI = 3.14; // запишем число ПИ в константу
		private $radius; // радиус круга

		public function __construct($radius)	{
			$this->radius = $radius;
		}
    public function getRad() {
      return $this->radius ;
    }
		// Найдем площадь:
		public function getSquare()	{
			self::PI * ($radius * $radius) ; // Пи умножить на квадрат радиуса
		}

		// Найдем длину окружности:
		public function getCircuit()	{
			return 2 * self::PI * self::getRad() ;  // 2 Пи умножить на радиус
		}
	}
$circle = new Circle(10) ;
echo  $circle->getCircuit() . '<br>';

// 33.1
class Epu {
    function name()  {
        echo "Меня зовут " , get_class($this) , "\n";
    }
}
$epu = new Epu ;
echo "Его зовут " , get_class($epu) , "\n" ; // внешний вызов
echo $epu->name() ; // внутренний вызов
echo '<br>' ;
// 33.2
class Test1 {
  public $name ;
}
class Test2 {
    public $name ;
}
$test1_name1 = new Test1 ; $test1_name1->name = 'Nick' ;
$test1_name2 = new Test1 ; $test1_name2->name = 'Rob' ;
$test2_name3 = new Test2 ; $test2_name3->name = 'Mick' ;
$test2_name4 = new Test2 ; $test2_name4->name = 'Iren' ;
$arr = [$test1_name1, $test2_name3, $test2_name4, $test1_name2] ;
foreach ($arr as $elem) {
  echo get_class($elem) . ' - ' . $elem->name . '<br>';
}
// 33.3
class Test {
  function method1() {  }
  function method2() {  }
  function method3() {  }
}
var_dump(get_class_methods(new Test())) ;
// 33.4
$test = get_class_methods('Test') ;
foreach ($test as $method_name) {
    echo "$method_name  \n";
}
// 33.5
class Test_any {
  var $prop1 = 10;
  var $prop2 = "del";
  private $prop3 ;
  private $prop4 = "left";
  function __construct() { // !!!get_class_vars не меняет значения!!!
      $this->prop2 = "add";
      $this->prop3 = "left";
      return true;
  }
}
var_dump(get_class_vars('Test_any')) ; // 33.6

$any_test = new Test_any() ;
$class_vars = get_class_vars(get_class($any_test)) ;  // 33.7
foreach ($class_vars as $name => $value) {
    echo "$name : $value\n";
}

// 33.8 get_object_vars возращает только public no static properties
class Test_pro {
  public $prop1 = 10;
  public static $prop2 = "add";
  private $prop3 ;
  private $prop4 = "left";
  function method1_pro() { }
}
$pro_Test = new Test_pro() ;
var_dump(get_object_vars($pro_Test)) ;
// 33.9
class Test_i {}   //class Test_t {}
if(class_exists('Test_i')){ $ti = new Test_i ; var_dump( $ti);}
if(class_exists('Test_t')){ $tm = new Test_t ; var_dump( $tm);}
// 33.10
/* $class = $_GET['class'];
if(class_exists($class)){
    echo 'Есть!';
} else {
    echo 'Нет!';
} */
// 33.11
$Test_pro = new Test_pro('.') ;
var_dump(method_exists($Test_pro,'method1_pro'))  ;
// 33.12
/* $class = $_GET['class'];
$method = $_GET['method'];
if(class_exists($class) == true){
    if(method_exists($class, $method) == true){
        $object11 = new $class;
        echo $object11->$method;
    } else {
        echo 'Такого метода нет!';
    }
}else{
    echo 'Такого класса нет!';
} */
// 33.13
class MiTest { private $gta = 'bomdy'; public $cs = 'redy'; public $rpm = 14;}
var_dump (property_exists('MiTest','gta'))  ;
// 33.14
$arr2 = ['gta'=>'bomdy', 'rpm'=>'redy', 'cs'=>14] ;
foreach ($arr2 as $prop => $value) {
  if(property_exists('MiTest',$prop)) {
    echo "$prop - $value;  \n ";
  }
}
// 33.15
class ParentClass { }
class ChildClass extends ParentClass {
  function Child1() {
    echo "It's class son  " . get_parent_class($this) ;
  }
}
$ch1 = new ChildClass ; echo $ch1->Child1() ."<br>" ;
// 33.16
class GrandParentClassT { }
class ParentClassT extends GrandParentClassT { }
class ChildClassT extends ParentClassT { }
$WGP = new GrandParentClassT() ;
$WP = new ParentClassT() ;
$WCH = new ChildClassT() ;
//33.17
if(is_subclass_of($WCH,'GrandParentClassT')) { echo "ChildClassT потомок GrandParentClassT";}
else { echo "ChildClassT НЕ потомок GrandParentClassT"; } echo "<br>" ;
//33.18
if(is_subclass_of($WP,'GrandParentClassT')) { echo "ParentClassT потомок GrandParentClassT";}
else { echo "ParentClassT НЕ потомок GrandParentClassT"; } echo "<br>" ;
//33.19
if(is_subclass_of($WCH,'ParentClassT')) { echo "ChildClassT потомок ParentClassT";}
else { echo "ChildClassT НЕ потомок ParentClassT"; } echo "<br>" ;
//33.21
$obj = new ChildClassT() ;
if(is_a($obj,'ChildClassT')) {
  echo "Yes, object \$obj belongs of class ChildClassT\n ";
}
//33.22
if(is_a($obj,'ParentClassT')) {
  echo "Yes, object \$obj not belongs of class ParentClassT\n ";
} echo "<br>" ;
//33.23 var_dump(get_declared_classes());
