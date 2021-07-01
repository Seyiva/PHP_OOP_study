<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;


class Input extends Tag {
  public function __construct()  {
    parent::__construct('input');
  }

  public function open() {
    $inputName = $this->getAttr('name') ;
    if($this->checkInput() ) {
      if(isset($inputName)  ) {
        if(isset($_REQUEST[$inputName])  )  {
          $value = $_REQUEST[$inputName] ;
          $this->getAttr('value', $value) ;
        }
      }
    }
    return parent::open() ;
  }

  public function checkInput() {
    var_dump($_REQUEST) ;
    if(!empty($_REQUEST)) {
      $flag = true;
      if(!empty($_REQUEST[$inputName]) and ( (strlen($_POST[$inputName])) <= 1) ) {
        $infoName['long'] = 'Заполните все поля одним символом!';
        $flag = false;
        return $infoName['long']  ;
      }
      if(!empty($_REQUEST[$inputName]) and ( preg_match('#\d#', $_POST[$inputName]) ) ) { // [0-9]? |{1}
        $infoName['correct'] = 'Заполните все поля цифрами!';
        $flag = false;
        return $infoName['correct']  ;
      }
    }
  }

  //public function getSumInputs() { return array_sum($_REQUEST[$inputName]) ;  }

  public function __toString() {
			return parent::open();
	}
}
