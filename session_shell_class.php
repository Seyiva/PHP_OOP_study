<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;


class SessionShell	{
		// Удобно стартуем сессию в конструкторе класса:
		public function __construct()		{
			if (!isset($_SESSION)) {
				session_start();
			}
		}

		public function set($name, $value)		{
			$_SESSION[$name] = $value ;// устанавливает переменную сессии
		}

		public function get($name)		{
        return $_SESSION[$name] ; // получает переменную сессии

		}

		public function del($name)		{
			unset($_SESSION[$name]) ;// удаляет переменную сессии
		}

		public function exists($name)		{
			if(isset($_SESSION[$name])) {
        return "SESSION exists" ;
      } else {
        return "SESSION not exists" ;
      }
		}

		public function destroy($name)		{
			session_destroy() ;// разрушает сессию
		}
	}

  $sn =   new SessionShell ;
  $sn->set('weare', 'once') ;
  $sn->get('weare') ;
  $sn-> exists('weare') ;
  $sn->del('weare') ;
