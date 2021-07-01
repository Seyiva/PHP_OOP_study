<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

require_once 'full_tag_class.php';
require_once 'form_class.php';
//require_once 'input_class.php';
require_once 'hidden_class.php';
require_once 'submit_class.php';

class Checkbox extends Tag {

  public function __construct()  {
    $this->setAttr('type', 'checkbox') ;
    $this->setAttr('value', '1') ;
    parent::__construct('input');
  }

    public function open() {
      $name = $this->getAttr('name') ; // получаем имя чекбокса и записываем в переменную

      if($name) { // если это имя
      // записываем в $ объект и устанавливаем атрибуты по умолчанию
        $hidden = (new Hidden)->setAttr('name',$name)->setAttr('value', '0') ;

        if(isset($_REQUEST[$name]) ) { // если существует запись в инпуте и создан запрос
          $value = $_REQUEST[$name] ; // тогда записываем ее в переменную $value

          if($value == 1) {
            $this->setAttr('checked') ;  // если $value 1 , то сохраняем маркер после отправки
          } else {
            $this->removeAttr('checked') ; // иначе не сохраняем маркер
          }
        }

        return $hidden->open() .  parent::open() ; // возвращаем скрытый объект и открытый объект
      } else {
        return parent::open() ;
      }
    }

  public function __toString() {
    return $this->open() ;
  }
}

// echo new Checkbox ;
$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

 	echo $form->open();
		echo (new Checkbox)->setAttr('name', 'checkbox');
	//	echo (new Input)->setAttr('name', 'user');
		echo new Submit;
	echo $form->close();
