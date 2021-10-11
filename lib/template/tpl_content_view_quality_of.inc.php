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
<p align="center"><strong>Качественные показатели муки</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Номер записи</th>
		<th>Дата</th>
		<th>Получатель</th>
		<th>Поставщик</th>
		<th>Сорт</th>
		<th>Ответственный</th>
		<th>Обьем поставки</th>
		<th>Влаж. факт.</th>
		<th>Кол. клейк. факт.</th>
		<th>Кач. клейк. ИДК факт</th>
		<th>Белизна факт.</th>
		<th>Число пад. факт.</th>
		<th>Управление</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Номер записи</th>
		<th>Дата</th>
		<th>Получатель</th>
		<th>Поставщик</th>
		<th>Сорт</th>
		<th>Ответственный</th>
		<th>Обьем поставки</th>
		<th>Влаж. факт.</th>
		<th>Кол. клейк. факт.</th>
		<th>Кач. клейк. ИДК факт</th>
		<th>Белизна факт.</th>
		<th>Число пад. факт.</th>
		<th>Управление</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">

<td><?=$item['id']?></td>
<td><?=$item['date']?></td>
<td><?=$item['recipient']?></td>
<td><?=$item['provider']?></td>
<td><?=$item['sort']?></td>
<td><?=$item['responsible']?></td>
<td><?=$item['volume']?></td>
<td><?=$item['humidity_f']?></td>
<td><?=$item['gluten_f']?></td>
<td><?=$item['quality_f']?></td>
<td><?=$item['white_f']?></td>
<td><?=$item['fall_number_f']?></td>
<td><input class="edit" type="button" value="Edit" /><input class="delete" type="button" value="Del" /></td>


</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:79%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:79%">
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

		<input type="button" value="Добавить данные" class="button01" onclick="disp(document.getElementById('add'))" />
		
<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Добавление новой заявки</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Номер:</td>
		<td height="50"><input type="text" name="id"/></td></tr>

		<td height="50">Дата:</td>
		<td height="50"><input type="date" name="date"/></td></tr>

		<td height="50">Получатель:</td>
		<td height="50"><input type="text" name="recipient"/></td></tr>

		<td height="50">Поставщик:</td>
		<td height="50"><input type="text" name="provider"/></td></tr>
		
		<td height="50">Сорт:</td>
		<td height="50"><input type="text" name="sort"/></td></tr>
		
		<td height="50">Ответственный:</td>
		<td height="50"><input type="text" name="responsible"/></td></tr>
		
		<td height="50">Количество:</td>
		<td height="50"><input type="text" name="volume"/></td></tr>
		
		<td height="50">Влажность:</td>
		<td height="50"><input type="text" name="humidity_f"/></td></tr>
		
		<td height="50">Кол. клейк.:</td>
		<td height="50"><input type="text" name="gluten_f"/></td></tr>
		
		<td height="50">ИДК:</td>
		<td height="50"><input type="text" name="quality_f"/></td></tr>
		
		<td height="50">Белизна:</td>
		<td height="50"><input type="text" name="white_f"/></td></tr>
		
		<td height="50">Число падения:</td>
		<td height="50"><input type="text" name="fall_number_f"/></td></tr>
		
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
mysql_close();;
header("Refresh:0");
}
?>

<br /><br /><p align="center"><strong>Аналитические данные</strong></p><br />

  <tr>
  <td align="center"><img src="lib_modules/jpgraph/diag_quality_of.php" border="0"></td>
  <td align="center"><img src="lib_modules/jpgraph/sdiag_quality_of.php" border="0"></td>
  </tr>
  <br>
  <td width="100px" align="center"><input type="button"  class="btn" onclick="location.href='lib_modules/add/dob_quality_of.php';" value="Добавить данные"/></td>
