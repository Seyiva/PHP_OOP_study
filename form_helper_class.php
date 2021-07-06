<?php
require_once 'tagHelper_class.php';

class FormHelper extends TagHelper {

  public function openForm($attrs = [])	{
		return $this->open('form',$attrs);
	}

	public function closeForm()	{
		return $this->close('form');
	}

  public function input($attrs =[]){
    if(isset($attrs['name'])) {
      $name = $attrs['name'] ;

      if(isset($_REQUEST[$name])) {
        $attrs['value'] = $_REQUEST[$name] ;
      }

      return $this->open('input',$attrs) ;
    }
  }

  public function password($attrs =[]) {
    $attrs['type'] = 'password' ;
    return $this->input($attrs) ;
  }

  public function submit($attrs =[]) {
      $attrs['type'] = 'submit' ;
      return $this->open('input',$attrs) ;
  }
  public function hidden($attrs =[]) {
      $attrs['type'] = 'hidden' ;
      $attrs['value'] = '0' ;
      return $this->open('input',$attrs) ;
  }
  public function checkbox($attrs =[]){
    $attrs['type'] = 'checkbox' ;
    $attrs['value'] = '1' ;

    if(isset($attrs['name'])) {
      $name = $attrs['name'] ;

      if( isset($_REQUEST[$name]) and $_REQUEST[$name] == 1 ) {
        $attrs['checked'] = true ;

        $hidden = $this->hidden(['name' => $name, 'value' => '0']) ;
      } else {
         $hidden = '' ;
      }
      return $hidden. $this->open('input',$attrs) ;
    }
  }

  public function textarea($attrs =[]) {
    if(isset($attrs['name'])) { // если существует атрибут
      $name = $attrs['name'] ;

      $text = 'Введите текст..' ;

      if(!isset($_REQUEST[$name]) ) { // если НЕ была отправлена форма
        return $this->show('textarea',$text,$attrs) ;
      }

      if(isset($_REQUEST[$name]) ){ //  если была отправлена форма
        $text =  !empty($_REQUEST[$name]) ? $_REQUEST[$name] : '' ;

        return $this->open('textarea',$attrs). htmlspecialchars($text) .  $this->close('textarea');
      }
    }
  }

  public function select(array $attrs_sel = [], array $attrs_opt = []) {

    if(!isset($_REQUEST['list'])) {

      $item = '' ;
      $text = 'default' ;
        $item = $this->open('select',$attrs_sel) ;
          foreach ($attrs_opt as $key => $option) {
            $text = $option['text'] ;

              if(isset($option['attrs']['selected']) and $option['attrs']['selected'] == true) {
                  $item .= $this->show('option', $text,  ['selected' => true , 'value' => $option['attrs']['value']] ) ;
              } else {
                  $item .= $this->show('option', $text, ['value' => $option['attrs']['value']] ) ;
              }
          }
        $item .= $this->close('select');
    }

    if(isset($_REQUEST['list'])) {

        $item = '' ;
        $text = 'default' ;
          $item = $this->open('select',$attrs_sel) ;

            foreach ($attrs_opt as $key => $option) {
              $text = $option['text'] ;

              if( $_REQUEST['list'] == $option['attrs']['value'] ) {  // не совсем корректно
                  $item .= $this->show('option', $text,  [ 'value' => $option['attrs']['value']  ] ) ;
              }

            }
        $item .= $this->close('select');
      }
      return $item   ;
  }
}
