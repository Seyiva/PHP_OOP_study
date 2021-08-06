<?php
namespace Core\Storage ;
use Core\Storage\DataBase ; //88.4 не сработало это же полный путь...

class Model {
  public function __construct()   {
    $database  = new DataBase;
  }
}
