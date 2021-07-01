<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 10.2
require_once 'Employee.php';
$employee = new Employee ;
echo $employee->name = 'Bill';

//11.1 - 11.3

class City {
  public $name;
  public $population;

  public function __construct($name, $population)
  {
     $this-> name = $name;
     $this-> population = $population;
  }
}
$cities = [ new City('London', 158084),
            new City('Paris', 567084),
            new City('Drezden', 34589),
            new City('San-Francisco', 744589),
            new City('Milan', 5574)
            ] ;
  var_dump($cities) ;

  foreach ($cities as $city) {
		echo $city->name . ' ' . $city->population . '<br>';
	}

// 12.1 - 12.2

class Student {
  private $name ;
  private $course ;

  public function __construct($name)  {
     $this-> name = $name;
     $this-> course = 5;
  }
  public function getName(){
    return  $this-> name ;
  }
  public function getCourse(){
    return  $this-> course ;
  }
  public function transferToNextCourse() {
    if ($this->course < 5 ) {
    	 $this->course++ ;
    }
	}
}
$student = new Student('Lary') ;
echo $student->getCourse() .' '; // выведет 1 - начальное значение
$student->transferToNextCourse(); // переведем студента на следующий курс
echo $student->getCourse() . '<br>'; // выведет 2

// 13.1 -13.2

  class Arr
  {
      private $numbers = [];
      public function add($new_part = [])  {
          $this->numbers = array_merge($this->numbers, $new_part);
      }
      public function get_numbers_str()   {
          return implode(', ', $this->numbers);
      }

      public function get_avg()   {
          $sum = 0;
          $count = sizeof($this->numbers);
          foreach ($this->numbers as $num)   {
              $sum = $sum + $num;
          }
          return $sum / $count;
      }
  }
  $arr = new Arr;
  $arr-> add([4,5]);
  $arr-> add([7]);
  echo $arr->get_avg() ;
// или массив или число

//14.1 - 14.2
class City_one {
  public $name ;
	public $foundation ;
  public $population ;
  public function __construct($name, $foundation, $population) {
			$this->name = $name;
			$this->foundation = $foundation;
      $this->population = $population;
		}
}
$props = [ new City_one('Berlin',1750, 195254) ] ;
foreach ($props as $prop) {
  echo $prop->name . ' ' . $prop->foundation . ' ' . $prop->population .  '<br>';
}
//14.3
class User_too
	{
		public $surname; // фамилия
		public $name; // имя
		public $patronymic; // отчество

		public function __construct($surname, $name, $patronymic)
		{
			$this->surname = $surname;
			$this->name = $name;
			$this->patronymic = $patronymic;
		}
	}

  $user_too = new User_too('Иванов', 'Иван', 'Иванович');
  	$props = ['surname', 'name', 'patronymic'];
  	echo $user_too->{$props[2]} .  '<br>';

  class Prop  	{
  		public $value;
  		public function __construct($value)
  		{
  			$this->value = $value;  // Имя свойства из свойства другого объекта
  		}
      public function getValue()		{
			     return $this->value;  // Имя свойства из метода другого объекта
		  }
  	}
  $user_too = new User_too('Кларк', 'Рони', 'Валкинс');
	$prop = new Prop('patronymic');
	echo $user_too->{$prop->value} .  '<br>'; //Имя свойства из свойства другого объекта
	$prop = new Prop('surname');
	echo $user_too->{$prop->getValue()} .  '<br>'; // Имя свойства из метода другого объекта
/*  $user = new User_too('Иванов', 'Иван', 'Иванович');
	$props = ['prop1' => 'surname', 'prop2' => 'name', 'prop3' => 'patronymic'];
	echo $user->{$props['prop2']} .  '<br>';
  function getProp()
	{
		return 'surname';
	}

	$user = new User_too('Иванов', 'Иван', 'Иванович');
	echo $user->{getProp()}; // выведет 'Иванов'   */

//15.1
echo "15.1 !!! <br>";
 class User_floo
	{
    private $name;
		private $age;

		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getAge()
		{
			return $this->age;
		}
	}
  $user = new User_floo('Коля', 21);
	$method = 'getName';
	echo $user->$method() .'<br>';
	$methods = ['getName', 'getAge'];
	echo $user->{$methods[0]}() .   '<br>';
  $methods = ['method1' => 'getName', 'method2' => 'getAge'];
  foreach ($methods as $method) {
    echo $user->{$method}(). '<br>';
  }

//16.1
class Arr_floo {
  private $numbers = [];
  public function __construct($numbers)
  {
    $this->numbers = $numbers; // записываем массив $numbers в свойство
  }
  public function add($number) { // метод для записи любого числа
    $this->numbers[] = $number ; // в этот массив добаваляем число
  }
  public function getSum() {
			return array_sum($this->numbers); // складываем все элементы этого массива
	}
}
$arr_floo = new Arr_floo([1, 2, 3]); // создаем объект, записываем в него массив [1,2, 3]

