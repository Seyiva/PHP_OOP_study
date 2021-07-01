<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 53.1
class User	{
	private $name;
	private $surname ;
	private $patronymic ;
	public function __construct($name, $surname, $patronymic )		{
		$this->name = $name;
		$this->surname  = $surname;
    $this->patronymic  = $patronymic;
	}

	// Реализуем указанный метод:
	public function __toString()		{
		return $this->name .' '. $this->surname .' '. $this->patronymic ;
	}
  public function getName()		      {			return $this->name;		}
  public function getSurname()		  {			return $this->surname;		}
  public function getPatronymic()		{			return $this->patronymic;		}
}
  $user = new User('Elis','Witman','Anriewa');  	echo $user;

// 53.2
class Arr {
  private $numbers = [] ;
  public function add($num) {
    $this->numbers[] = $num;
    return $this ;
  }
  public function __toString() {
    return (string) array_sum($this->numbers) ;
  }
}
$arr = new Arr; 	echo $arr->add(1)->add(2)->add(3) . "<br>";

// 54.1
class User_g {
  private $name;
  private $age;

  public function __construct($name, $age)  {
    $this->name = $name;
    $this->age = $age;
  }

  public function __get($property)  {
    return $this->$property;
  }
}
$test_user = new User_g('Alexa',15);
echo $test_user->name;
echo $test_user->age . "<br>";

// 54.2 !!!
class Date  {
  public $year ;
  public $month  ;
  public $day  ;
  public function __construct($year, $day, $month)    {
      $this->year = $year;
      $this->month = $month;
      $this->day = $day;
  }
  // Используем метод-перехватчик:
	public function __get($property)		{
		// Если идет обращение к свойству fullname:
		if ($property == 'weekDay') {
      $date = $this->year . $this->month . $this->day ;
      $arrDays = ['Воскресенье', 'Понедельник', 'Вторник','Среда','Четверг','Пятница','Суббота'] ;
      $dayWeek = date('w',$date) ;
			return $arrDays[$dayWeek] ;
	 	} else {
      return $this->$property ;
    }
	}
}
$date = new Date(2021, 5, 12);
echo $date->weekDay . "<br>";
// 55.1 !!!
class User_gs 	{
		private $name;
		private $age;
    public function __set($property, $value)	{ // передаем имя свойства и значение
      switch($property){ // перебираем свойства класса
        case 'name':  // выбираем имя конкретного свойства
            if($value != '') { // ставим условие
              $this->name = $value ; // делаем запись значение в свойство
            }
        break; // прерываем , чтобы сделать следующую проверку значеия ' ' в case
        case 'age':
            if($value >= 0 and $value <= 70){
              $this->age = $value;
            }
        break;
        default: echo "Такого свойства нет!!!"; // по умолчанию
        break;
      }
		}
		// Магический геттер свойств:
		public function __get($property)		{
			return $this->$property  ;
		}

}
$ugs =  new User_gs ;
$ugs->name = 'Lora';  echo $ugs->name ;
$ugs->age = 5;  echo $ugs->age ;
