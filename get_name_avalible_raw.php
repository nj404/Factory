<?php
error_reporting(0);
@include_once("lib/conf/config.inc.php");
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
//$link = mysqli_connect(localhost, nick1, nick1, sample);
mysqli_query($link, 'SET NAMES utf8');
$id = $_POST['id'];
if(isset($id))
{
	$sql = "SELECT * FROM avalible_raw WHERE id='$id'";
	$result = mysqli_query($link, $sql);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result)) $name = $row['description'];
		mysqli_free_result($result);
	}
	if($name) echo $name; else echo "Такая позиция отсутствует!";
}
mysqli_close($link);
?>