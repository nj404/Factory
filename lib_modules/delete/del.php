<?php
error_reporting(0);
@include_once("lib/conf/config.inc.php");
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_query($link, 'SET NAMES utf8');
$id = $_POST['id'];
if(isset($id))
{
	$sql = "DELETE FROM invnt WHERE id_pr='$id'";
	$result = mysqli_query($link, $sql);
	if($result) echo "true"; else echo "false";
}
mysqli_close($link);
?>