<?php
namespace Project\Data;
use Controller\Page as Controller;
use Model\Page as Model;

require_once "/domains/oopcode/project/data/model/page.php";
require_once "/domains/oopcode/project/data/controller/page.php";

// 89.2
class Test	{
	public function __construct()		{
		$pageController  = new Controller;
		$pageModel       = new Model;
	}
}

$tst = new Test ;
var_dump($tst); // W:\domains\oopcode\project\data\newtest.php:17:  object(Project\Data\Test)[1]
// Почему он видит только один объект или он таким и является который содержит 2 других? 
