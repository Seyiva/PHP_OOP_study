<?php
//namespace Project;
/*use \Core\Admin\Model ;  //	88.3
use \Core\Users\Storage\Data ; 	*/ //	88.3

/* use \Core\Users\Data ; //	88.2

class Test	{
	public function __construct()	{
		// Создаем 3 объекта одного класса:
		$data1  = new Data('user1');
		$data2  = new Data('user3');
		$data3  = new Data('user3');
	}
} */

// Как происходит использование классов как объектов?
// ведь он возвращает W:\domains\oopcode\index_for_namespace.php:108: object(Project\Test)[1]

/*class Test	{
		public function __construct()		{
			$model = new Model; // относительный путь?
			$data  = new Data;
		}
}*/

//89.1
namespace Project;
use \Resource\Controller\Page as ControllerPage;
use \Resource\Model\Page as ModelPage;

require_once "/domains/oopcode/project/resource/controller/page.php";
require_once "/domains/oopcode/project/resource/model/page.php";

class Test	{
	public function __construct()	{
		$pageController  = new ControllerPage;
		$pageModel       = new ModelPage;
	}
}


$tst = new \Project\Test ;
var_dump($tst) ;   //  W:\domains\oopcode\project\test.php:44:	object(Project\Test)[1]
// здесь показывает один объект
