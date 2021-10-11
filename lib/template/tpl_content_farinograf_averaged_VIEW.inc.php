<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib_modules/calculation/farinograf_calculation.php';
?>
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
<p align="center"><strong>Дані:</strong></p>
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




<br /><p align="center"><strong>Аналітичні дані</strong></p><br />

  <tr>
	<td align="center"><img src="lib_modules/jpgraph/graph_farinograf.php" border="0"></td>
    <td align="center"><img src="lib_modules/jpgraph/graph_farinograf_averaged.php" border="0"></td>
  </tr>
  
  
  <br />
  <br />
  
<?php
// Преобразуем в минуты "Час утворення тіста"
	$m_time_min=$time_min/60;
			$m1_time_min=round($m_time_min);
// Преобразуем в минуты "Час стабільності тіста"
	$m_time_stab=$time_stab/60;
			$m1_time_stab=round($m_time_stab);
// Преобразуем в минуты "Час стійкості тіста"
	$m_time_max=$time_max/60;
			$m1_time_max=round($m_time_max);
			
// Преобразуем в минуты "Час стабільності тіста"
	$m_time_stab_2=$time_stab_2/60;
			$m1_time_stab_2=round($m_time_stab_2);
// Преобразуем в минуты "Час стійкості тіста"
	$m_max_time_2=$max_time_2/60;
			$m1_max_time_2=round($m_max_time_2);
