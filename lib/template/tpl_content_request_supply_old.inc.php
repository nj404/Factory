<script type="text/javascript">
$(document).ready(function()
{
	// Сортируем по цене(2-я колонка, 0 - сортировка по возрастанию, 1 - по убыванию)
	$("table").tablesorter({sortList:[[0,1]], widthFixed:true, widgets:['zebra']});
	// size - количество строк в таблице, по умолчанию
	$("table").tablesorterPager({container:$("#tablesorterPager"), size:5});
});

</script>
	<head>
  <link href="css/add_table.css" rel="stylesheet">
	</head>
<h1 class="page_h"><?=$name_page?></h1>
<p align="center"><strong>Архів заявок на поставку сировини</strong></p>
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
<td><?=$item['price']?></td>
<td><?=$item['date']?></td>
<td><?=$item['date_receiving']?></td>


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
