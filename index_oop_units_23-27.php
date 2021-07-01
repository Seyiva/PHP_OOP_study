<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

//23.1 - 23.3
class Product  {
  public $name ;
  public $price ;
  public function __construct($name,$price)
  {
    $this->name = $name ;
    $this->price = $price .'$';
  }
}
$product1 = new Product('iphone',650) ;
echo $product1->name .' '. $product1->price .'<br>';
$product2 = $product1 ; // присваеваем значение переменной объекта класса
echo $product2->name .' '. $product2->price .'<br>'; // после присваивания выводит данные объекта т.к. происходит - Передача объектов по ссылке

//24.1 - 24.4  !!! списано !!!
class Arr{
    private $nums = [];
    private $sumHelper;
    private $avgHelper;

    public function __construct()    {
        $this->sumHelper = new SumHelper;
        $this->avgHelper = new AvgHelper;
    }
    public function getSum23()    {
        $nums = $this->nums;
        return $this->sumHelper->getSum2($nums) + $this->sumHelper->getSum3($nums);
    }
    public function getAvgMeanSum(){
        $nums = $this->nums;
        return $this->avgHelper->getAvg($nums) + $this->avgHelper->getMeanSquare($nums);
    }
    public function add($number)    {
        $this->nums[] = $number;
    }
}
class AvgHelper {
    public function getAvg($arr){
        $count = count($arr);
        $sum = array_sum($arr);
        $avg = $sum / $count;

        return $avg;
    }

    public function getMeanSquare($arr)    {
        $count = count($arr);
        $sum = 0;
        foreach ($arr as $elem){
            $sum += $elem * $elem;
        }
        $sqrt = sqrt($sum);
        $meanSquare = $sqrt / $count;
        return $meanSquare;
    }
}
class SumHelper {
    public function getSum2($arr)    {
        return $this->getSum($arr, 2);
    }
    public function getSum3($arr)    {
        return $this->getSum($arr, 3);
    }

    private function getSum($arr, $power)    {
        $sum = 0;
        foreach ($arr as $elem) {
            $sum += pow($elem, $power);
        }
        return $sum;
    }
}
$arr = new Arr;

$arr->add(1);
$arr->add(3);

echo $arr->getAvgMeanSum();
// 25.1 - 25.8

class Product_c {
  private $name ;
  private $price  ;
  private $quantity ;

  public function __construct($name, $price, $quantity)  {
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
  }
  public function getName()		{ //является вспомогательным методом его не запрашивать
    return $this->name;
  }
  public function getQuantity()  { //является вспомогательным методом его не запрашивать
    return $this->quantity;
  }
  public function getCost() {
    return $this->price * $this->quantity ;
  }

}
class Cart_c {
  private $products = [] ;

  public function getProducts()  {
    return $this->products;
  }
  public function add($product) {
    $key = $product->getName();
    $this->products[$key] = $product ;
  }

  public function remove($product) { $products = $this->products;
     unset($this->products[$product]);
  }

  public function getTotalCost()	{
			$sum = 0;
			foreach ($this->products as $elem) {
				$sum += $elem->getCost();
			}
			return  $sum; //'Общая стоимость всего товара ' .
	}
  public function getTotalQuantity()	{
      $sum = 0;
      foreach ($this->products as $elem) {
        $sum += $elem->getQuantity();
      }
      return $sum ; //. ' штук(а)'
  }

  public function getAvgPrice(){
       return $this->getTotalCost() / $this->getTotalQuantity();
   }
}
$cart = new Cart_c ;
$nokia = new Product_c('Nokia', 2500, 16) ;
$dunlop = new Product_c('Dunlop', 2800, 8) ;
$nexen = new Product_c('Nexen', 2600, 4) ;
$cart->add($nokia) ;
$cart->add($dunlop) ;
$cart->add($nexen) ;
var_dump($cart->getProducts()) .'<br>';
echo $cart->getTotalQuantity()  .'<br>';
echo $cart->getTotalCost()  .'<br>';
echo $cart->getAvgPrice() .'<br>'; // getAvgPrice()


// 26.1
function Compare1($obj1, $obj2) {
  if ($obj1 == $obj2) {
    return true ;
  } else {
    return false ;
  }
}
// 26.2
function Compare2($obj1, $obj2) {
  if ($obj1 === $obj2) {
    return true ;
  } else {
    return false ;
  }
}
// 26.3
function Compare3($obj1, $obj2) {
  if ($obj1 === $obj2) {
    return 1 ;
  } elseif ($obj1 == $obj2) {
    return 0 ;
  } else {
    return -1 ;
  }
}
//26.4
class Employee_comp	{
		private $name;
		private $salary;

