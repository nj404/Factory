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
<p align="center"><strong>Якісні показники борошна</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:95%">
<thead>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Отримувач</th>
		<th>Поставник</th>
		<th>Сорт</th>
		<th>Відповідальний</th>
		<th>Об'єм поставки</th>
		<th>Вологість. факт.</th>
		<th>К-ть клейк. факт.</th>
		<th>Якість клейк. ІДК факт.</th>
		<th>Білизна факт.</th>
		<th>Число пад. факт.</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Отримувач</th>
		<th>Поставник</th>
		<th>Сорт</th>
		<th>Відповідальний</th>
		<th>Об'єм поставки</th>
		<th>Вологість. факт.</th>
		<th>К-ть клейк. факт.</th>
		<th>Якість клейк. ІДК факт.</th>
		<th>Білизна факт.</th>
		<th>Число пад. факт.</th>
		<th>Дії</th>
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
<td><a href="lib_modules/delete/delete_quality_of.php?id=<?php echo $item['id']?>">Видалити</a></td>


</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:95%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:95%">
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


		<input type="button" class="button01" onclick="location.href='lib_modules/excel/read_quality.php'" value="Завантажити дані">
		<input type="button" value="Додати дані" class="button01" onclick="disp(document.getElementById('add'))" />
		
<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Дадавання нового запису</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Номер:</td>
		<td height="50"><input type="text" name="id"/></td></tr>

		<td height="50">Дата:</td>
		<td height="50"><input type="date" name="date"/></td></tr>

		<td height="50">Отримувач:</td>
		<td height="50"><input type="text" name="recipient"/></td></tr>

		<td height="50">Поставник:</td>
		<td height="50"><input type="text" name="provider"/></td></tr>
		
		<td height="50">Сорт:</td>
		<td height="50"><input type="text" name="sort"/></td></tr>
		
		<td height="50">Відповідальний:</td>
		<td height="50"><input type="text" name="responsible"/></td></tr>
		
		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="volume"/></td></tr>
		
		<td height="50">Вологість:</td>
		<td height="50"><input type="text" name="humidity_f"/></td></tr>
		
		<td height="50">К-ть клейк.:</td>
		<td height="50"><input type="text" name="gluten_f"/></td></tr>
		
		<td height="50">ІДК:</td>
		<td height="50"><input type="text" name="quality_f"/></td></tr>
		
		<td height="50">Білизна:</td>
		<td height="50"><input type="text" name="white_f"/></td></tr>
		
		<td height="50">Число падіння:</td>
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

<br /><br /><p align="center"><strong>Аналітичні дані</strong></p><br />

  <tr>
<? 
	//<td align="center"><img src="lib_modules/jpgraph/diag_quality_of.php" border="0"></td>
	//<td align="center"><img src="lib_modules/jpgraph/sdiag_quality_of.php" border="0"></td> 
  ?>
  <td align="center"><img src="lib_modules/jpgraph/graph_quality_of_idk.php" border="0"></td>
  <td align="center"><img src="lib_modules/jpgraph/graph_quality_of_fell_number.php" border="0"></td>
  </tr>
  <br>

