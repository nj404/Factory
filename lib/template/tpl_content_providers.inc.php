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
<p align="center"><strong>Список поставників</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Код поставника</th>
		<th>Назва компанії</th>
		<th>Група постаників</th>
		<th>Контактна особа</th>
		<th>Контактні дані</th>
		<th>Сальдо</th>
		<th>Заборгованість</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код поставника</th>
		<th>Назва компанії</th>
		<th>Група постаників</th>
		<th>Контактна особа</th>
		<th>Контактні дані</th>
		<th>Сальдо</th>
		<th>Заборгованість</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['id_prov']?></td>
<td><?=$item['kompany']?></td>
<td><?=$item['group']?></td>
<td><?=$item['representative']?></td>
<td><?=$item['inform']?></td>
<td><?=$item['balance']?></td>
<td><?=$item['debt']?></td>
<td>
	<a href="lib_modules/delete/delete_providers.php?
			id_prov=<?php echo $item['id_prov']?>">Видалити</a>
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

<input type="button" value="Додати поставника" class="button01" onclick="disp(document.getElementById('add'))" />

<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Додавання нового поставника</b></center></h3></td>
</tr>
<tr>
	<td height="50">Код постанника:</td>
	<td height="50"><input type="text" name="1" placeholder="Код поставника (EAN-8)"/></td></tr>

	<td height="50">Назва компаії:</td>
	<td height="50"><input type="text" name="2" placeholder="Назва компанії"/></td></tr>

	<td height="50">Група постаників:</td>
	<td height="50"><select name="3" size="1" >
						<option selected value="-">Не вказано</option>
						<option selected value="Інше">Інше</option>
				<optgroup label="Поставник борошна">
						<option value="Поставник пшеничного борошна">Поставник пшеничного борошна</option>
						<option value="Поставник ржаного борошна">Поставник ржаного борошна</option>
						<option value="Поставник кукурудзяного борошна">Поставник кукурудзяного борошна</option>
				</optgroup>
				
						<option value="Поставник начинок">Поставник начинок</option>
						<option value="Поставник інгрідіентів">Поставник інгрідіентів</option>
						
						<option value="Поставник етикеточних матеріалів">Поставник етикеточних матеріалів</option>


			</select></td></tr>

	<td height="50">Контактна особа:</td>
	<td height="50"><input type="text" name="4" placeholder="ПІБ контактної особи"/></td></tr>
	
	<td height="50">Контактна інформ.:</td>
	<td height="50"><input type="text" name="5" placeholder="Номер телефону"/></td></tr>

	<td height="50">Сальдо:</td>
	<td height="50"><input type="text" name="6" placeholder="Сума сальдо"/></td></tr>
	
	<td height="50">Заборгованість:</td>
	<td height="50"><input type="text" name="7" placeholder="Сума заборгованості"/></td></tr>


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
$kompany=strip_tags(trim($_POST['2']));
$group=strip_tags(trim($_POST['3']));
$representative=strip_tags(trim($_POST['4']));
$inform=strip_tags(trim($_POST['5']));
$balance=strip_tags(trim($_POST['6']));
$debt=strip_tags(trim($_POST['7']));



mysql_query("INSERT INTO `providers` (`id_prov`, `kompany`, `group`, `representative`, `inform`, `balance`, `debt`) VALUES ('$id_prov', '$kompany', '$group', '$representative', '$inform', '$balance', '$debt')");
mysql_close();
header("Refresh:0");
}
?>