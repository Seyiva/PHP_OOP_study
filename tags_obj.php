<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;
require_once 'tagHelper_class.php';

$th = new TagHelper();
//echo $th->open('div') . 'text' . $th->close('div');
echo $th->show('div','zzTop') ;

// echo $th->open('form', ['action' => '', 'method' => 'GET']);
//    echo $th->open('input', ['name' => 'year']);
//   echo $th->open('input', ['type' => 'submit']);
// echo $th->close('form');