$arr_floo->add(4); // добавляем в конец массива число 4
$arr_floo->add(5); // добавляем в конец массива число 5
echo $arr_floo->getSum() . '<br>' ; // Находим сумму элементов массива: выведет 15
echo (new Arr_floo([1, 2, 3]))->getSum() + (new Arr_floo([4, 5, 6]))->getSum() . '<br>';

//17.1 - 17.2
class Arr_top {
  private $numbers = [];
  private $nums = [] ;
  public function add($number) { // метод для записи любого числа
    $this->numbers[] = $number ; // в этот массив добаваляем число
    return $this ;
  }
  public function getSum() {
			return array_sum($this->numbers); // складываем все элементы этого массива
	}
  public function append($nums) { //17.2
    array_push($this->numbers, $nums) ;
    return $this ;
  }
}
$arr_top = new Arr_top ;
echo $arr_top->add(4)->add(6)->add(8)->getSum() . '<br>';
 echo $arr_top->add(2)->append([3,4])->getSum() . '<br>';

//17.3
class User_top {
  private $name ;
  private $surname ;
  private $patronymic ;

  public function getName() {
    return $this->name ;
  }
  public function setName($name) {
    $this->name = $name ;
    return $this ;
  }
  public function getSurname() {
    return $this->surname ;
  }
  public function setSurname($surname) {
    $this->surname = $surname ;
    return $this ;
  }
  public function getPatronymic() {
    return $this->patronymic ;
  }
  public function setPatronymic($patronymic) {
    $this->patronymic = $patronymic ;
    return $this ;
  }

  public function getFullName() {
    return $this->getName()[0].$this->getSurname()[0].$this->getPatronymic()[0];
  }
}
$user_top = new User_top ;
$user_top->setPatronymic('Upgradies');$user_top->setName('Nick'); $user_top->setSurname('Remod');
echo $user_top->getFullName() . '<br>' ;
echo (new User_top)->setName('Nick')->setSurname('Remod')->setPatronymic('Upgradies')->getFullName() . '<br>' ;

//18.1

class ArrayAvgHelper	{
		/*	Находит сумму первых степеней элементов массива:	*/
		public function getAvg1($arr)
		{
      return $this->getSum($arr, 1);
		}
		/*	Находит сумму вторых степеней	элементов массива и извлекает	из нее квадратный корень:	*/
		public function getAvg2($arr)
		{
      $power = 2;
        $sum2 = $this->getSum($arr, $power);
        return $this->calcSqrt($sum2, $power);
		}
		/*	Находит сумму третьих степеней	элементов массива и извлекает	из нее кубический корень: */
		public function getAvg3($arr)
		{
      $power = 3;
        $sum2 = $this->getSum($arr, $power);
        return $this->calcSqrt($sum2, $power);
		}
		/*	Находит сумму четвертых степеней	элементов массива и извлекает	из нее корень четвертой степени: */
		public function getAvg4($arr)
		{
      $sum4 = $this->getSum($arr, 4) ;
      return $this->calcSqrt($sum4, 4) ;
		}
		/*	Вспомогательный метод, который параметром	принимает массив и степень и возвращает	сумму степеней элементов массива:	*/
		private function getSum($arr, $power)
		{
      $sum = 0;
      foreach ($arr as $elem) {
        $sum += pow($elem, $power);
      }
      return $sum;
		}
		/*	Вспомогательный метод, который параметром	принимает целое число и степень и возвращает	корень заданной степени из числа:	*/
		private function calcSqrt($num, $power)	{
      $p = 1/$power;
      return pow($num, $p) ;
		}
	}
  $avg_arr = new ArrayAvgHelper ;
  echo $avg_arr->getAvg4([4],4) . '<br>';

//19.1-19.4 to look in line 366 and 403
class User_r {
  private $name ;
  private $age ;
  public function getName() {
    return $this->name ;
  }
  public function setName($name) {
    $this->name = $name ;
  }
  public function getAge() {
    return $this->age ;
  }
  public function setAge($age) {
    $this->age = $age ;
  }
}
class Employee_r extends User_r {
  private $salary ;

  public function getSalary() {
    return $this->salary .' $';
  }
  public function setSalary($salary) {
    $this->salary = $salary ;
  }
}
$emp_r = new Employee_r();
$emp_r->setSalary(150);
$emp_r->setName('Nick');
$emp_r->setAge(21);
echo $emp_r->getName(). ' '. $emp_r->getAge().' '.$emp_r->getSalary() .'<br>';

class Student_r extends User_r {
  private $course;

  public function getCourse() {
    return $this->course . ' course' ;
  }
  public function setCourse($course) {
    $this->course = $course ;
  }
}
$student_r = new Student_r ;
$student_r->setCourse(2); $student_r->setName('Vlady'); $student_r->setAge(20);
echo $student_r->getName(). ' '. $student_r->getAge().' '.$student_r->getCourse() .'<br>';

class Programmer_r extends Employee_r {
  private $langs = [] ;

