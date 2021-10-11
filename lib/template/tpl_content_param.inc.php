<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:5});
});
</script>
<h1 class="page_h"><?=$name_page?></h1>
<p align="center"><strong>Техніко-економічні параметри ТП</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>N</th>
		<th>Параметр</th>
		<th>Значення</th>
		<th>Дата</th>
		<th>Час</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>N</th>
		<th>Параметр</th>
		<th>Значення</th>
		<th>Дата</th>
		<th>Час</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['ID']?></td>
<td><?=$item['Name']?></td>
<td><?=$item['Parameter']?></td>
<td><?=$item['Dates']?></td>
<td><?=$item['Times']?></td>


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

<br /><br>
		<input type="button" class="button01" onclick="location.href='lib_modules/delete/delete_all_param.php'" value="Видалити дані">
<br /><p align="center"><strong>Аналітичні дані</strong></p><br />

  <tr>

    <td align="center"><img src="lib_modules/jpgraph/graph_data.php" border="0"></td>
  </tr>
  

