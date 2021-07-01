<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 59.1 - 59.3

class Tag {
  private $name ;
  private $attrs ;
	public function __construct($name, $attrs = [])	 {
    $this->name = $name ;
    $this->attrs =  $attrs ;
  }
  public function open() {
    $name = $this->name ;
    $attrStr = $this->getAttrsStr($this->attrs) ;
    return "<$name$attrStr>" ;
  }
  public function close() {
    $name = $this->name ;
    return "</$name>" ;
  }
  //60.1
  private function getAttrsStr($attrs) {
      if(!empty($attrs)) {
        $result = '' ;
          foreach ($attrs as $name => $value) {
            $result.= " $name=\"$value\" " ;
          }
        return $result ;
      } else {
        return '' ;
      }
  }
}
$tag_div = new Tag('div');
echo $tag_div->open() . 'anytext' . $tag_div->close(); // выведет <div>text</div>
$tag_img = new Tag('img');
echo $tag_img->open() ;
$tag_header = new Tag('header');
echo $tag_header->open(). 'here may be every what you wanna ' .$tag_header->close();
//60.1
$tag_input = new Tag('input', ['id' => 'test', 'class' => 'new_topi']);
echo $tag_input->open() ."<br>";

// 61.1
class Tag_ci {
  private $name ;
  private $attrs = [] ;

  public function __construct($name)	 {
    $this->name = $name ;
  }

  public function setAttr($name, $value) {
    $this->attrs[$name] = $value ;
    return $this ;
  }
  public function setAttributes($attrs){
    foreach ($attrs as $name => $value) {
        $this->setAttr($name, $value) ;
    }
    return $this ;
  }
  public function removeAttr($name) {
    unset($this->attrs[$name])  ;
    return $this ;
  }
  //65.1
  public function addClass($className) { //
    if(isset($this->attrs['class'])) { // Если в массиве существует ключ class ( в теге атрибут класс (строковое значение) )
      $classNames = explode(' ', $this->attrs['class'] ) ; // Разбиваем строку в массив и Получаем массив классов
      if(!in_array($className,$classNames)) { // Если такого класса нет в массиве классов
        $classNames[] = $className ; // Добавим новый класс в массив с классами
        $this->attrs['class'] = implode(' ', $classNames) ; // Сольем массив в строку и запишем ее в $this->attrs['class']
      }
    } else {
      $this->attrs['class'] = $className ;
    }
    return $this ;
  }
  //65.2
  public function removeClass($className){
    if(isset($this->attrs['class'])) { // если существует атрибут с ключом клаас
      $classNames = explode(' ', $this->attrs['class'] ) ; // разбиваем строку в массив и запишем в переменную массива 
      if(in_array($className,$classNames)){ // если существует имя класса(елем) в массиве
        $classNames = $this->removeElem($className, $classNames) ; // применяем метод removeElem() и удаляем класс, затем пишем в переменнуя массива
        $this->attrs['class'] = implode(' ', $classNames) ; // разбиваем массив в строку
      }
    }
    return $this;
  }
  public function open() {
    $name = $this->name ;
    $attrStr = $this->getAttrsStr($this->attrs) ;
    return "<$name$attrStr>" ;
  }
  public function close() {
    $name = $this->name ;
    return "</$name>" ;
  }
  private function getAttrsStr($attrs) {
      if(!empty($attrs)) {
        $result = '' ;
          foreach ($attrs as $name => $value) {
            if($value === true){
                $result.= " $name " ;
            } else {
              $result.= " $name=\"$value\" " ;
            }
          }
        return $result ;
      } else {
        return '' ;
      }
  }
  private function removeElem($elem, $arr) {
    $key = array_search($elem, $arr) ; // находим ключ элемента по его тексту
    array_splice($arr,$key ,1) ; // удаляем элемент
		return $arr; // возвращаем измененный массив
  }
}
$tag_ci = new Tag_ci('div') ;
echo $tag_ci->setAttr('id','test')->setAttr('class','super')->open() ;
echo $tag_ci->close() ."<br>";

$tag_ci_img = new Tag_ci('img') ;
echo $tag_ci_img->setAttr('src', 'cat.jpg')->setAttr('alt', 'Кот')->removeAttr('alt')->open() ."<br>";

$tag_ci_span = new Tag_ci('span') ;
echo $tag_ci_span->setAttributes(['id' => 'sky', 'class' => 'exuuu'])->open() ;
echo $tag_ci_span->close() ."<br>";

$tag_ci_input = new Tag_ci('input');
echo $tag_ci_input->setAttr('id', 'test')->setAttr('disabled', true)->open()  ."<br>"; // выведет <input id="test" disabled>

echo (new Tag_ci('input'))->setAttr('name', 'name1')->open()  ."<br>";
echo (new Tag_ci('input'))->setAttr('name', 'name2')->open()  ."<br>";

//65.1
echo (new Tag_ci('input'))->addClass('eee')->open() ."<br>"; // Выведет <input class="eee">:
echo (new Tag_ci('input'))->addClass('eee')->addClass('bbb')->open() ."<br>"; // Выведет <input class="eee bbb">:
echo (new Tag_ci('input'))->setAttr('class', 'eee bbb')->addClass('kkk')->open(); // Выведет <input class="eee bbb kkk">:

echo (new Tag_ci('input'))
		->setAttr('class', 'eee bbb')
		->addClass('eee') // такой класс уже есть и не добавится
		->open() ."<br>"; // Выведет <input class="eee bbb">:
    // Выведет <input class="eee bbb">:
echo (new Tag_ci('input'))
	->addClass('eee')
	->addClass('bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();

/* public function addClass($className)	{
		if (!isset($this->attrs['class'])) { // Если ключа class нет в массиве $this->attrs:
			$this->attrs['class'] = $className; // запишем наш CSS класс
		 }
		return $this; // возвращаем $this для работы цепочки
	} */
  //65.2
  echo (new Tag_ci('input'))
		->setAttr('class', 'eee zzz kkk') // добавим 3 класса
		->removeClass('zzz') // удалим класс 'zzz'
		->open(); // выведет <input class="eee kkk">
