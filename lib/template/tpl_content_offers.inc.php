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
<p align="center"><strong>Пропозиції від поставників</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Код поставника</th>
		<th>Назва компанії</th>
		<th>Група поставників</th>
		<th>Контактна особа</th>
		<th>Інформація</th>
		<th>Назва товару</th>
		<th>Ціна за одиницю</th>
		<th>Дата дії</th>
		<th>Дії</th>

	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код поставника</th>
		<th>Назва компанії</th>
		<th>Група поставників</th>
		<th>Контактна особа</th>
		<th>Інформація</th>
		<th>Назва товару</th>
		<th>Ціна за одиницю</th>
		<th>Дата дії</th>
		<th>Дії</th>

	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['id_prov']?></td>
<td><?=$item['name_komp']?></td>
<td><?=$item['group']?></td>
<td><?=$item['representative']?></td>
<td><?=$item['inform']?></td>
<td><?=$item['name_supl']?></td>
<td><?=$item['price']?></td>
<td><?=$item['date']?></td>
<td>
	<a href="lib_modules/delete/delete_offers.php?id_prov=<?php echo $item['id_prov']?>">Видалити</a>
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

<input type="button" value="Додати запис" class="button01" onclick="disp(document.getElementById('add'))" />

<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Додати пропозицію</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Код поставника:</td>
		<td height="50"><input type="text" name="1"/></td></tr>
		
		<td height="50">Назва компанії:</td>
		<td height="50"><input type="text" name="2"/></td></tr>

		<td height="50">Група поставників:</td>
		<td height="50">			
			<select name="3" size="1" >
						<option selected value="-">Не вказано</option>
						<option value="Поставник сировини">Поставник сировини</option>
						<option value="Поставник інгрідієнтів">Поставник інгрідієнтів</option>
						<option value="Постаник борошна">Постаник борошна</option>
			
			</select></td></tr>

		<td height="50">Контактна особа:</td>
		<td height="50"><input type="text" name="4"/></td></tr>
		
		<td height="50">Інформація для зв'язку:</td>
		<td height="50"><input type="text" name="5"/></td></tr>

		<td height="50">Назва товару:</td>
		<td height="50"><input type="text" name="6"/></td></tr>
		
		<td height="50">Ціна за одиницю:</td>
		<td height="50"><input type="text" name="7"/></td></tr>
		
		<td height="50">Дата дії:</td>
		<td height="50"><input type="date" name="8"/></td></tr>
		
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
$id_prov=strip_tags(trim($_POST['1']));
$name_komp=strip_tags(trim($_POST['2']));
$group=strip_tags(trim($_POST['3']));
$representative=strip_tags(trim($_POST['4']));
$inform=strip_tags(trim($_POST['5']));
$name_supl=strip_tags(trim($_POST['6']));
$price=strip_tags(trim($_POST['7']));
$date=strip_tags(trim($_POST['8']));
mysql_query("INSERT INTO `offers` (`id_prov`, `name_komp`, `group`, `representative`, `inform`, `name_supl`, `price`, `date`) 
VALUES ('$id_prov', '$name_komp', '$group', '$representative', '$inform', '$name_supl', '$price', '$date');");
mysql_close();
header("Refresh:0");
}
?>