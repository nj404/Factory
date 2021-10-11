<?php
include 'old_connection.php';
if(isset($_GET['id']))
{        
    $query ="DELETE FROM request_supply WHERE id = '$id'";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
	
	echo "<h1>Запись успешно подтверждена</h1>";


//Ожидание 1 секунды и перенаправление пользователя
header('Refresh: 1; http://factory/request_supply');
}
?>