<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;
// 56.1

class Date	{
		public $date;
		public $year;
		public $month;
		public $day;

		public function __construct($date = null)		{

      if($date != null) {
				$this->date = date('Y-n-d', strtotime($date)) ; // n (месяц без нуля)- от 1 до 12
			} else {
				$this->date = date('Y-n-d') ;
			}
			$dateArr = explode('-',$this->date) ;
			$this->year = $dateArr[0] ;
			$this->month = $dateArr[1] ;
			$this->day = $dateArr[2]   ;
		}

		public function getDay()		{  return $this->day ;		}

		public function getMonth($lang = null)		{
			$month = $this->month ;
			if($lang == 'ru') {
					$months = ['Декабрь','Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль',
					 					'Август', 'Сентябрь', 'Октябрь', 'Ноябрь'];
			} elseif($lang == 'en') {
					$months = ['December','January', 'February', 'March', 'April', 'May', 'June',
										'Jule', 'August', 'September', 'October', 'November'];
			}
        $month = date('n', strtotime($this->date)) ;
			  return $months[$month];
		}

		public function getYear()		{   return $this->year ;		}

		public function getWeekDay($lang = null)		{
      if($lang == 'ru') {
					$dayOfweek = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
			} elseif($lang == 'en') {
					$dayOfweek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			}
      $day = date('w', strtotime($this->date)) ;
			return $dayOfweek[$day] ;
		}

		public function addDay($value)		{
			$interval = "$value day" ; // создаем $интервал цифру + day по синтаксису для date_modify()
      $oldDate = date_create($this->date) ; // записываем дату
      date_modify($oldDate,$interval) ; // считаем старую дату и интервал
      $newDate = date_format($oldDate,'Y-n-d') ; // преобразуем в новую дату и задаем формат
      return $newDate ;
		}

		public function subDay($value)		{
			$interval = "- $value day" ;
      $oldDate = date_create($this->date) ;
      date_modify($oldDate,$interval) ;
      $newDate = date_format($oldDate,'Y-n-d') ;
      return $newDate ;
		}

		public function addMonth($value)		{
      $interval = "$value month" ;
      $oldDate = date_create($this->date) ;
      date_modify($oldDate,$interval) ;
      $newDate = date_format($oldDate,'Y-n-d') ;
      return $newDate ;
		}

		public function subMonth($value)		{
      $interval = "- $value month" ;
      $oldDate = date_create($this->date) ;
      date_modify($oldDate,$interval) ;
      $newDate = date_format($oldDate,'Y-n-d') ;
      return $newDate ;
		}

		public function addYear($value)		{
      $interval = "$value year" ;
      $oldDate = date_create($this->date) ;
      date_modify($oldDate,$interval) ;
      $newDate = date_format($oldDate,'Y-n-d') ;
      return $newDate ;
		}

		public function subYear($value)		{
      $interval = "- $value year" ;
      $oldDate = date_create($this->date) ;
      date_modify($oldDate,$interval) ;
      $newDate = date_format($oldDate,'Y-n-d') ;
      return $newDate ;
		}

		public function format($format)		{
      $oldDate = date_create($this->date);
      $newDate = date_format($oldDate, $format);
      return $newDate;
		}

		public function __toString()		{
			 // return $this->getYear() . ' - ' . $this->getMonth() . ' - ' . $this->getDay() .' '. $this->getWeekDay();
			 return $this->getYear() . ' - ' . $this->month . ' - ' . $this->getDay() ;
		}
}

/*
$date = new Date('2025-10-31');

	echo $date->getYear() . "<br>";  // выведет '2025'
	echo $date->getMonth('en') . "<br>"; // выведет '12'
	echo $date->getDay() . "<br>";   // выведет '31'

	echo $date->getWeekDay('ru') . "<br>";     // выведет '3'
	echo $date->getWeekDay('ru') . "<br>"; // выведет 'среда'
	echo $date->getWeekDay('en') . "<br>"; // выведет 'wednesday'
  echo (new Date('2025-12-31'))->addYear(1) . "<br>"; // '2026-12-31'
	echo (new Date('2025-12-31'))->addDay(1) . "<br>";  // '2026-01-01'

	echo (new Date('2025-12-31'))->subDay(3) . "<br>"; // '2026-12-28'
*/
