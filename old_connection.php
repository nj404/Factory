<?php
$connection=mysql_connect("localhost","nick1","nick1");
$db=mysql_select_db("db_factory");
mysql_query("SET NAMES 'utf8';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
if(!$connection || !$db)
{
    exit(mysql_error());
}

/*
$host = 'localhost'; // адрес сервера 
$database = 'db_factory'; // имя базы данных
$user = 'nick1'; // имя пользователя
$password = 'nick1'; // пароль
*/
?>