<?php
// error_reporting(E_ALL) ;
// ini_set('display_errors','on') ;

/* 86.1
require_once "/domains/oopcode/core/controller_class.php"; // абсолютный путь
require_once "/domains/oopcode/project/controller_class.php"; // абсолютный путь
//require_once "project/controller_class.php"; // относительный путь

$coreController = new \Core\Controller;
$projectController = new \Project\Controller;

$coreController->name = 'Las Vegas ' ; echo $coreController->name ;
$projectController->name = 'San-Francisko ' ; echo $projectController->name ;
*/

/* 86.2
require_once "/domains/oopcode/modules/cart/page.php"; // Warning: Unexpected character in input: ' in
require_once "/domains/oopcode/modules/cart/data.php";

$classPage = new \Modules\Cart\Page ;
$classData = new \Modules\Cart\Data ;
echo $classPage->helloWorld () ;
echo $classData->helloWorld () ; */

// \Modules\Cart\Page::helloWorld (); // вызова метода из глобального пространства имен
// \Modules\Cart\Data::helloWorld ();

// 86.3 (86.4)
/*
require_once "/domains/oopcode/modules/shop/basket/products.php";
require_once "/domains/oopcode/modules/shop/cart/products.php";

$b_p = new \Modules\Shop\Basket\Products() ; echo $b_p->helloWorld() ;
$c_p = new \Modules\Shop\Cart\Products() ; echo $c_p->helloWorld() ;
*/

// 87.1 (при вызове одного дочернего класса вызываем и дочерний и родительский т.е. оба и более)
/* require_once "/domains/oopcode/modules/shop/datacart.php";
require_once "/domains/oopcode/modules/shop/usercart.php";

$user_cart = new \Modules\Shop\UserCart ;
echo $user_cart->helloWorld() ; */

// 87.2
/* namespace Admin ;

class Controller {
  private $name ;
  public function __construct($name)  {
    $this->name = $name;
  }
  public function getName() {
    return $this->name ;
  }
}

$ctrl = new Controller('Nick');
echo $ctrl->getName(); */

// 87.3
/*
require_once "/domains/oopcode/modules/shop/core/cart.php";
require_once "/domains/oopcode/modules/shop/usercartnew.php";

$user_cart_new = new \Modules\Shop\UserCartNew('Rick') ;
echo $user_cart_new->helloWorld(); */

// 87.4
/* namespace Core\Data;

require_once "core/data/controller.php";
require_once "core/data/model.php";

$controller = new Controller;
$model = new Model;
echo $controller->helloWorld() ;
echo $model->helloWorld() ; */

// 88.1
/*  namespace Project;

require_once "/domains/oopcode/core/users/data.php";
require_once "/domains/oopcode/project/test.php";

$test1 = new Test('test1') ;
var_dump($test1) ;  */

// 88.2
namespace Users;
require_once "/domains/oopcode/core/admin/data_one.php";
require_once "/domains/oopcode/core/admin/data_two.php";
require_once "/domains/oopcode/users/controller.php";
require_once "/domains/oopcode/users/page.php";

$page = new Page ;
echo $page->getFullData() ;  // Data1strData2str and   НЕ ПРАВИЛЬНО !!!

// 88.3

/*namespace Project;
require_once "/domains/oopcode/project/test.php";
require_once "/domains/oopcode/core/admin/model.php";
require_once "/domains/oopcode/core/users/storage/data.php";


$test = new Test ;
var_dump($test) ; */

// 88.4
/*namespace Core\Storage ;
require_once "/domains/oopcode/core/storage/model.php";
require_once "/domains/oopcode/core/storage/database.php";

$model = new Model ;
var_dump($model) ; //W:\domains\oopcode\index_for_namespace.php:116:  object(Core\Storage\Model)[1]
*/

// 89.1
/*namespace Project;
require_once "/domains/oopcode/project/resource/controller/page.php";
require_once "/domains/oopcode/project/resource/model/page.php";
require_once "/domains/oopcode/project/test.php";

$tst = new Test ;
var_dump($tst) ; */ //W:\domains\oopcode\index_for_namespace.php:126: object(Project\Test)[3]
// здесь показывает три объекта

// 90.1
/*spl_autoload_register();
$obj = new Core\User ;  echo $obj->hiWorld() ;
$obj2 = new Core\Admin\Controller  ; $obj2->hiWorld() ;
$obj3 = new Project\User\Data ; $obj3->hiWorld() ; */

// 91.1

/*  spl_autoload_register(function($class) {
		$ds = DIRECTORY_SEPARATOR;
		$filename = $_SERVER['DOCUMENT_ROOT'] . $ds . str_replace('\\
			', $ds, $class) . '.php';
		 require($filename);
	});
$obj = new Core\User ;  echo $obj->hiWorld() ;
$obj3 = new Project\User\Data ; $obj3->hiWorld() ;
$obj2 = new Core\Admin\Controller  ; $obj2->hiWorld() ; */


//91.2
/*  $underscores = function ($classname) {
  $path = str_replace("_", DIRECTORY_SEPARATOR, $classname);
  $path = __DIR__  . "/$path";
  if (file_exists("{$path}.php")) {
    require_once("{$path}.php");
  }
};
spl_autoload_register($underscores);
$obj3 = new Project\User\Data ; $obj3->hiWorld() ;  */
