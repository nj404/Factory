<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:10});
	// обработка события ввода штрих-кода
	$("input[name=id]").keyup(function()
	{
		let id = this.value;
		//$.post('lib_modules/get_name/get_name_avalible_raw.php', {id:id}, function(answer){$("#answer").text(answer);});
		$.post('get_name_avalible_raw.php', {id:id}, function(answer){$("#answer").text(answer);});
	});
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
<p align="center"><strong>Доступна сировина</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:85%">
<thead>
	<tr align="center">
		<th>Код вировини</th>
		<th>Група</th>
		<th>Товар</th>
		<th>Код постачальника</th>
		<th>Тара</th>
		<th>Од. виміру</th>
		<th>Ціна</th>
		<th>Кількість</th>
		<th>Резерв</th>
		<th>Дата проводки</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код вировини</th>
		<th>Група</th>
		<th>Товар</th>
		<th>Код постачальника</th>
		<th>Тара</th>
		<th>Од. виміру</th>
		<th>Ціна</th>
		<th>Кількість</th>
		<th>Резерв</th>
		<th>Дата проводки</th>
		<th>Дії</th>
		
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>

	<?
		$min = $item['quantity'] - $item['reserve'];
            if ($min > 0) {
                $td_style_min = '';
            } elseif ($min < 0) {
                $td_style_min = 'background-color: #DC143C; color: #FFFFFF; font-size: 14px;';
            } else {
                $td_style_min = '';
            }
		?>

<tr align="center">
<td style="<?= $td_style_min ?>"><?=$item['id']?></td>
<td><?=$item['group']?></td>
<td><?=$item['description']?></td>
<td><?=$item['id_prov']?></td>
<td><?=$item['tare']?></td>
<td><?=$item['units']?></td>
<td><?=$item['price']?></td>
<td style="<?= $td_style_min ?>"><?=$item['quantity']?></td>
<td style="<?= $td_style_min ?>"><?=$item['reserve']?></td>
<td><?=$item['date']?></td>

<td>
	<a href="lib_modules/delete/delete_avalible_raw.php?id=<?php echo $item['id']?>">Видалити</a>
</td>
</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:85%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:85%">
	<form style="margin:0">
	<img src="<?=DIR_CSS?>icons/first.png" class="first" alt="">
	<img src="<?=DIR_CSS?>icons/prev.png" class="prev" alt="">
	<input type="text" class="pagedisplay" alt="">
	<img src="<?=DIR_CSS?>icons/next.png" class="next" alt="">
	<img src="<?=DIR_CSS?>icons/last.png" class="last" alt="">
	<select class="pagesize">
		<option value="5">5</option>
		<option selected="selected" value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
	</select>
	</form>
</div>
</div>
<br /><br />

<input type="button" value="РУЧНА закупка" class="button01" onclick="disp(document.getElementById('add1'))" />
<input type="button" value="АВТОМАТИЧНА закупка" class="button01" onclick="disp(document.getElementById('options'))"/>
<input type="button" value="Додати сировину" class="button01" onclick="disp(document.getElementById('add'))" />
<input type="button" value="Списати сировину" class="button01"  onclick="disp(document.getElementById('write_off'))"/>
<input type="button" value="Прийняти сировину" class="button01" onclick="disp(document.getElementById('take_raw'))"/>


<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Додати товар</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Код сировини:</td>
		<td height="50"><input type="text" name="1"/></td></tr>

		<td height="50">Група:</td>
		<td height="50">			
			<select name="2" size="1" >
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
			</select></td></tr>

		<td height="50">Назва:</td>
		<td height="50"><input type="text" name="3"/></td></tr>

		<td height="50">Од. виміру:</td>
		<td height="50">				
			<select name="4" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="л.">Літри</option>
						<option value="кг.">Кілограми</option>
						<option value="шт.">Штуки</option>
			</select></td></tr>
		
		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="5"/></td></tr>
		
		<td height="50">Код поставника:</td>
		<td height="50"><input type="text" name="6"/></td></tr>
		
		<td height="50">Тара:</td>
		<td height="50">
			<select name="7" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="Так">Так</option>
						<option value="Ні">Ні</option>
			</select>
		</td></tr>
		
		<td height="50">Ціна:</td>
		<td height="50"><input type="text" name="8"/></td></tr>
		
		<td height="50">Дата отримання:</td>
		<td height="50"><input type="date" name="9"/></td></tr>
		
		<td height="50">Необхідний резерв:</td>
		<td height="50"><input type="text" name="10"/></td></tr>
	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="dz11" value="Додати" />	
		<td>
	</tr>

</table>
</form>

