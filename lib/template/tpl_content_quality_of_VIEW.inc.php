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
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
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


<br /><br /><p align="center"><strong>Аналітичні дані</strong></p><br />

  <tr>
  <td align="center"><img src="lib_modules/jpgraph/graph_quality_of_idk.php" border="0"></td>
  <td align="center"><img src="lib_modules/jpgraph/graph_quality_of_fell_number.php" border="0"></td>
  </tr>
  <br>

