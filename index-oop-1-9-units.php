<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;
// 2.1 - 2.5
class Employee
{
  public $name ;
  public $age ;
  public $salary ;
}
$employee1 = new Employee() ;
$employee1 -> name = "Sergio" ;
$employee1 -> age = 26 ;
$employee1 -> salary = 2500 ;

$employee2 = new Employee() ;
$employee2 -> name = "Patrick" ;
$employee2 -> age = 28 ;
$employee2 -> salary = 3000 ;

echo $employee1 -> salary  + $employee2 -> salary . ' ' ;
echo $employee1 -> age  + $employee2 -> age ; echo '<br>' ;

// 3.1 and  3.2 , next units  4.7 - 4.10 setName() and setAge()

class User
{
  public $name ;
  public $age ;

  public function Show($str)
  {
    return $str . '!!!' ;
  }
  public function setName($name) { // создаем метод на смену имени
     $this-> name = $name ; // записываем новое значение свойства name
  }
  public function setAge($age) {
    if($this-> age > 18 ) {
      $this-> age = $age ;
    } else {
      return $this-> age ;
    }
  }
}
$user = new User ;
$user -> name = 'Custodian' ;
$user -> age = 20 ;
echo $user -> Show('Hello') ; echo '<br>' ;
$user -> setName('Silent') ; // записываем новое имя
echo $user -> name ; echo '<br>' ; // выводим новое имя
$user -> setAge(26) ;
echo $user -> age ; echo '<br>' ;


// 4.1 and 4.6 , 4.11 - doubleSalary()
class Employeetop
{
  public $name ;
  public $age ;
  public $salary ;

  public function getName() {
    return $this->name ;
  }
  public function getAge() {
    return $this->age ;
  }
  public function getSalary($num) {
    return $this->salary = $num ;
  }
  public function checkAge() {
    if($this-> age >= 18) {
      return true ;
    } else {
      return false ;
    }
  }
  public function doubleSalary() {
    return $this->salary * 2  ;
  }
}
$employeet1 = new Employeetop() ;
$employeet1 -> name = 'Fred' ;
$employeet1 -> age = 25 ;

$employeet2 = new Employeetop() ;
$employeet2 -> name = 'Rob' ;

$employeet3 = new Employeetop() ;
$employeet3 -> name = 'Killer' ;
$employeet3 -> salary = 200 ;
echo $employeet1 -> getName() . ' '; echo $employeet1 -> getAge() . ' ';
echo $employeet1 -> checkAge() . ' ';
echo $employeet1 -> getSalary(250) + $employeet2 -> getSalary(100) .'USD'; echo '<br>' ;
echo $employeet3 ->  doubleSalary() ; echo '<br>' ;

// 4.12 - 4.14
class Rectangle {
  public $height ;
  public $width ;

  public function getSquare() {
    return $this-> height * $this-> width ;
  }

  public function getPerimeter() {
    return ($this-> height + $this-> width) * 2;
  }
}
$rectangle_1 = new Rectangle() ;
$rectangle_1-> height = 9;
$rectangle_1-> width = 8;
echo $rectangle_1-> getSquare() .' and '. $rectangle_1-> getPerimeter(); echo '<br>' ;

// 5.1 - 5.3
class User_free {
  public $name ;
  public $age ;

  public function isAgeCorrect($age) {
    return $age >= 18 and $age <= 60 ;
  }

  public function setAge($age) {
    if( $this->isAgeCorrect($age) ) {
      $this-> age = $age ;
    }
  }

  public function addAge($years) {
    $newage = $this-> age + $years ;

    if($this->isAgeCorrect($newage)) {
      $this-> age = $newage ;
    }
  }
  public function subAge($years) {
    $newage = $this-> age - $years ;

    if($this->isAgeCorrect($newage)) {
      $this->age = $newage ;
    }
  }
}
$user_first = new User_free ;
$user_first->setAge(25) ; echo $user_first-> age . ' ';
$user_first->addAge(10) ; echo $user_first-> age . ' ';  // возращает возраст от setAge
$user_first->subAge(5) ; echo $user_first-> age . ' ';  echo '<br>' ; // возращает возраст от addAge

// 6.3 - 6.6

class Student
	{
		public $name;
		public $course;

    public function setCourse($course) {
      if($this-> isCourseCorrect($course)) {
        $this-> course = $course ;
      }
    }

    public function transferToNextCourse($one_course) {
      $newCourse = $this-> course + $one_course ;

      if($this->isCourseCorrect($newCourse)) {
        $this-> course = $newCourse;
      }
    }
    private function isCourseCorrect($course) {
      if($course >= 1 and $course <= 5) {
          return true ;
      } else {
          return false ;
      }
    }
	}

	$student1 = new Student ;
  $student1-> setCourse(5); echo $student1-> course . ' ';
  $student1-> transferToNextCourse(1); echo $student1-> course . ' ';  echo '<br>' ;

// 7.1 - 7.4

class Employee_y {
  public $name;
	public $age;
  public $salary;

  public function __construct($name, $age, $salary) {
    $this-> name = $name;
    $this-> age = $age;
    $this-> salary = $salary;
  }
}
$employee_first = new Employee_y('john', 28, 1500) ;
echo $employee_first-> name .' '. $employee_first-> age .' '. $employee_first-> salary ;
$employee_second = new Employee_y('jimbo', 31, 2000) ;  echo '<br>' ;
echo $employee_second-> name .' '. $employee_second-> age .' '. $employee_second-> salary ; echo '<br>' ;
echo $employee_first-> salary + $employee_second-> salary  ; echo '<br>' ;

// 8.1 - 8.4

class Employee_x {
  private $name;
	private $age;
  private $salary;

  public function getName() {
    return $this-> name ;
  }
  public function setName($name) {
    $this-> name = $name ;
  }
  public function getAge() {
    return $this-> age ;
  }

  public function setAge($age) {
    if($this-> isAgeCorrect($age)) {
      $this-> age = $age ;
    }
  }

  public function getSalary() {
    return $this-> salary .' $';
  }
  public function setSalary($salary) {
    $this-> salary = $salary ;
  }
  private function isAgeCorrect($age) {
     $age >= 1 and $age <= 100 ;
  }
}
$emp_a =  new Employee_x ;
$emp_a-> setName('Jehson') ; echo $emp_a-> getName() .' ';
$emp_a-> setAge(20) ; echo $emp_a-> getAge() .' ';
$emp_a-> setSalary(500) ; echo $emp_a-> getSalary() ;  echo '<br>' ;

// 9.1 - 9.2

class Employee_t {
  private $name;
	private $surname;
  private $salary;

  public function __construct($name, $surname, $salary) {
    $this-> name = $name;
    $this-> surname = $surname;
    $this-> salary = $salary;
  }

  public function getName()
  {
    return $this-> name;
  }
  public function getSurname()
  {
    return $this-> surname;
  }
  public function getSalary()
  {
    return $this-> salary . '$';
  }
  public function setSalary($salary)
  {
    $this-> salary = $salary ;
  }
}
$employee_t = new Employee_t('Stana','Catich', 1800) ;
echo $employee_t-> getName() .' '. $employee_t-> getSurname() .' '. $employee_t-> getSalary() ;
$employee_t-> setSalary(2100) ; echo ' or new salary ' .$employee_t-> getSalary() ;
