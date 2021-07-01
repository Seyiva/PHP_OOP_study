<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;
// 35.1
abstract class User {
    private $name ;
    public function getName() {
      return $this->name ;
    }
    public function setName($name) {
      $this->name = $name;
    }
    abstract public function increaseRevenue($value) ; //35.2
    abstract public function decreaseRevenue ($value) ; //35.3
}
class Employee extends User {
  private $salary ;
  public function getSalary() {
    return $this->salary ;
  }
  public function setSalary($salary) {
    $this->salary = $salary;
  }
  public function increaseRevenue($value) {
    $this->salary = $this->salary + $value ;
  }
  public function decreaseRevenue ($value) {
    $this->salary = $this->salary - $value ;
  }
}
class Student extends User {
  private $scholarship ;
  public function getScholarship() {
    return $this->scholarship ;
  }
  public function setScholarship($scholarship) {
    $this->scholarship = $scholarship;
  }
  public function increaseRevenue($value) {
    $this->scholarship = $this->scholarship + $value ;
  }
  public function decreaseRevenue ($value) {
    $this->scholarship = $this->scholarship - $value ;
  }
}
$emp = new Student ; $emp->setName('Joseph') ; $emp->setScholarship(1520) ;
echo $emp->getName() . $emp->getScholarship() . "\n";
$emp->increaseRevenue(280) ; echo $emp->getScholarship() ."<br>";

//35.4
abstract class Figure {
	abstract public function getSquare();
	abstract public function getPerimeter();
}
class Rectangle extends Figure {
	private $a;
	private $b;
	public function __construct($a,$b)	{
		$this->a = $a;
    $this->b = $b;
	}
	public function getSquare()	{
		return $this->a * $this->b;
	}
	public function getPerimeter()	{
		return 2 * ($this->a + $this->b);
	}
  public function getSquarePerimeterSum()	{ // 35.5
			return $this->getSquare() + $this->getPerimeter();
		}
}
$rectangle = new Rectangle(5,3);
echo $rectangle->getSquare() . "\n";
echo $rectangle->getPerimeter() . "\n" ;
echo $rectangle->getSquarePerimeterSum() ."<br>";

// 36.1
interface iFigure {
  public function getSquareDisk()	;
}
class Disk  implements iFigure {
  const PI = 3.14; // запишем число ПИ в константу
  private $radius; // радиус круга

  public function __construct($radius)	{
    $this->radius = $radius;
  }
  public function getRadius() {
    return $this->radius ;
  }
  public function getSquareDisk()	{
    return self::PI * ($this->getRadius()* $this->getRadius())   ; // Пи умножить на квадрат радиуса
  }
}
$disk = new Disk(7) ; echo $disk->getRadius() .' or '. $disk->getSquareDisk() ."<br>";

// 37.1
class FiguresCollection {
  private $figures = [] ;
  public function addFigure($figure) {
    $this->figures[] = $figure ;
  }
  public function getSquare()	{ return $this->a * $this->b; }
  public function getPerimeter()	{ return 2 * ($this->a + $this->b);  }
  public function getTotalSquare()		{
			$sum = 0;
			foreach ($this->figures as $figure) {
				$sum += $figure->getSquare(); // используем метод getSquare
			}
			return $sum;
	}
  public function getTotalPerimeter() { // 37.2
    $sum = 0;
    foreach ($this->figures as $figure) {
      $sum += $figure->getPerimeter(); // используем метод getSquare
    }
    return $sum;
  }
}

// 38.1
interface iUser	{
		public function setName($name); // установить имя
		public function getName(); // получить имя
		public function setAge($age); // установить возраст
		public function getAge(); // получить возраст
}
class User_d implements iUser {
  public function getName() {
    return $this->name ;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getAge() {
    return $this->age ;
  }
  public function setAge($age) {
    $this->age = $age;
  }
}
$user = new User_d ; $user->setName('Kollin') ; echo $user->getName();

// 39.1
interface iCube {
  public function __construct($a);
  public function getSquare(); // нахождение площади поверхности
  public function getVolume();
}
// 39.2
class Cube implements iCube {
  private $a;

	public function __construct($a)		{
		$this->a = $a;
	}

	public function getSquare()		{
		return $this->a * $this->a;
	}
  public function getVolume() {
    return $this->a * $this->a * $this->a;
  }
}
// 39.3 - 39.4
interface iUser_nj {
  public function __construct($name,$age);
  public function getName(); // нахождение площади поверхности
  public function getAge();
}
class User_nj implements iUser_nj {
  private $name;
  private $age;

