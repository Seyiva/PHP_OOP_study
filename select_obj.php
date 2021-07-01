<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'option_class.php';
require_once 'select_class.php';

require_once 'form_class.php';
require_once 'input_class.php';
//require_once 'hidden_class.php';
require_once 'submit_class.php';

// $select = new Select('select') ;
//   echo $select->setAttr('name', 'list')
//   ->add( (new Option())->setText('opt1') )
//   ->add( (new Option())->setText('opt2')->setSelected() )
//   ->add( (new Option())->setText('opt3') )
//   ->show();


  $form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

   	echo $form->open();
	   echo (new Input)->setAttr('name', 'test');

  		echo ((new Select('select'))->setAttr('name', 'list'))
  			->add( (new Option())->setAttr('value','1')->setText('item1') )
  			->add( (new Option())->setAttr('value','2')->setText('item2') )
  			->add( (new Option())->setAttr('value','3')->setText('item3') )
  			->show();

  		echo new Submit;
  	echo $form->close();
