<?php
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

																// алгоритм 1 (для Не стандартной фаринограммы)
	// СТОЙКОСТЬ ТЕСТА
//точка СПАДА
//находим точку спада максимума
    $max = "SELECT time, value, nomer FROM farinograf_averaged 
			WHERE value IN (SELECT MAX(value) as value FROM farinograf_averaged 
			WHERE time BETWEEN 300 AND 2000)"; 
    $max1 =  mysql_query($max); 
    $row = mysql_fetch_assoc($max1);
    $t_max=$row['value'];
	$time_max=$row['time'];
	$id_max=$row['nomer']; // номер максимального элемента (нужен для подсчета площади)

	// ВРЕМЯ ФОРМИРОВАНИЯ ТЕСТА
// находим минимальную точку на заданном интервале (90-240)
	$min = "SELECT time, value FROM farinograf_averaged 
			WHERE value IN (SELECT MIN(value) as value FROM farinograf_averaged
			WHERE time BETWEEN 100 AND 240)";
    $min1 =  mysql_query($min); 
    $row_min = mysql_fetch_assoc($min1);
    $t_min=$row_min['value'];
	$time_min=$row_min['time'];

	// ВРЕМЯ СТАБИЛЬНОСТИ ТЕСТА  
// найдем значение "времени стабильности теста"
  $time_stab = $time_max - $time_min;

	// РАЗЖИЖЕНИЕ ТЕСТА "Е"
// найдем значение "Е"
// выборка ведется по НЕ УСРЕДНЕННОЙ фаринограмме!!
  	$min_e = "SELECT MIN(value) as value FROM farinograf_averaged WHERE time BETWEEN 180 AND 2000"; //найдем минимум на заданом участке для "е"
	$max_e = "SELECT MAX(value) as value FROM farinograf_averaged WHERE time BETWEEN 180 AND 2000"; //найдем максимум на заданом участке для "е"
    $min1_e =  mysql_query($min_e); 
	$max1_e =  mysql_query($max_e);
    $row_min_e = mysql_fetch_assoc($min1_e);
	$row_max_e = mysql_fetch_assoc($max1_e);
    $t_min_e=$row_min_e['value'];
	$t_max_e=$row_max_e['value'];
	
	$e = $t_max_e - $t_min_e; // найдем разницу между макс. и мин.
	
	// ЭЛАСТИЧНОСТЬ ТЕСТА "С"
// найдем значение "С"
// выборка ведется по НЕ УСРЕДНЕННОЙ фаринограмме!!
  	$min_с = "SELECT MIN(value) as value FROM farinograf WHERE time BETWEEN 240 AND 250"; //найдем минимум на заданом участке для "е"
	$max_c = "SELECT MAX(value) as value FROM farinograf WHERE time BETWEEN 240 AND 250"; //найдем максимум на заданом участке для "е"
    $query_min_c =  mysql_query($min_с); 
	$query_max_c =  mysql_query($max_c);
    $row_min_с = mysql_fetch_assoc($query_min_c);
	$row_max_с = mysql_fetch_assoc($query_max_c);
    $t_min_с=$row_min_с['value'];
	$t_max_с=$row_max_с['value'];
	
	$с = $t_max_с - $t_min_с + 10; // найдем ширину кривой для "С"
	
	// ПЛОЩАДЬ ГРАФИКА (Вч)	
// найдем площадь графика
	   $sql = "SELECT * FROM farinograf_averaged WHERE nomer<=$id_max";
       $query =  mysql_query($sql); 
	      $row_query = mysql_fetch_array($query); 
		  
		  // найдем значение шага
            $sql_dt_max = "SELECT time FROM farinograf_averaged 
            WHERE nomer IN (SELECT (MIN(nomer)+1) as nomer FROM farinograf_averaged)";
    $query_dt_max =  mysql_query($sql_dt_max); 
    $row_dt_max = mysql_fetch_assoc($query_dt_max);
    $t_max_dt=$row_dt_max['time'];
    
            $sql_dt_min = "SELECT time FROM farinograf_averaged 
            WHERE nomer IN (SELECT MIN(nomer) as nomer FROM farinograf_averaged)";
    $query_dt_min =  mysql_query($sql_dt_min); 
    $row_dt_min = mysql_fetch_assoc($query_dt_min);
    $t_min_dt=$row_dt_min['time'];
 
     $dt= $t_max_dt - $t_min_dt;
     //echo $dt;
   $y= array();
		//$S=0;
		//$sum=0;
   for($i=0; $i < mysql_num_rows($query); $i++)
	{
		$y[]=$row_query['value'];
		$S=0;
		$dt=16;

		for ($i=0; $i<count($y)-1; $i++)
		{
			$S+=( $y[$i] + $y[$i+1] ) / 2 * $dt;
		}
					//$sum = $sum + $S;
	}
// конвертируем нашу величину в см^2
	$converted_s=round($S/300); // числовое значение "300" это коефициент для перевода площади в см^2
		//echo " S=";
		//echo $S;

	// УДЕЛЬНАЯ РАБОТА Ауд
$a = (42.2 * $converted_s) / 120; // значение "120" это масса теста
	
	
	
																// алгоритм 2 (для СТАНДАРТНОЙ фаринограммы)

	// СТОЙКОСТЬ ТЕСТА
// найдем значение value
// Значение при котором график пересекает точку "500 ед.ф."
	$sql_value = "SELECT value FROM farinograf_averaged WHERE time IN 
	      		  (SELECT MAX(time) as time FROM farinograf_averaged WHERE value IN 
			      (SELECT `value` FROM `farinograf_averaged` WHERE (`value` >= 500) AND `time` BETWEEN 300 AND 2000))"; 
    $sql =  mysql_query($sql_value); 
    $row_value = mysql_fetch_assoc($sql);
    $max_value_2=$row_value['value'];
	//echo $max_value_2;

// найдем значение time
// Кордината времени когда график пересекает значение "500 ед.ф."	
    $sql_time = "SELECT MAX(time) as time FROM farinograf_averaged WHERE value IN 
			    (SELECT `value` FROM `farinograf_averaged` WHERE (`value` >= 500) AND `time` BETWEEN 300 AND 2000)"; 
    $max_time1 =  mysql_query($sql_time); 
    $sql_1 = mysql_fetch_assoc($max_time1);
    $max_time_2=$sql_1['time'];
	//echo $max_time_2;
	
	// РАЗЖИЖЕНИЕ ТЕСТА "Е"
// найдем значение "времени стабильности теста"
  $time_stab_2 = $max_time_2 - $time_min;
  
	// ПЛОЩАДЬ ГРАФИКА (Вч)	
// найдем площадь графика 
	   $sql_2 = "SELECT * FROM farinograf_averaged WHERE time<=$max_time_2";
       $query_2 =  mysql_query($sql_2); 
	      $row_query_2 = mysql_fetch_array($query_2); 
	   
   $y_2= array();
		//$S=0;
		//$sum=0;
   for($i_2=0; $i_2 < mysql_num_rows($query_2); $i_2++)
	{
		$y_2[]=$row_query_2['value'];
		$S_2=0;
		$dt_2=16;

		for ($i_2=0; $i_2<count($y_2)-1; $i_2++)
		{
			$S_2+=( $y_2[$i_2] + $y_2[$i_2+1] ) / 2 * $dt_2;
		}
					//$sum = $sum + $S;
	}
	$converted_s_2=round($S_2/300);
	
	// УДЕЛЬНАЯ РАБОТА Ауд
$a_2 = (42.2 * $converted_s_2) / 120; // значение "120" это масса теста
?>


<?php
?>

<?php
?>





