<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'form_class.php' ;
require_once 'input_class.php' ;

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

 	echo $form->open();
		echo (new Input)->setAttr('name', 'year');
		echo (new Input)->setAttr('type', 'submit');
	echo $form->close();
