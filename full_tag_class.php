<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

interface iTag	{
		public function getName(); // Геттер имени:

		public function getText(); // Геттер текста:

		public function getAttrs(); // Геттер всех атрибутов:

		public function getAttr($name); // Геттер одного атрибута по имени:

		public function show(); // Открывающий тег, текст и закрывающий тег:

		public function open(); // Открывающий тег:

		public function close(); // Закрывающий тег:

		public function setText($text); // Установка текста:

		public function setAttr($name, $value = true); // Установка атрибута:

		public function setAttrs($attrs); // Установка атрибутов:

		public function removeAttr($name); // Удаление атрибута:

		public function addClass($className); // Установка класса:

		public function removeClass($className); // Удаление класса:
	}
class Tag implements iTag {
  private $name ;
  private $text = '' ;
  private $attrs = [] ;

  public function __construct($name)	{
			$this->name = $name;
	}

  public function getName()  {  return $this->name ;  }

  public function getText()  {  return $this->text ;  }

  public function getAttrs() {  return $this->attrs ; }

  public function getAttr($name) {
    if(isset($this->attrs[$name])) {
      return $this->attrs[$name] ;
    } else {
      return null ;
    }
  }

  public function show()	{
		return $this->open() . $this->text . $this->close();
	}
  public function open() {
    $name = $this->name ; // имя тега
    $attrsStr = $this->getAttrsStr($this->attrs) ; //var_dump($attrsStr) ; // в $this->attrs лежит имя и значение атрибута
    return "<$name$attrsStr>" ;
  }
  public function close() {
    $name = $this->name ;
    return "</$name>" ;
  }
  public function setText($text)	{
			$this->text = $text;
			return $this;
	}
  public function setAttr($name, $value = true) { // имя и значение атрибута
    $this->attrs[$name] = $value ; // обращение к свойству $attrs с ключом атрибута тега $name через $this и запись значения к нему
    return $this;
  }
  public function setAttrs($attrs) { // записываем параметром массив
    foreach ($attrs as $name => $value) { // перебираем каждый атрибут
      $this->setAttr($name, $value) ; // устанавливаем имя и значене методом setAttr()
    }
    return $this;
  }
  public function removeAttr($name) {
    unset($this->attrs[$name]) ;
    return $this;
  }

  public function addClass($className) {
    if(isset($this->attrs['class'])) {
      $classNames = explode(' ',$this->attrs['class']) ;

      if(!in_array($className,$classNames)) {
        $classNames[] = $className ;
        $this->attrs['class'] = implode(' ', $classNames) ;
      }
    } else {
      $this->attrs['class'] =  $className ;
    } //var_dump($this) ;
    return $this;
  }

  public function removeClass($className) {
    if(isset($this->attrs['class'])){
      $classNames = explode(' ',$this->attrs['class']) ;

      if(in_array($className,$classNames)) {
        $classNames = $this->removeElem($className,$classNames) ;
        $this->attrs['class'] = implode(' ',  $classNames) ;
      }
    }
      return $this;
  }

  private function getAttrsStr($attrs) {
    if(!empty($attrs)) {
      $result = '' ;

      foreach ($attrs as $name => $value) {
        if($value === true){
           $result .=" $name " ;
        } else {
           $result.=" $name=\"$value\" " ;
        }
      }

      return $result ;
    } else {
      return '' ;
    }
  }

  private function removeElem($elem, $arr) {
    $key = array_search($elem, $arr) ;
    array_splice($arr, $key, 1);

		return $arr;
  }
}
/*
$tag_img = new Tag('img') ;
echo $tag_img->setAttr('src','cat.png')->setAttr('width','150')->setAttr('hieght','150')->open() ."<br>";
var_dump($tag_img->getAttrs()) ; */
?>
