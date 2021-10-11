<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:5});
});
</script>

    <script>
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
<p align="center"><strong>Список договорів</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Код договору</th>
		<th>Послуга</th>
		<th>Коди сировини</th>
		<th>Коди поставника</th>
		<th>Дата заключення</th>
		<th>Дата виконання</th>
		<th>Дії</th>
	
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Код договору</th>
		<th>Послуга</th>
		<th>Коди сировини</th>
		<th>Код поставника</th>
		<th>Дата заключення</th>
		<th>Дата виконання</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['id_cont']?></td>
<td><?=$item['service']?></td>
<td><?=$item['id_request']?></td>
<td><?=$item['id_prov']?></td>
<td><?=$item['date_conclusion']?></td>
<td><?=$item['date_completion']?></td>

<td>
<a href="lib_modules/data_move/move_contracts.php?id_cont=<?php echo $item['id_cont']?>">В архів</a>
<a href="lib_modules/delete/delete_contracts.php?id_cont=<?php echo $item['id_cont']?>">Видалити</a>
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
<input type="button"  class="button01" onclick="location.href='lib_modules/pdf/pdf_contracts.php'" value="Роздрукувати"/>
<input type="button" value="Додати данні" class="button01" onclick="disp(document.getElementById('add'))" />

<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Додати новий договір</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Код договору:</td>
		<td height="50"><input type="text" name="1"/></td></tr>

		<td height="50">Послуга:</td>
		<td height="50"><textarea name="2" rows="5" cols="25"> </textarea></td></tr>

		<td height="50">Коди заявок:</td>
		<td height="50"><textarea name="3" rows="5" cols="25"> </textarea></tr>

		<td height="50">Код поставника:</td>
		<td height="50"><input type="text" name="4"/></td></tr>
		
		<td height="50">Дата заключення:</td>
		<td height="50"><input type="date" name="5"/></td></tr>
		
		<td height="50">Дата виконання:</td>
		<td height="50"><input type="date" name="6"/></td></tr>
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
$id_cont=strip_tags(trim($_POST['1']));
$service=strip_tags(trim($_POST['2']));
$id_request=strip_tags(trim($_POST['3']));
$id_prov=strip_tags(trim($_POST['4']));
$date_conclusion=strip_tags(trim($_POST['5']));
$date_completion=strip_tags(trim($_POST['6']));



mysql_query("INSERT INTO contracts(id_cont, service, id_request, id_prov, date_conclusion, date_completion) 
VALUES('$id_cont','$service','$id_request','$id_prov','$date_conclusion','$date_completion')");
mysql_close();
header("Refresh:0");
}
?>