?>

   <form method='post'> 
		  <table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:50%">
			<tr><td colspan="4" height="50"><h3><center><b>Розшифровка фаринограми</b></center></h3></td></tr>
			<tr><td colspan="4" height="50"><center>Оберіть потрібний тип фаринограми</center></td></tr>
			<tr>
				<td height="50"><b>Номер</b></td>
				<td height="50"><b>Тип</b></td>
				<td height="50"><b>Коментар</b></td>
				<td height="50"><b>Обрати</b></td>
			</tr>
			
			<tr>
				<td height="50">1</td>
				<td height="50"><img src="/images/far1.png" width="250" height="150"/></td>
				<td height="50"><justify>На фаринограммі присутні 2 максимума, що може свідчити про 
										наявність сухої клітковини <br>
										(використовуватиметься не стандартний
										алгоритм розрахунку)
								</justify>
				</td>
				<td height="50"><input type="button" value="Обрати 1-й варіант" onclick="disp(document.getElementById('calc1'))" /></td>
			</tr>
			
			<tr>
				<td height="50">2</td>
				<td height="50"><img src="/images/far2.png" width="250" height="150"/></td>
				<td height="50"><justify>Фаринограма має стандартний вигляд<br> 
										(використовуватиметься стандартний
										алгоритм розрахунку)</justify>
				</td>
				<td height="50"><input type="button" value="Обрати 2-й варіант" onclick="disp(document.getElementById('calc2'))" /></td>
			</tr>
			<tr>
				<td height="50">3</td>
				<td height="50"><img src="/images/far3.png" width="250" height="150"/></td>
				<td height="50"><justify>Фаринограмма має не стандартний вигляд (графік не вийшов 
										на значення 500од.ф., присутні різкі спади).</justify>
				</td>
				<td height="50"><input type="button" value="Обрати 3-й варіант" onclick="disp(document.getElementById('calc3'))" /></td>
			</tr>
		  </table>
	</form>
	<br>


   <form method='post' action='' id=calc1 style="display: none;"> 
		  <table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:25%">
			<tr><td colspan="3" height="50"><h3><center><b>Розшифровка фаринограми (варіант 1)</b></center></h3></td></tr>
			<tr>
				<td height="40">Час утворення тіста:</td>
				<td height="40"><?=$time_min?> с.</td>
				<td height="40"><?=$m1_time_min?> хв.</td></tr>

				<td height="40">Час стабільності тіста:</td>
				<td height="40"><?=$time_stab?> с.</td>
				<td height="40"><?=$m1_time_stab?> хв.</td></tr>

				<td height="40">Час стійкості тіста:</td>
				<td height="40"><?=$time_max?> с.</td>
				<td height="40"><?=$m1_time_max?> хв.</td></tr>

				<td height="40">Максимальна величина <br>підняття кривої (значення):</td>
				<td height="40" colspan="2"><?=$t_max?>, FE</td></tr>
				
				<td height="40">Точка спада (значення):</td>
				<td height="40" colspan="2"><?=$t_max?>, FE</td></tr>
				
				<td height="40">Розрідження (Е):</td>
				<td height="40" colspan="2"><?=$e?>, FE</td></tr>
				
				<td height="40">Еластичність, розтяжність (С):</td>
				<td height="40" colspan="2"><?=$с?>, FE</td></tr>
				
				<td height="40">В<sub>ч</sub> (валориметричне число):</td>
				<td height="40" colspan="2"><?=$converted_s?>, см<sup>2</sup></td></tr>
				
				<td height="40">А<sub>пит.</sub> (питома робота)<br>
				(у перерахунку на 120кг. тіста):</td>
				<td height="40" colspan="2"><?=$a?>, кДж/Кг</td></tr>
				
				<td height="40">Оптимальний час замісу тіста<br>
				при <i>обраній</i> інтенсивності:</td>
				<td height="40" colspan="2"><?=$m1_time_max?>, хв</td></tr>
				
			</tr>
			<tr><td colspan="3" height="50"><input type="button" value="Приховати" onclick="disp(document.getElementById('calc1'))" /></td></tr>
		  </table>
		</form>
		
     <form method='post' action='' id=calc2 style="display: none;">
			<table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:25%">
			<tr><td colspan="3" height="50"><h3><center><b>Розшифровка фаринограми (варіант 2)</b></center></h3></td></tr>
			<tr>
				<td height="40">Час утворення тіста:</td>
				<td height="40"><?=$time_min?> с.</td>
				<td height="40"><?=$m1_time_min?> хв.</td></tr>

				<td height="40">Час стабільності тіста:</td>
				<td height="40"><?=$time_stab_2?> с.</td>
				<td height="40"><?=$m1_time_stab_2?> хв.</td></tr>

				<td height="40">Час стійкості тіста:</td>
				<td height="40"><?=$max_time_2?> с.</td>
				<td height="40"><?=$m1_max_time_2?> хв.</td></tr>

				<td height="40">Максимальна величина <br>підняття кривої (значення):</td>
				<td height="40" colspan="2"><?=$t_max?>, FE</td></tr>
				
				<td height="40">Точка спада (значення):</td>
				<td height="40" colspan="2"><?=$max_value_2?>, FE</td></tr>
			
				<td height="40">Розрідження (Е):</td>
				<td height="40" colspan="2"><?=$e?>, FE</td></tr>
				
				<td height="40">Еластичність, розтяжність (С):</td>
				<td height="40" colspan="2"><?=$с?>, FE</td></tr>
				
				
				<td height="40">В<sub>ч</sub> (валориметричне число):</td>
				<td height="40" colspan="2"><?=$converted_s_2?>, см<sup>2</sup></td></tr>
				
				<td height="40">А<sub>пит.</sub> (питома робота)<br>
				(у перерахунку на 120кг. тіста):</td>
				<td height="40" colspan="2"><?=$a_2?>, кДж/Кг</td></tr>
				
				<td height="40">Оптимальний час замісу тіста<br>
				при <i>обраній</i> інтенсивності:</td>
				<td height="40" colspan="2"><?=$m1_max_time_2?>, хв</td></tr>

			</tr>
			<tr><td colspan="3" height="50"><input type="button" value="Приховати" onclick="disp(document.getElementById('calc2'))" /></td></tr>
		  </table>
	</form>
	
      <form method='post' action='' id=calc3 style="display: none;">
			  <table  class="simple-little-table" border="0" align="center" style="margin: 0 auto;width:25%">
				<tr><td colspan="2" height="50"><h3><center><b>Розшифровка фаринограми (варіант 3)</b></center></h3></td></tr>
				<tr><td colspan="2" height="50"><h2><center><b>Пробачте, результати експерименту не правильні! Проведіть дослідження повторно.</b></center></h2></td></tr>
				<tr><td colspan="3" height="50"><input type="button" value="Приховати" onclick="disp(document.getElementById('calc3'))" /></td></tr>
			</table>
	</form>