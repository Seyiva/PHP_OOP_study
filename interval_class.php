<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 57.1

class Interval	{
    public $date1 ;
    public $date2 ;
		public function __construct(Date $date1, Date $date2)		{
			$this->date1 = $date1 ;
      $this->date2 = $date2 ;
		}

		public function toDays()		{
			// вернет разницу в днях

      $date1 = date_create($this->date1->format('Y-m-d')) ;
      $date2 = date_create($this->date2->format('Y-m-d')) ;
      $diff = date_diff($date1, $date2);
      return $diff->format('%d дней');
		}

		public function toMonths()		{
      $date1 = date_create($this->date1->format('Y-m-d')) ;
      $date2 = date_create($this->date2->format('Y-m-d')) ;
      $diff = date_diff($date1, $date2);
      return $diff->format('%m мес');
		}

		public function toYears()		{
      $date1 = date_create($this->date1->format('Y-m-d')) ;
      $date2 = date_create($this->date2->format('Y-m-d')) ;
      $diff = date_diff($date1, $date2);
      return $diff->format('%Y лет');
		}

		public function __toString()		{
			// выведет результат в виде массива
        // $arr =  ['years' =>  $this->toYears(), 'months' =>  $this->toMonths(), 'days' =>  $this->toDays()] ;
		    // return	$arr ;
       return "Разница между $this->date1 и $this->date2 составляет " . $this->toYears() . ' ' . $this->toMonths() . ' ' . $this->toDays();
		}
	}
    require_once 'date_class.php';

    $date1 = new Date('2025-12-31');
  	$date2 = new Date('2026-11-28');

  	$interval = new Interval($date1, $date2);
  	echo $interval->toDays();   // выведет разницу в днях
  	echo $interval->toMonths(); // выведет разницу в месяцах
  	echo $interval->toYears();  // выведет разницу в годах
    echo $interval ;
  	var_dump($interval); // массив вида ['years' => '', 'months' => '', 'days' => '']