		public function __construct($name, $salary)	{
			$this->name = $name;
			$this->salary = $salary;
		}

		public function getName()	{
			return $this->name;
		}

		public function getSalary()	{
			return $this->salary;
		}
	}
class EmployeesCollection_comp {
  private $employees = [] ;
  public function add($new_employee)	{
    if(!$this->exists($new_employee)) { // если такого работника нет (не существует - !exists() )
      $this->employees[] = $new_employee; // то добавляем
    }
  }
  public function getEmp()	{
			return $this->employees; // возращаем массив работников
	}
  private function exists($new_employee) {
    foreach ($this->employees as $employee) {
      if ($employee == $new_employee) {
        return true ;
      }
    }
    return false ;
  }
}
  $employeesCollection = new EmployeesCollection_comp;
  $mob = new Employee_comp('Mob', 100) ;
  $mob = new Employee_comp('Mob', 100) ;
	$employeesCollection->add($mob);
	$employeesCollection->add($mob); // 	второго такого же не добавит

 	var_dump($employeesCollection->getEmp()); // убедимся в этом

// in_array() вместо метода exists()
/*
public function add($newEmployee) {
	if (!in_array($newEmployee, $this->employees, false)) { // 3 параметр false значит '=='
		$this->employees[] = $newEmployee;
	}
}
public function add($newEmployee)	{
		if (!in_array($newEmployee, $this->employees, true)) { // 3 параметр true значит '==='
			 $this->employees[] = $newEmployee;
	   }
}
*/
// 27.1
class Employee_d {
  public $name ;
  public $salary ;
  public function __construct($name, $salary)	{
    $this->name = $name;
    $this->salary = $salary;
  }
  public function getName()	{
    return $this->name;
  }
  public function getSalary()	{
    return $this->salary;
  }
}

// 27.2
class Student_d {
  public $name ;
  public $scholarship  ;
  public function __construct($name, $scholarship)	{
    $this->name = $name;
    $this->scholarship = $scholarship;
  }
  public function getName()	{
    return $this->name;
  }
  public function getScholarship()	{
    return $this->scholarship;
  }
}
// для дальнейшей записи объектов в массив нужно создать класс для создания массива и добавлять юзеров как элементы
class UsersCollection {
  private  $employees = [] ;
  private  $students = [] ;
  public function getEmployees()	{
			return $this->employees;
	}
  public function getStudents()	{
      return $this->students;
  }
  public function add($elem) {
    if ($elem instanceof Employee_d) {
      $this->employees[] = $elem ;
    } elseif ($elem instanceof Student_d) {
      $this->students[] = $elem ;
    }
  }
  public function getTotalScholarship()	{
			$sum = 0;
			foreach ($this->students as $elem) {
				$sum += $elem->getScholarship();
			}
			return  $sum;
	}
  public function getTotalSalary()	{
      $sum = 0;
      foreach ($this->employees as $elem) {
        $sum += $elem->getSalary();
      }
      return $sum ;
  }

}
// 27.3
//студенты
$collection_students = new UsersCollection ;
$obj_Vald = new Student_d('Vald',80) ;
$obj_Jeck = new Student_d('Jeck',75) ;
$obj_Rony = new Student_d('Rony',65) ;
$collection_students->add($obj_Vald); $collection_students->add($obj_Jeck); $collection_students->add($obj_Rony);
var_dump($collection_students->getStudents()) ;
$students = $collection_students->getStudents() ;
// 27.4
foreach ($students as $student) {
  if ($student instanceof Student_d) {
    echo $student->name;
  }
}
//сотрудники
$collection_employees = new UsersCollection ;
$obj_Nina = new Employee_d('Nina',150) ;
$obj_Mary = new Employee_d('Mary',135) ;
$obj_Alex = new Employee_d('Alex',160) ;
$collection_employees->add($obj_Nina); $collection_employees->add($obj_Mary); $collection_employees->add($obj_Alex);
var_dump($collection_employees->getEmployees()) ;
//27.5
foreach ($collection_employees->getEmployees() as $employee) {
  if ($employee instanceof Employee_d) {
    echo $employee->name . ' ';
  }
} echo '<br>' ;
//27.6 сумму зарплат работников и студентов
echo $collection_students->getTotalScholarship() .'<br>';
echo $collection_employees->getTotalSalary() .'<br>';

