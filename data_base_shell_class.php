<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

class DatabaseShell
	{
		private $link;

		public function __construct($host, $user, $password, $database)
		{
			$this->link = mysqli_connect($host, $user, $password, $database);
			mysqli_query($this->link, "SET NAMES 'utf8'"); // устанавливаем кодировку
		 }

		public function save(string $table, array $data = [])		{
			// сохраняет запись в базу   t - users_for_oop
			$elems = '' ;
			foreach ($data as $key => $elem) {
				$elems .= " $key = '$elem'  " . ', ' ;
			}
			$elems_t = rtrim($elems, ', ');
			$query = "INSERT INTO $table SET $elems_t ";
			mysqli_query($this->link , $query) or die(mysqli_error($this->link));

		//	return 'данные сохранены' ;
		}

		public function del($table, $id)		{
			// удаляет запись по ее id
				$query = "DELETE FROM $table WHERE id='$id' ";
			 	mysqli_query($this->link , $query) or die(mysqli_error($this->link));
		//		return 'user deleted' ;
		}

		public function delAll(string $table, array $ids = [] )		{
			$elem = '' ;
			foreach ($ids as $key ) {
				$elem .= "'$key'" . ', ' ;
			}
			$elems = rtrim($elem, ', ');

			$query = "DELETE FROM $table WHERE id IN ($elems) ";
			mysqli_query($this->link , $query) or die(mysqli_error($this->link));
		}

		public function get(string $table, int $id)		{
			// получает одну запись по ее id
			$query = "SELECT * FROM $table WHERE id='$id' ";
			$result = mysqli_query($this->link , $query) or die(mysqli_error($this->link));
			$row = mysqli_fetch_assoc($result);
			return var_dump($row) ;
		}

		public function getAll(string $table, array $ids = [] )		{
			// получает массив записей по их id
			$elem = '' ;
			foreach ($ids as $key ) {
				$elem .= "'$key'" . ', ' ;
			}
			$elems = rtrim($elem, ', ');

			$query = "SELECT * FROM $table WHERE id IN ($elems) ";
			$result = mysqli_query($this->link , $query) or die(mysqli_error($this->link));
			for ($ids = []; $row = mysqli_fetch_assoc($result); $ids[] = $row);
			return var_dump($ids);
		}

		public function selectAll(string $table, string $condition)		{
			// получает массив записей по условию
			$query = "SELECT * FROM $table  $condition";
			$result = mysqli_query($this->link , $query) or die(mysqli_error($this->link));
			$row = mysqli_fetch_assoc($result);
			return var_dump($row);
		}
	}

	// Создаем объект для работы:
	$db = new DatabaseShell('localhost', 'root', '', 'test');

	$db->save('users_for_oop', ['name' => 'Guru', 'age' => '21']); // Warning: mysqli_fetch_assoc() expects parameter 1 to be mysqli_result, bool given in W: on line 25
	$user = $db->get('users_for_oop', 10);
	$users = $db->getAll('users_for_oop', [8,14]); // Notice: Array to string conversion
	$users = $db->selectAll('users_for_oop', "WHERE id > 1 ");
	$db->del('users_for_oop', 19); // Warning: mysqli_fetch_assoc() expects parameter 1 to be mysqli_result, bool given in W: on line 33
	$db->delAll('users_for_oop', [22,23]);
