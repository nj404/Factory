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
<form method="post" action="dob_invnt.php">
<table width="500"  class="table_dark" border="1" align="center">
<tr>
<td colspan="2" height="50"><h3><center><b>ДОДАВАННЯ даних інвентаризації</b></center></h3></td>
</tr>
<tr>
<td height="50">#</td>
<td height="50"><input type="text" name="nomer"/></td></tr>

<td height="50">ID предмета:</td>
<td height="50"><input type="text" name="id"/></td></tr>

<td height="50">Название:</td>
<td height="50"><input type="text" name="description"/></td></tr>

<td height="50">Количество:</td>
<td height="50"><input type="text" name="quantity"/></td></tr>

<td height="50">Дата:</td>
<td height="50"><input type="date" name="date"/></td></tr>

<tr><td height="50" align="left"><input class="push_button blue" type="submit" name="dz11" value="Додати" /></td>
<td height="50" align="center"><input type="button" class="push_button blue" onclick="http://Factory/invnt" value="На головну!"/></td></tr>

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
$nomer=strip_tags(trim($_POST['nomer']));
$id=strip_tags(trim($_POST['id']));
$description=strip_tags(trim($_POST['description']));
$quantity=strip_tags(trim($_POST['quantity']));
$date=strip_tags(trim($_POST['date']));



mysql_query("INSERT INTO invnt(nomer, id, description, quantity, date) VALUES('$nomer','$id','$description','$quantity','$date')");
mysql_close();

}
?>
</body>
</html>