//27.7
class User {
  public $name ;
  public $surname  ;
  public function __construct($name, $surname)	{
    $this->name = $name;
    $this->surname = $surname;
  }
  public function getName()	{
    return $this->name;
  }
  public function getSurname()	{
    return $this->surname;
  }
}
//27.8

class Employee extends User
{
  public $salary ;
  function __construct($name, $surname, $salary) {
      parent::__construct($name, $surname) ;
      $this->salary = $salary;
  }
  public function getSalary()	{
    return $this->salary;
  }
}
//27.9
class City {
  public $name ;
  public $population ;
  function __construct($name, $population) {
    $this->name = $name;
    $this->population = $population;
  }
  public function getName()	{
    return $this->name;
  }
  public function getPopulation()	{
    return $this->population;
  }
}
//27.10
$userObj1 = new User('Henry','Reddington') ;
$userObj2 = new User('Tom','Cruz') ;
$userObj3 = new User('Ronda','Loa') ;
$empObj1 = new Employee('Tim','Golden',250) ;
$empObj2 = new Employee('Rita','Orea',350) ;
$empObj3 = new Employee('Ingrid','Bistay',280) ;
$cityObj1 = new City('San-paule',25801) ;
$cityObj2 = new City('Milan',356784) ;
$cityObj3 = new City('Arzamas',9844) ;
$arr = [$userObj1, $empObj1,$cityObj1,$userObj2, $empObj2,$cityObj2,$userObj3, $empObj3,$cityObj3] ;

//27.11
foreach ($arr as $elem) {
  if($elem instanceof User) {
    echo $elem->name;
  }
} echo '<br>' ;
//27.12
foreach ($arr as $elem) {
  if(!$elem instanceof User) {
    echo $elem->name;
  }
} echo '<br>' ;
//27.13
foreach ($arr as $elem) {
  if($elem instanceof User and !$elem instanceof Employee) {
    echo $elem->name;
  }
} echo '<br>' ;
//27.14
class Employee_rw	{
		private $name; // имя
		private $salary; // зарплата

		public function __construct($name, $salary)		{
			$this->name = $name;
			$this->salary = $salary;
		}
		// Геттер имени:
		public function getName()	{
			return $this->name;
		}
		// Геттер зарплаты:
		public function getSalary()	{
			return $this->salary;
		}
	}
class Student_rw {
	private $name; // имя
	private $scholarship; // стипендия

	public function __construct($name, $scholarship)	{
		$this->name = $name;
		$this->scholarship = $scholarship;
	}
	// Геттер имени:
	public function getName()	{
		return $this->name;
	}
	// Геттер стипендии:
	public function getScholarship(){
		return $this->scholarship;
	}
}
class UsersCollection_rw {
  private $employees = [] ;
  private $students = [] ;
  public function add($user){
    if($user instanceof Student_rw) {
      $this->students[] = $user ;
    }
    if ($user instanceof Employee_rw) {
      $this->employees[] = $user ;
    }
  }
  // Получаем суммарную зарплату:
  public function getTotalSalary()  {
    $sum = 0;
    foreach ($this->employees as $employee) {
      $sum += $employee->getSalary();
    }
    return $sum;
  }
  // Получаем суммарную стипендию:
  public function getTotalScholarship()  {
    $sum = 0;
    foreach ($this->students as $student) {
      $sum += $student->getScholarship();
    }
    return $sum;
  }
  // Получаем общую сумму платежей и работникам, и студентам:
  public function getTotalPayment()  {
    return $this->getTotalScholarship() + $this->getTotalSalary();
  }
}
  $usersCollection = new UsersCollection_rw;

	$usersCollection->add(new Student_rw('Reddy', 100));
	$usersCollection->add(new Student_rw('Nina', 200));

	$usersCollection->add(new Employee_rw('Nick', 300));
	$usersCollection->add(new Employee_rw('Lara', 400));
	// Получим полную сумму стипендий:
	echo $usersCollection->getTotalScholarship() . '<br>'; // выведет 300
	// Получим полную сумму зарплат:
	echo $usersCollection->getTotalSalary() . '<br>'; // выведет 700
	// Получим полную сумму платежей:
	echo $usersCollection->getTotalPayment() . '<br>'; // выведет 1000
