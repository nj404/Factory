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

<p align="center"><strong>Даны про продажі:</strong></p>

<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Хліб "Обідній"</th>
		<th>Хліб "Одеський"</th>
		<th>Хліб "Нарізний"</th>
		<th>Загальні продажі</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Хліб "Обідній"</th>
		<th>Хліб "Одеський"</th>
		<th>Хліб "Нарізний"</th>
		<th>Загальні продажі</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>

<tr align="center">
<td><?=$item['id']?></td>
<td><?=$item['date']?></td>
<td><?=$item['obidniy']?></td>
<td><?=$item['odeskiy']?></td>
<td><?=$item['nareznoy']?></td>
<td><?=$item['sum']?></td>
<td>
	<a href="lib_modules/delete/delete_sales.php?id=<?php echo $item['id']?>">Видалити</a>
</td>

</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:80%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:80%">
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


<!-- тут нужно прописать путь к кнопке !!! ДЛЯ ДОБАВЛЕНИЯ В ТАБЛИЦУ -->
<td width="100px" align="center"><input type="button" value="Додати запис" class="button01" onclick="disp(document.getElementById('add'))" /></td>
<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Результати замісу:</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Дата:</td>
		<td height="50"><input type="date" name="1"/></td></tr>
		
		<td height="50">Хліб "Обідній" (кг.):</td>
		<td height="50"><input type="text" name="2"/></td></tr>

		<td height="50">Хліб "Одеський" (кг.):</td>
		<td height="50"><input type="text" name="3"/></td></tr>
		
		<td height="50">Хліб "Нарізний" (кг.):</td>
		<td height="50"><input type="text" name="4"/></td></tr>
		
		<td height="50">Сума (кг.):</td>
		<td height="50"><input type="text" name="5"/></td></tr>
	</tr>		
		<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="dz11" value="Додати" />	
		<td>
	</tr>
</table>
</form>

<input type="button" value="Прогнозування" class="button01" onclick="disp(document.getElementById('options'))"/>
<form action="/factory/API_1_2" method="post" name="1" id=options style="display: none;">


<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Завантаження даних для прогнозу:</b></center></h3></td>
</tr>

		<tr>
		<td height="40">Категорія продукції:</td>
		<td height="40">
		<select id="product" name="product">
                  <option value="obidniy">Обідній</option>
                  <option value="odeskiy">Одеський</option>
                  <option value="nareznoy">Нарізний</option>
				  <option value="sum">Сума</option>
        </select>
		</td>
		</tr>


		<tr colspan="2">
		<td height="40">
		<input class="button01" type="submit" name="auto_order" value="СФОРМУВАТИ" />	
		<td>
		</tr>

</table>
</form>




<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['dz11']))
{
$date=strip_tags(trim($_POST['1']));
$obidniy=strip_tags(trim($_POST['2']));
$odeskiy=strip_tags(trim($_POST['3']));
$nareznoy=strip_tags(trim($_POST['4']));
$sum=strip_tags(trim($_POST['5']));

mysql_query("INSERT INTO `sales` (`date`, `obidniy`, `odeskiy`, `nareznoy`, `sum`) 
VALUES ('$date', '$obidniy', '$odeskiy', '$nareznoy', '$sum');");
mysql_close();
header("Refresh:0");
}
?>