  public function getLangs() {
    return $this->langs ;
  }
  public function setLangs($langs) {
    $this->langs = $langs ;
    return $this ;
  }
}
$programmer = new Programmer_r ;
$programmer->setLangs(['html','php']) ; $programmer->setName('Sergio') ;
echo $programmer->getName();
var_dump($programmer->getLangs()).'<br>';
$methods = $programmer->getLangs();
foreach ($methods as $method) {
  echo $method . ' ' ;
} echo "<br>";


class Driver_r extends Employee_r {
  private $experience ;
  private $categories = [] ;

  public function getExperience() {
    return $this->experience ;
  }
  public function setExperience($experience) {
    $this->experience = $experience ;
    return $this ;
  }

  public function addCategory($category) {
    $this->categories[] = $category ;
    return $this ;
  }
  public function getCategory() {
    return $this->categories  ;
  }
}
$driver = new Driver_r ;
$driver->setName('Ted') ;
$driver->addCategory('B')->addCategory('D') ;
echo $driver->getName(). ' ';
$categoriesArr = $driver->getCategory() ;
foreach ($categoriesArr as $categ) {
  echo $categ . ' ';
} echo "<br>";



// 20.1
class User_q {
		private $name;
		protected $age; // объявим свойство как protected

		public function getName()	{
			return $this->name;
		}

		public function setName($name)	{
			$this->name = $name;
		}

		public function getAge()	{
			return $this->age;
		}

		public function setAge($age)	{
			$this->age = $age;
		}
	}
	class Student_q extends User_q {
    public function addOneYear() {
      return $this->age++ ;
    }
    public function getCourse() {
      return $this->course . ' course' ;
    }
    public function setCourse($course) {
      $this->course = $course ;
    }
  }
  $st_q = new Student_q ;
  $st_q->setAge(22); echo $st_q->getAge(). ' ';
  $st_q->addOneYear(); echo 'after + one year ' .$st_q->getAge() . '<br>';

  //21.1 - 21.2
  class User_prot 	{
  		protected $name; // изменим модификатор доступа на protected
  		protected $age; // изменим модификатор доступа на protected

  		public function getName()	{
  			return $this->name;
  		}

  		public function setName($name)	{
        if(strlen($name) > 3){
    			$this->name = $name;
        }
  		}

  		public function getAge()	{
  			return $this->age;
  		}

  		public function setAge($age)	{
  			if ($age >= 18) {
  				$this->age = $age;
  			}
  		}
  	}
  class Student_prot extends User_prot	{
		private $course;

		public function setAge($age)
		{
			if ($age <= 25) { // Если возраст меньше или равен 25:
				// Вызываем метод родителя:
				parent::setAge($age); // в родителе выполняется проверка age >= 18
		 	}
		}
		public function setName($name) {
      if(strlen($name) <= 10) {
        parent::setName($name) ;
      }
    }
		public function getCourse()	{
			return $this->course;
		}

		public function setCourse($course)	{
			$this->course = $course;
		}
	}
$st_prot = new Student_prot ;
$st_prot->setName('Franchesco') ; echo $st_prot->getName() .'<br>';

// 22.1
class User_four {
  protected $name;
  protected $age;

  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }
  public function getName()	{
		return $this->name;
	}

	public function getAge() {
		return $this->age;
	}
}
class Student_four extends User_four {
  private $course ;

  public function __construct($name, $age, $course) {
    $this->name = $name;
    $this->age = $age;
    $this->course = $course;
  }
  public function getCourse()	{
		return $this->course;
	}
}
$st_four = new Student_four('Bally', 20, 3) ;
echo $st_four->getName(); echo $st_four->getAge();  echo $st_four->getCourse() .'<br>';
// 22.2 - 22.3
class User_tea {
  private $name ;
  private $surname ;
  private $birthdate ;
  private $age ;

  public function __construct($name, $surname, $birthdate) {
    $this->name = $name;
    $this->surname = $surname;
    $this->birthdate = $birthdate;
    $this->age = $this->calculateAge();
  }
  public function getName()	{
		return $this->name;
	}
  public function getSurname()	{
		return $this->surname;
	}

  public function calculateAge() {
    $birthdate = strtotime($this->birthdate) ;
    $age = date('Y') - date('Y',$birthdate) ;
    if(date('dm',$birthdate) > date('dm')) {
      $age-- ;
    }
    return $age ;
  }
}
$user_tea = new User_tea('Roland', 'Backut', '2002-02-18') ;
echo $user_tea->calculateAge() .'<br>';


// 22.6
 class Employee_tea extends User_tea {
  private $salary ;

  public function __construct($name, $surname,  $birthday ,$salary)	{
			parent::__construct($name, $surname,$birthday); // вызываем конструктор родителя

		 	$this->salary = $salary ;
	}
  public function getSalary()	{
		return $this->salary ;
	}
}
$emp_tea = new Employee_tea('Mirak', 'Lonker', '2001-02-18',250) ;
echo $emp_tea->getSurname() ; echo $emp_tea->getSalary() ;
