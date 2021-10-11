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
<p align="center"><strong>Дані фаринограми</strong></p>
<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:50%">
<thead>
	<tr align="center">
		<th>№</th>
		<th>Час, сек.</th>
		<th>Одиниці фаринографа (FE)</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>№</th>
		<th>Час, сек.</th>
		<th>Одиниці фаринографа (FE)</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>
<tr align="center">
<td><?=$item['nomer']?></td>
<td><?=$item['time']?></td>
<td><?=$item['value']?></td>

</tr>
<?endforeach;?>
</tbody>
</table>
<div style="margin:0 auto;width:50%">
<div id="tablesorterPager" class="tablesorterPager" style="margin:0 auto;width:50%">
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

<td width="100px" align="center"><input type="button" value="Обрати файл" class="button01" onclick="disp(document.getElementById('add'))" /></td>
        <form method='post' action='' enctype= 'multipart/form-data' id=add style="display: none;">
			 <table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:25%">
				<tr><td colspan="2" height="50"><h3><center><b>Завантаження файлу</b></center></h3></td></tr>
					<tr>
						<td height="40">Оберіть файл:</td>
						<td height="40"><input type='file' name='filename' /></td></tr>

						<td height="40">Завантажте:</td>
						<td height="40"><input type='submit' value='Завантажити' /></td></tr>	
					</tr>
					<tr>
						<td height="50" colspan="2">
						<?php
						// Файл для додавання данних
						include $_SERVER['DOCUMENT_ROOT'].'/lib_modules/load_file/load.php';
						?> 
						<td>
					</tr>
			  </table>
		</form>

<input type="button" class="button01" onclick="location.href='lib_modules/excel/read_farin_full.php'" value="Завантажити дані">
<input type="button" class="button01" onclick="location.href='lib_modules/delete/delete_all_farinograf.php'" value="Очистити табл.">

<br /><p align="center"><strong>Аналітичні дані</strong></p><br />

  <tr>

    <td align="center"><img src="lib_modules/jpgraph/graph_farinograf.php" border="0"></td>
  </tr>
