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
<p align="center"><strong>Архивный инвентарный список</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:90%">
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





	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>

        <?php
            $difference = $item['quantity_f'] - $item['quantity'];
            if ($difference > 0) {
                $td_style = 'background-color: #00FF00; color: rgba(0,0,0,0.8); font-size: 14px;';
            } elseif ($difference < 0) {
                $td_style = 'background-color: #ff0000; color: rgba(0,0,0,0.8); font-size: 14px;';
            } else {
                $td_style = '';
            }
        ?>

<tr align="center">
<td><?=$item['id']?></td>
<td><?=$item['group']?></td>
<td><?=$item['description']?></td>
<td><?=$item['units']?></td>
<td><?=$item['quantity']?></td>
<td><?=$item['id_prov']?></td>
<td><?=$item['tare']?></td>
<td><?=$item['price']?></td>
<td><?=$item['reserve']?></td>
<td><?=$item['date']?></td>
<td><?=$item['quantity_f']?></td>
<td style="<?= $td_style ?>"><?= $difference ?></td>


</tr>
<?endforeach;?>
</tbody>
</table border="2">
<div style="margin:0 auto;width:90%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:90%">
	<form style="margin:0">
	<img src="css/icons/first.png" class="first" alt="">
	<img src="css/icons/prev.png" class="prev" alt="">
	<input type="text" class="pagedisplay" alt="">
	<img src="css/icons/next.png" class="next" alt="">
	<img src="css/icons/last.png" class="last" alt="">
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
<br /><br /><br />

	
<br>
