<?php
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

	   $sql = "SELECT * FROM farinograf";
		   $query =  mysql_query($sql); 
			  $row_query = mysql_fetch_array($query);  

	$sql_nomer = "SELECT MIN(nomer) as nomer FROM farinograf";
		$query_nomer =  mysql_query($sql_nomer); 
			$row_nomer = mysql_fetch_assoc($query_nomer);
				$nomer=$row_nomer['nomer'];

	$averaging = 60; // Кратность усреднения
	
	$nomer_next = $nomer + ($averaging - 1);
	$max_step = (round (mysql_num_rows($query) / $averaging)) - 0;

	
   for($i=0; $i < $max_step; $i++)
	{
		$sql_av_value = "SELECT AVG(value) AS value FROM farinograf WHERE nomer BETWEEN '$nomer' AND '$nomer_next' ";
		$sql_av_time = "SELECT AVG(time) AS time FROM farinograf WHERE nomer BETWEEN '$nomer' AND '$nomer_next'";
			$query_av_value =  mysql_query($sql_av_value);
			$query_av_time =  mysql_query($sql_av_time);
				$row_av_value = mysql_fetch_assoc($query_av_value);
				$row_av_time = mysql_fetch_assoc($query_av_time);
					$value=$row_av_value['value'];
					$time=$row_av_time['time'];
	
	mysql_query("INSERT INTO `farinograf_averaged` (`time`, `value`) VALUES ('$time', '$value');");
	
	$nomer = $nomer_next;
	$nomer_next = $nomer_next + $averaging;
	}
echo "<h1>Усереднення даних експерименту виконано успішно!<br></h1>";
echo "Кількість отриманих точок: ";
echo $max_step;
echo ".";

?>