<?php
// Класс для работы с сессиями
class CSession
{
	// Сохраняем переменную в session
	public static function Push($name, $value){ $_SESSION[$name] = $value; }
	// Ситываем данную переменную из session
	public static function Read($name){ return $_SESSION[$name]; }
	// Считываем данную переменную из session, а потом ее удаляем от туда
	public static function Pop($name)
	{
		$value = $_SESSION[$name];
		unset($_SESSION[$name]);
		return $value;
	}
	// Проверяем есть ли данная переменная в session
	public static function Has($name){ return isset($_SESSION[$name]); }
	// Удалить массив данных
	public static function Kick($names){ foreach($names as $name) unset($_SESSION[$name]); }
}
?>