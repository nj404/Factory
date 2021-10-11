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
<p align="center"><strong>Заявки на поставку поставку сировини</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Код заявки</th>
		<th>Товар</th>
		<th>Група</th>
		<th>Од.виміру</th>
		<th>Кількість</th>
		<th>Тара</th>
		<th>Ціна</th>
		<th>Код поставника</th>
		<th>Дата складанн</th>
		<th>Дата отримання</th>
		<th>Дії</th>


	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код заявки</th>
		<th>Товар</th>
		<th>Група</th>
		<th>Од.виміру</th>
		<th>Кількість</th>
		<th>Тара</th>
		<th>Ціна</th>
		<th>Код поставника</th>
		<th>Дата складанн</th>
		<th>Дата отримання</th>
		<th>Дії</th>
		
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['id']?></td>
<td><?=$item['description']?></td>
<td><?=$item['group']?></td>
<td><?=$item['units']?></td>
<td><?=$item['quantity']?></td>
<td><?=$item['tare']?></td>
<td><?=$item['price']?></td>
<td><?=$item['id_prov']?></td>
<td><?=$item['date']?></td>
<td><?=$item['date_receiving']?></td>
<td>
	<a href="lib_modules/data_move/move_request_supply.php?id=<?php echo $item['id']?>">Підтвердити</a>
	<a href="lib_modules/delete/delete_request_supply.php?id=<?php echo $item['id']?>">Видалити</a>
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
		<input type="button"  class="button01" onclick="location.href='lib_modules/pdf/pdf_request_supply.php'" value="Роздрукувати"/>
		<input type="button" class="button01" onclick="location.href='lib_modules/data_move/move_all_request_supply.php'" value="Підтвердити всі">
		<input type="button" value="Додати заявку" class="button01" onclick="disp(document.getElementById('add'))" />
		<input type="button" value="АВТОМАТИЧНА закупка" class="button01" onclick="disp(document.getElementById('options'))"/>


<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Нова заявка</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Номер заявки:</td>
		<td height="50"><input type="text" name="1" placeholder="Код заявки"/></td></tr>

		<td height="50">Товар:</td>
		<td height="50"><input type="text" name="2" placeholder="Назва товарної одиниці"/></td></tr>

		<td height="50">Група:</td>
		<td height="50">
			<select name="3" size="1" >
						<option selected value="-">Не вказано</option>
				<optgroup label="Борошно">
						<option value="Пшеничне борошно">Пшеничне борошно</option>
						<option value="Ржане порошно">Ржане порошно</option>
						<option value="Кукурудзяне борошно">Кукурудзяне борошно</option>
				</optgroup>
				
				<optgroup label="Начинки">
						<option value="Начинка для круасанів">Начинка для круасанів</option>
						<option value="Повидло">Повидло</option>
						<option value="Сирна начинка">Сирна начинка</option>
				</optgroup>
				
				<optgroup label="Інгрідієнти">
						<option value="Сіль">Сіль</option>
						<option value="Вода">Вода</option>
						<option value="Дріжжі">Дріжжі</option>
						<option value="Закваска">Закваска</option>
						<option value="Яйця">Яйця</option>
				</optgroup>
			</select>
		</td></tr>
		
		<td height="50">Од.виміру:</td>
		<td height="50">
					<select name="4" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="л.">Літри</option>
						<option value="кг.">Кілограми</option>
						<option value="шт.">Штуки</option>
			</select>
		</td></tr>

		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="5" placeholder="Кількість"/></td></tr>
		
		<td height="50">Тара:</td>
		<td height="50">
			<select name="10" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="Так">Так</option>
						<option value="Ні">Ні</option>
			</select>
		</td></tr>
		
		<td height="50">Ціна:</td>
		<td height="50"><input type="text" name="6" placeholder="Ціна за одиницю"/></td></tr>
		
		<td height="50">Код поставника:</td>
		<td height="50"><input type="text" name="7" placeholder="Код поставника"/></td></tr>
		
		<td height="50">Дата складання:</td>
		<td height="50"><input type="date" name="8" placeholder="Дата укладання"/></td></tr>
		
		<td height="50">Дата отримання:</td>
		<td height="50"><input type="date" name="9" placeholder="Дата отримання"/></td></tr>
	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="dz11" value="Додати" />	
		<td>
	</tr>

</table>
</form>

<form action="lib_modules/auto_ordering/auto_ordering.php" method="post" name="1" id=options style="display: none;">
<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Параметри для формування заявок:</b></center></h3></td>
</tr>

		<tr>
		<td height="40">Плановий випуск продукції (кг.):</td>
		<td height="40"><input type="text" name="1"/></td>
		</tr>
		
		<tr>
		<td height="40">Прогнозовані продажі продукції (кг.):</td>
		<td height="40"><input type="text" name="2"/></td>
		</tr>

		<tr>
		<td height="40">Дата отримання товарів:</td>
		<td height="40"><input type="date" name="3"/></td>
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
$id=strip_tags(trim($_POST['1']));
$description=strip_tags(trim($_POST['2']));
$group=strip_tags(trim($_POST['3']));
$units=strip_tags(trim($_POST['4']));
$quantity=strip_tags(trim($_POST['5']));
$tare=strip_tags(trim($_POST['10']));
$price=strip_tags(trim($_POST['6']));
$id_prov=strip_tags(trim($_POST['7']));
$date=strip_tags(trim($_POST['8']));
$date_receiving=strip_tags(trim($_POST['9']));



mysql_query("INSERT INTO `request_supply` (`id`, `description`, `group`, `units`, `quantity`, `tare`, `price`, `id_prov`, `date`, `date_receiving`) 
VALUES ('$id', '$description', '$group', '$units', '$quantity', '$tare', '$price', '$id_prov', '$date', '$date_receiving');");
mysql_close();
header("Refresh:0");
}
?>