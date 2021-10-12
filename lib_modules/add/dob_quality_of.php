<html>
<head>
  <link href='style_modules.css' rel="stylesheet">
  <link href='butt1.css' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<style>

.table_dark {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 14px;
  width: 640px;
  text-align: left;
  border-collapse: collapse;
  background: #252F48;
  margin-top: 10px;
}
.table_dark th {
  color: #EDB749;
  border-bottom: 1px solid #37B5A5;
  padding: 12px 17px;
}
.table_dark td {
  color: #CAD4D6;
  border-bottom: 1px solid #37B5A5;
  border-right:1px solid #37B5A5;
  padding: 7px 17px;
}
.table_dark tr:last-child td {
  border-bottom: none;
}
.table_dark td:last-child {
  border-right: none;
}
.table_dark tr:hover td {
  text-decoration: underline;
}

body
{
	font-size:13px;
	text-align:center;
	font-family:Tahoma;
	color: #000000;
	background-image:url('images/bg1.jpg');
	background-color:#0A0A2A;
	margin:0;
	padding:0
} 

</style>
</head>
 <body>
<form method="post" action="dob_quality_of.php">
<table width="500"  class="table_dark" border="1" align="center">
<tr>
<td colspan="2" height="50"><h3><center><b>ДОДАВАННЯ ДАНИХ ПРО ЯКІСНІ ПОКАЗНИКИ МУКИ</b></center></h3></td>
</tr>
<tr>

<td height="50">Номер записи:</td>
<td height="50"><input type="text" name="id"/></td></tr>

<td height="50">Дата:</td>
<td height="50"><input type="text" name="date"/></td></tr>

<td height="50">Получатель:</td>
<td height="50"><input type="text" name="recipient"/></td></tr>

<td height="50">Поставщик:</td>
<td height="50"><input type="text" name="provider"/></td></tr>

<td height="50">Сорт:</td>
<td height="50"><input type="text" name="sort"/></td></tr>

<td height="50">Ответственный:</td>
<td height="50"><input type="text" name="responsible"/></td></tr>

<td height="50">Обьем поставки:</td>
<td height="50"><input type="text" name="volume"/></td></tr>



<tr><td height="50">Влаж. факт.:</td>
<td height="50"><input type="text" name="humidity_f"/></td></tr>



<tr><td height="50">Кол. клейк. факт.:</td>
<td height="50"><input type="text" name="gluten_f"/></td></tr>


<tr><td height="50">Кач. клейк. ИДК фактическое:</td>
<td height="50"><input type="text" name="quality_f"/></td></tr>



<tr><td height="50">Белизна факт.:</td>
<td height="50"><input type="text" name="white_f"/></td></tr>



<tr><td height="50">Число пад. факт.:</td>
<td height="50"><input type="text" name="fall_number_f"/></td></tr>

<tr><td height="50" align="left"><input class="push_button blue" type="submit" name="dz11" value="Додати" /></td>
<td height="50" align="center"><input type="button" class="push_button blue" onclick="http://factory/invnt" value="На головну!"/></td></tr>

</table>
</form>
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
if(isset($_POST['dz11']))
{

$id=strip_tags(trim($_POST['id']));
$date=strip_tags(trim($_POST['date']));
$recipient=strip_tags(trim($_POST['recipient']));
$provider=strip_tags(trim($_POST['provider']));
$sort=strip_tags(trim($_POST['sort']));
$responsible=strip_tags(trim($_POST['responsible']));
$volume=strip_tags(trim($_POST['volume']));
$humidity_f=strip_tags(trim($_POST['humidity_f']));
$gluten_f=strip_tags(trim($_POST['gluten_f']));
$quality_f=strip_tags(trim($_POST['quality_f']));
$white_f=strip_tags(trim($_POST['white_f']));
$fall_number_f=strip_tags(trim($_POST['fall_number_f']));


mysql_query("INSERT INTO quality_of_flour(id, date, recipient, provider, sort, responsible, volume, humidity_f, gluten_f, quality_f, white_f, fall_number_f) VALUES('$id','$date','$recipient','$provider','$sort','$responsible','$volume','$humidity_f','$gluten_f','$quality_f','$white_f','$fall_number_f')");
mysql_close();

}
?>
</body>
</html>
