<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'link_class.php';


echo (new Link())->setAttr('href','/1.php')->setText(' 1.php ')->show() ."<br><br>";
echo (new Link())->setAttr('href','/2.php')->setText(' 2.php ')->show() ."<br><br>";
echo (new Link())->setAttr('href','/3.php')->setText(' 3.php ')->show() ."<br><br>";
echo (new Link())->setAttr('href','/4.php')->setText(' 4.php ')->show() ."<br><br>";
echo (new Link())->setAttr('href','/5.php')->setText(' 5.php ')->show() ."<br><br>";
//var_dump((new Link())->getAttrs())  ;