  public function __construct($name, $age)		{
    $this->name = $name;
    $this->age = $age;
  }
  public function getName()		{
    return $this->name ;
  }
  public function getAge()		{
    return $this->age ;
  }
}

// 40.1 - 40.3
interface iUser_gt	{
	public function setName($name); // установить имя
	public function getName(); // получить имя
	public function setAge($age); // установить возраст
	public function getAge(); // получить возраст
}
interface iEmployee_gt extends iUser_gt {
  public function setSalary($salary)	;
  public function getSalary()	;
}
class Employee_gt implements iEmployee_gt {
  private $name;
  private $age;
  private $salary;
  public function getName()         {  return $this->name ;  }
  public function setName($name)    {  $this->name = $name;  }
  public function getAge()          {  return $this->age ;  }
  public function setAge($age)      {  $this->age = $age; }
  public function getSalary()       {  return $this->salary ;  }
  public function setSalary($salary){  $this->salary = $salary;  }
} echo "<br>";

// 41.1 - 41.5
interface Figure3d 	{
  public function getVolume()	 ;
  public function getSurfaceSquare()  ;
}

class Cube3d implements Figure3d	{
  private $a ;
  public function __construct($a)		{
    $this->a = $a;
  }
  public function getSurfaceSquare()		{
		return $this->a * $this->a;
	}
  public function getVolume() {
    return $this->a * $this->a * $this->a;
  }
}
interface Figure_d {
    public function getSquare();
    public function getPerimeter();
}
class Quadrate_d implements Figure_d {
  private $a ;
  public function __construct($a)		{
    $this->a = $a;
  }
  public function setA($a)  {
    $this->a = $a;
  }
  public function getPerimeter()  {
    return ($this->a * 4);
  }
  public function getSquare()		{
		return $this->a * $this->a;
	}
}
class Rectangle_d implements Figure_d {
    private $a;
    private $b;

    public function __construct($a, $b){
       $this->a = $a;
       $this->b = $b;
    }
    public function setA($a)  {
       $this->a = $a;
    }
    public function setB($b)  {
       $this->b = $b;
    }
    public function getPerimeter()  {
       return ($this->a * 2) + ($this->b * 2);
    }
    public function getSquare()  {
       return $this->a * $this->b;
    }
}
$quadrate3d_1 = new Quadrate_d(3); $quadrate3d_2 = new Quadrate_d(7);
$rectangle3d_1 = new Rectangle_d(4,3); $rectangle3d_2 = new Rectangle_d(2,5);
$cube3d_1 = new Cube3d(3); $cube3d_2 = new Cube3d(5);
$arr = [$quadrate3d_1,$rectangle3d_2,$rectangle3d_1,$quadrate3d_2,$cube3d_1,$cube3d_2] ;
foreach ($arr as $elem) {
  if($elem instanceof Figure3d ) {
    echo $elem->getSurfaceSquare() . "\n";
  }
}
foreach ($arr as $elem) {
  if ($elem instanceof Figure_d) {
    echo $elem->getSquare() . "\n";
  } elseif ($elem instanceof Figure3d) {
    echo $elem->getSurfaceSquare() . "\n";
  }
}

// 42.1
interface Tetragon_e	{
		public function getA();
		public function getB();
		public function getC();
		public function getD();
}
interface Figure_e	{
		public function getSquare();
		public function getPerimeter();
}
class Rectangle_e  implements Figure_e, Tetragon_e {
  private $a;
	private $b;
	public function __construct($a,$b)		{
		$this->a = $a;
    $this->b = $b;
	}

	public function getA()		{			return $this->a;		}
	public function getB()		{			return $this->b;		}
	public function getC()		{			return $this->a;		}
	public function getD()		{			return $this->b;		}

  public function getSquare()		{
		return $this->a * $this->a;
	}
	public function getPerimeter()		{
		return 4 * $this->a;
	}
}
// 42.2
interface Circle_e {
  public function getRadius();
  public function getDiameter();
}
// 42.3
class Disk_e  implements Figure_e, Circle_e {
    private $radius;
    public function __construct($radius){
      $this->radius = $radius ;
    }
    public function getRadius()   {   return $this->radius ;    }
    public function getDiameter() { return $this->radius * 2 ; }
    public function getSquare() { return ($this->radius * $this->radius) * 3.14 ; }
		public function getPerimeter() { return 2 * 3.14 * $this->radius ; }
}

// 43.1
interface iProgrammer_u	{
    public function __construct($name, $salary); // задаем имя и зарплату
    public function getName(); // получить имя
    public function getSalary(); // получить зарплату
    public function getLangs(); // получить массив языков, которые знает программист
    public function addLang($lang); // добавить язык в массив языков
}
class Employee_u	{
		private $name;
		private $salary;

		public function __construct($name, $salary)		{
			$this->name = $name;
			$this->salary = $salary;
		}
		public function getName()	  	{			return $this->name;		}
		public function getSalary()		{			return $this->salary;		}
	}
class Programmer_u extends Employee_u implements iProgrammer_u {
  private $langs = [] ;
  public function getLangs(){
    return $this->langs ;
  }
  public function addLang($lang){
    $this->langs[] = $lang ;
  }
}
$pr_u = new Programmer_u('Jimbo', 500) ; echo $pr_u->getName() ."\n";
$pr_u->addLang(['html','php']) ; var_dump($pr_u->getLangs()) . "<br>";
// 44.1
interface iSphere	{
		const PI = 3.14; // число ПИ как константа
		// Конструктор шара:
		public function __construct($radius);
		// Метод для нахождения объема шара:
		public function getVolume();
		// Метод для нахождения площади поверхности шара:
		public function getSquare();
}
class Sphere implements iSphere {
  private $radius ;
  public function __construct($radius) {
    $this->radius = $radius ;
  }
  public function getRadius(){ return $this->radius ; }
  public function getVolume() {
    return 4/3 * self::PI * pow($this->getRadius(),3) ;
  }
  public function getSquare(){
    return 2 * self::PI * $this->radius;
  }
}
$sph = new Sphere(4); echo $sph->getVolume() ."\n". $sph->getSquare() ;

// 45.1
interface iTest1 { public function getInt() ;}
var_dump (interface_exists('iTest1')) ;
// 45.2 var_dump(get_declared_interfaces());
