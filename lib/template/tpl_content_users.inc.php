<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:5});
});

    function disp(form) {
        if (form.style.display == "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>

	<head>
  <link href="css/add_table.css" rel="stylesheet">
	</head>

<h1 class="page_h"><?=$name_page?></h1>
<p align="center"><strong>Список зареестрованих користувачів:</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:50%">
<thead>
	<tr align="center">
		<th>ID Користувача</th>
		<th>Логін</th>
		<th>Пароль</th>
		<th>Рівень доступу</th>
		<th>Коментар</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>ID Користувача</th>
		<th>Логін</th>
		<th>Пароль</th>
		<th>Рівень доступу</th>
		<th>Коментар</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">

<td><?=$item['id_user']?></td>
<td><?=$item['login']?></td>
<td><?=$item['password']?></td>
<td><?=$item['rights']?></td>
<td><?=$item['coment']?></td>
<td><a href="lib_modules/delete/delete_users.php?id_user=<?php echo $item['id_user']?>">Видалити</a></td>


</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:50%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:50%">
	<form style="margin:0">
	<img src="<?=DIR_CSS?>icons/first.png" class="first" alt="">
	<img src="<?=DIR_CSS?>icons/prev.png" class="prev" alt="">
	<input type="text" class="pagedisplay" alt="">
	<img src="<?=DIR_CSS?>icons/next.png" class="next" alt="">
	<img src="<?=DIR_CSS?>icons/last.png" class="last" alt="">
	<select class="pagesize">
		<option selected="selected" value="5">5</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
	</select>
	</form>
</div>
</div>
<br /><br />



		<input type="button" value="Додати дані" class="button01" onclick="disp(document.getElementById('add'))" />
		
<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Дадавання нового користувача</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Номер користувача:</td>
		<td height="50"><input type="text" name="1" placeholder="ID"/></td></tr>

		<td height="50">Логін користувача:</td>
		<td height="50"><input type="text" name="2" placeholder="Логін"/></td></tr>

		<td height="50">Особистий пароль:</td>
		<td height="50"><input type="text" name="3" placeholder="Пароль"/></td></tr>

		<td height="50">Рівень доступу:</td>
		<td height="50">
		<select name="4" size="1" >
						<option selected value="-">Не вказано!</option>
				<optgroup label="Адміністратор">
						<option value="100">Рівень доступу: 100</option>
				</optgroup>
				
				<optgroup label="Начальник закупок">
						<option value="15">Рівень доступу: 15</option>
				</optgroup>
				
				<optgroup label="Начальник складу">
						<option value="10">Рівень доступу: 10</option>
				</optgroup>
				
				<optgroup label="Технолог">
						<option value="5">Рівень доступу: 5</option>
				</optgroup>
				
				<optgroup label="Лаборант">
						<option value="4">Рівень доступу: 4</option>
						
				<optgroup label="Поставник">
						<option value="3">Рівень доступу: 3</option>
				</optgroup>
			</select>
		</td></tr>
		
		<td height="50">Коментар:</td>
		<td height="50"><input type="text" name="5" placeholder="Примітки"/></td></tr>
		
	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="dz11" value="Додати" />	
		<td>
	</tr>

</table>
</form>

<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['dz11']))
{
$id_user=strip_tags(trim($_POST['1']));
$login=strip_tags(trim($_POST['2']));
$password=strip_tags(trim($_POST['3']));
$rights=strip_tags(trim($_POST['4']));
$coment=strip_tags(trim($_POST['5']));



mysql_query("INSERT INTO users(id_user, login, password, rights, coment) 
			VALUES('$id_user','$login','$password','$rights','$coment')");
mysql_close();;
header("Refresh:0");
}
?>


