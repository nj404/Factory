﻿<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

$id = $_GET['id'];
if(isset($_GET['id']))
{

$delete_sql= (" DELETE FROM mixing_programs WHERE id = '$id'");
mysql_query($delete_sql) or die("<p>При УДАЛЕНИИ данных произошла ошибка. Операция delete_sql!</p>". mysql_error());

echo "<h1>Запис успішно видалений!</h1>";

}

?>
