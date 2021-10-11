<html>
<head>
<style>
.va{
    margin-top:150px;
}
.butt{
    width: 100px;
    height: 50px;
}
</style>
</head>
<body>
<?php
$connection=mysql_connect("localhost","nick1","nick1");
$db=mysql_select_db("sample");
mysql_query("SET NAMES 'utf8';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
if(!$connection || !$db)
{
    exit(mysql_error());
}
$id_pr=$_GET['id_pr'];

mysql_query("DELETE FROM invnt WHERE id_pr='$id_pr'");
mysql_close();

?>
<center><h2 class="va"><b>Видалення  виконано!</b></h2><br /><br />
<input type="button" class="butt" onclick="location.href='http://cw/invnt'" value="Назад"/></center>
</body>
</html>
