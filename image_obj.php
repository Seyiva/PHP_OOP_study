<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'image_class.php';

$image = new Image () ;
$image->setAttr('src','cat.png');
echo $image->setAttr('width','300')->setAttr('height','200') . "<br>" ;
//var_dump($image->getAttrs())  ;