<form method="post" name="2" id=write_off style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Списати сировину</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Код сировини:</td>
		<td height="50"><div align="center"><input type=text name="id" placeholder="Відскануйте код сировини" ></div></td></tr>
		
		<td height="50">Назва:</td>
		<td height="50"><div align="center" id='answer'></div></td></tr>

		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="spisanie" placeholder="Списана кількість"/></td></tr>

	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="write_off" value="Списати" />	
		<td>
	</tr>

</table>
</form>

<form method="post" name="3" id=take_raw style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Прийняти сировину:</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Код сировини:</td>
		<td height="50"><div align="center"><input type=text name="id" placeholder="Відскануйте код сировини" ></div></td></tr>
		
		<td height="50">Назва:</td>
		<td height="50"><div align="center" id='answer'></div></td></tr>

		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="spisanie" placeholder="Прийнята кількість"/></td></tr>
	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="take_raw" value="Прийняти" />	
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

<form method="post" name="1" id=add1 style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Нова заявка на поставку</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Номер заявки:</td>
		<td height="50"><input type="text" name="01" placeholder="Код заявки"/></td></tr>

		<td height="50">Товар:</td>
		<td height="50"><input type="text" name="02" placeholder="Назва товарної одиниці"/></td></tr>

		<td height="50">Група:</td>
		<td height="50">
			<select name="03" size="1" >
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
					<select name="04" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="л.">Літри</option>
						<option value="кг.">Кілограми</option>
						<option value="шт.">Штуки</option>
			</select>
		</td></tr>

		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="05" placeholder="Кількість"/></td></tr>
		
		<td height="50">Тара:</td>
		<td height="50">
			<select name="06" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="Так">Так</option>
						<option value="Ні">Ні</option>
			</select>
		</td></tr>
		
		<td height="50">Ціна:</td>
		<td height="50"><input type="text" name="07" placeholder="Ціна за одиницю"/></td></tr>
		
		<td height="50">Код поставника:</td>
		<td height="50"><input type="text" name="08" placeholder="Код поставника"/></td></tr>
		
		<td height="50">Дата складання:</td>
		<td height="50"><input type="date" name="09" placeholder="Дата укладання"/></td></tr>
		
		<td height="50">Дата отримання:</td>
		<td height="50"><input type="date" name="010" placeholder="Дата отримання"/></td></tr>
	<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="add1" value="Додати" />	
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
$group=strip_tags(trim($_POST['2']));
$description=strip_tags(trim($_POST['3']));
$units=strip_tags(trim($_POST['4']));
$quantity=strip_tags(trim($_POST['5']));
$id_prov=strip_tags(trim($_POST['6']));
$tare=strip_tags(trim($_POST['7']));
$price=strip_tags(trim($_POST['8']));
$date=strip_tags(trim($_POST['9']));
$reserve=strip_tags(trim($_POST['10']));




mysql_query("INSERT INTO `avalible_raw` (`id`, `group`, `description`, `units`, `quantity`, `id_prov`, `tare`, `price`, `date`, `reserve`) 
VALUES ('$id', '$group', '$description', '$units', '$quantity', '$id_prov', '$tare', '$price', '$date', '$reserve');");
mysql_close();
header("Refresh:0");
}
?>

<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['write_off']))
{
$id=strip_tags(trim($_POST['id']));
$spisanie=strip_tags(trim($_POST['spisanie']));


mysql_query("UPDATE avalible_raw SET quantity = quantity - '$spisanie' WHERE id = '$id'");
mysql_close();
header("Refresh:0");
}
?>

<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['take_raw']))
{
$id=strip_tags(trim($_POST['id']));
$spisanie=strip_tags(trim($_POST['spisanie']));


mysql_query("UPDATE avalible_raw SET quantity = quantity + '$spisanie' WHERE id = '$id'");
mysql_close();
header("Refresh:0");
}
?>

<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['add1']))
{
$id=strip_tags(trim($_POST['01']));
$description=strip_tags(trim($_POST['02']));
$group=strip_tags(trim($_POST['03']));
$units=strip_tags(trim($_POST['04']));
$quantity=strip_tags(trim($_POST['05']));
$tare=strip_tags(trim($_POST['06']));
$price=strip_tags(trim($_POST['07']));
$id_prov=strip_tags(trim($_POST['08']));
$date=strip_tags(trim($_POST['09']));
$date_receiving=strip_tags(trim($_POST['010']));



mysql_query("INSERT INTO `request_supply` (`id`, `description`, `group`, `units`, `quantity`, `tare`, `price`, `id_prov`, `date`, `date_receiving`) 
VALUES ('$id', '$description', '$group', '$units', '$quantity', '$tare', '$price', '$id_prov', '$date', '$date_receiving');");
mysql_close();
header("Refresh:0");
}
?>