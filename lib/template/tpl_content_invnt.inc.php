<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:20});
	// обработка события ввода штрих-кода
	$("input[name=add_with_code]").keyup(function()
	{
		let id = this.value;
		$.post('getid.php', {id:id}, function(answer){$("#answer").text(answer);});
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
<p align="center"><strong>Інвентарний список</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:95%">
<thead>
	<tr align="center">
		<th>Код сировини</th>
		<th>Група</th>
		<th>Назва товару</th>
		<th>Од. виміру</th>
		<th>Кількість</th>
		<th>Код постачальника</th>
		<th>Тара</th>
		<th>Ціна</th>
		<th>Мін. кількість</th>

		<th>Дата</th>
		<th>Факт. кіл.</th>
		<th>Різниця</th>
		<th>Прибуток/нед.</th>

		<th>Дії</th>
		
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код сировини</th>
		<th>Група</th>
		<th>Назва товару</th>
		<th>Од. виміру</th>
		<th>Кількість</th>
		<th>Код постачальника</th>
		<th>Тара</th>
		<th>Ціна</th>
		<th>Мін. кількість</th>

		<th>Дата</th>
		<th>Факт. кіл.</th>
		<th>Різниця</th>
		<th>Прибуток/нед.</th>

		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
    <?php foreach($content as $item): ?>
        <?php
            $difference = $item['quantity_f'] - $item['quantity'];
            if ($difference > 0) {
                $td_style = 'background-color: #00FF00; color: rgba(0,0,0,0.8); font-size: 14px;';
            } elseif ($difference < 0) {
                $td_style = 'background-color: #ff0000; color: #FFFFFF; font-size: 14px;';
            } else {
                $td_style = '';
            }
			
			            $min = $item['quantity_f'] - $item['reserve'];
            if ($min > 0) {
                $td_style_min = '';
            } elseif ($min < 0) {
                $td_style_min = 'background-color: #DC143C; color: #FFFFFF; font-size: 14px;';
            } else {
                $td_style_min = '';
            }
			
			            $money = $difference * $item['price'];
            if ($money > 1) {
                $td_style_money = 'background-color: #2E8B57; color: #FFFFFF; font-size: 14px;';
            } elseif ($money < -1) {
                $td_style_money = 'background-color: #CD5C5C; color: #FFFFFF; font-size: 14px;';
            } else {
                $td_style_money = '';
            }
			
        ?>
        <tr align="center">
            <td><?= $item['id'] ?></td>
            <td><?= $item['group'] ?></td>
            <td><?= $item['description'] ?></td>
            <td><?= $item['units'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td><?= $item['id_prov'] ?></td>
            <td><?= $item['tare'] ?></td>
            <td><?= $item['price'] ?></td>
            <td style="<?= $td_style_min ?>"><?= $item['reserve'] ?></td>
            <td><?= $item['date'] ?></td>
            <td style="<?= $td_style_min ?>"><?= $item['quantity_f'] ?></td>
            <td style="<?= $td_style ?>"><?= $difference ?></td>
			<td style="<?= $td_style_money ?>"><?= $money ?></td>
            <td>
                <a href="lib_modules/data_move/move_invnt.php?id=<?= $item['id'] ?>">Архивировать</a>
                <a href="lib_modules/delete/delete_invnt.php?id=<?= $item['id'] ?>">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table border="2">
<div style="margin:0 auto;width:95%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:95%">
	<form style="margin:0">
	<img src="css/icons/first.png" class="first" alt="">
	<img src="css/icons/prev.png" class="prev" alt="">
	<input type="text" class="pagedisplay" alt="">
	<img src="css/icons/next.png" class="next" alt="">
	<img src="css/icons/last.png" class="last" alt="">
	<select class="pagesize">
		<option value="5">5</option>
		<option value="10">10</option>
		<option selected="selected" value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
	</select>
	</form>
</div>
</div>
<br /><br /><br />

		<form>
			<table class="simple-little-table" align="center" style="margin: 0 auto;width:60%">
				<tr>
					<td>
						<p align="center"><strong>Пошук інвентарної одиниці по інв.номеру:</strong></p>
					</td>
					<td>
						<div align="center"><input type=text name="add_with_code" placeholder="Введіть інвентарний номер"></div>
					</td>
					<td >
						<div align="center" id='answer'></div>
					</td>
				</tr>
			</table>
		</form>
		
<br>
<td width="300px" align="center"><input type="button"  class="button01" onclick="location.href='lib_modules/pdf/pdf_invnt.php'" value="Роздрукувати"/></td>
<td width="100px" align="center"><input type="button"  class="button01" onclick="location.href='lib_modules/excel/write_invnt.php';" value="Завантажити звіт"/></td>

<td width="100px" align="center"><input type="button" value="Додати данні" class="button01" onclick="disp(document.getElementById('add'))" /></td>

<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Додати дані</b></center></h3></td>
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

		<td height="50">Товар:</td>
		<td height="50"><input type="text" name="3"/></td></tr>

		<td height="50">Од. виміру:</td>
		<td height="50">
			<select name="4" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="л.">Літри</option>
						<option value="кг.">Кілограми</option>
						<option value="шт.">Штуки</option>
			</select>
		</td></tr>

		<td height="50">Кількість:</td>
		<td height="50"><input type="text" name="5"/></td></tr>
		
		<td height="50">Код постачальника:</td>
		<td height="50"><input type="text" name="6"/></td></tr>
		
		<td height="50">Тара:</td>
		<td height="50">			
			<select name="7" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="Так">Так</option>
						<option value="Ні">Ні</option>
			</select></td></tr>
		
		<td height="50">Ціна:</td>
		<td height="50"><input type="text" name="8"/></td></tr>
		
		<td height="50">Резерв:</td>
		<td height="50"><input type="text" name="9"/></td></tr>
		
		<td height="50">Дата:</td>
		<td height="50"><input type="date" name="10"/></td></tr>
		
		<td height="50">Фактична кількість:</td>
		<td height="50"><input type="text" name="11"/></td></tr>
	
	
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
$id=strip_tags(trim($_POST['1']));
$group=strip_tags(trim($_POST['2']));
$description=strip_tags(trim($_POST['3']));
$units=strip_tags(trim($_POST['4']));
$quantity=strip_tags(trim($_POST['5']));
$id_prov=strip_tags(trim($_POST['6']));
$tare=strip_tags(trim($_POST['7']));
$price=strip_tags(trim($_POST['8']));
$reserve=strip_tags(trim($_POST['9']));
$date=strip_tags(trim($_POST['10']));
$quantity_f=strip_tags(trim($_POST['11']));




mysql_query("INSERT INTO `invnt` (`id`, `group`, `description`, `units`, `quantity`, `id_prov`, `tare`, `price`, `reserve`, `date`, `quantity_f`) 
VALUES ('$id', '$group', '$description', '$units', '$quantity', '$id_prov', '$tare', '$price', '$reserve', '$date', '$quantity_f');");
mysql_close();
header("Refresh:0");
}
?>