<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

// 58.1

interface iFile	{
		public function __construct($filePath);

		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла

		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
	  public function appendText($text);  // добавляет текст в конец файла

		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}

class File implements iFile {
  private $filePath ;
  public function __construct($filePath) {
    $this->filePath = $filePath ;
  }
  public function getPath(){
    return $this->filePath ;
  }
	public function getDir(){
    $arr = explode("/",$this->filePath) ;
    $count = count($arr) ;
    return $arr[$count-2] ; // 0-расширение, 1-название файла, 2-название папки (с права на лево)
  }
  public function getName(){
    $arr = explode("/",$this->filePath) ;
    $count = count($arr) ;
    return $arr[$count-1] ; // 0-расширение, 1-название файла (с права на лево)
  }
  public function getExt() {
    $arr = explode('.',$this->getName()) ;
    return end($arr) ; // end() устанавливает внутренний указатель array на последний элемент и возвращает его значение
  }
  public function getSize() {
    return filesize($this->filePath) ;
  }
  public function getText() {
    return file_get_contents($this->filePath) ;
  }
  public function setText($text) {
     file_put_contents($this->filePath, $text) ;
     return $this ;
  }
  public function appendText($text) {
    file_put_contents($this->filePath, $text, FILE_APPEND);
    return $this;
  }
  public function copy($copyPath) {
    copy($this->filePath, $copyPath) ;
  }
  public function delete() {
    unlink($this->filePath) ;
  }
  public function rename($newName) {
    rename($this->filePath, $newName) ;
  }
  public function replace($newPath) {
    replace($this->filePath, $newPath) ;
  }
}
