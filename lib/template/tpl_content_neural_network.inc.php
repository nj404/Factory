<?php
//nclude $_SERVER['DOCUMENT_ROOT'].'/lib_modules/calculation/farinograf_calculation.php';
//include $_SERVER['DOCUMENT_ROOT'].'/lib_modules/fann/powder_float.net';

$nn = $_SERVER['DOCUMENT_ROOT'].'/lib_modules/fann/powder_float.net';

//ЧАСТЬ КОДА ДЛЯ НЕЙРОННОЙ СЕТИ
if(isset($_POST['senddata']))
{
$p1=strip_tags(trim($_POST['1']));
$p2=strip_tags(trim($_POST['2']));
$p3=strip_tags(trim($_POST['3']));
$p4=strip_tags(trim($_POST['4']));
$p5=strip_tags(trim($_POST['5']));
$p6=strip_tags(trim($_POST['6']));
$p7=strip_tags(trim($_POST['7']));
}

//$sea_file = (dirname(__FILE__) . $nn);
//$sea_file = (dirname(__FILE__) . "/powder_float.net");
$sea_file = ($_SERVER['DOCUMENT_ROOT'].'/lib_modules/fann/powder_float.net');

if (!is_file($sea_file))
    die("Файл powder_float.net не был создан! Перезапустите главный файл, чтобы его создать");

$ann = fann_create_from_file($sea_file);
if (!$ann)
    die("ANN не была создана");
 
$input = array($p1, $p2, $p3, $p4, $p5, $p6, $p7);
$calc_out = fann_run($ann, $input);

$nomer_prog = round (($calc_out[0] * 100), 1);
$speed1     = round ($calc_out[1] * 1000);
$speed2     = round ($calc_out[2] * 1000);
 
fann_destroy($ann);

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

<p align="center"><strong>Дані попередніх замісів:</strong></p>

<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Номер запису</th>
		<th>Вхідні дані</th>
		<th>Перша швидкість зам. (сформ.)</th>
		<th>Друга швидкість зам. (сформ.)</th>
		<th>Перша швидкість зам. (факт.)</th>
		<th>Друга швидкість зам. (факт.)</th>
		<th>Помилка 1</th>
		<th>Помилка 2</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Номер запису</th>
		<th>Вхідні дані</th>
		<th>Перша швидкість зам. (сформ.)</th>
		<th>Друга швидкість зам. (сформ.)</th>
		<th>Перша швидкість зам. (факт.)</th>
		<th>Друга швидкість зам. (факт.)</th>
		<th>Помилка 1</th>
		<th>Помилка 2</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>

<?php
			$error_1 = floor( ($item['speed_1_formed'] - $item['speed_1_actual']) / ($item['speed_1_formed'] / 100) );
				if ($error_1 > 4) {
					$td_style_1 = 'background-color: #00FF00; color: rgba(0,0,0,0.8); font-size: 14px;';
				} elseif ($error_1 < 0) {
					$td_style_1 = 'background-color: #ff0000; color: #FFFFFF; font-size: 14px;';
				} else {
					$td_style_1 = '';
				}
			
			
			$error_2 = floor( ($item['speed_2_formed'] - $item['speed_2_actual']) / ($item['speed_2_formed'] / 100) );
				if ($error_2 > 4) {
					$td_style_2 = 'background-color: #00FF00; color: rgba(0,0,0,0.8); font-size: 14px;';
				} elseif ($error_2 < 0) {
					$td_style_2 = 'background-color: #ff0000; color: #FFFFFF; font-size: 14px;';
				} else {
					$td_style_2 = '';
				}
 ?>
 

<tr align="center">
<td><?=$item['id']?></td>
<td><?=$item['input_data']?></td>
<td><?=$item['speed_1_formed']?></td>
<td><?=$item['speed_2_formed']?></td>
<td><?=$item['speed_1_actual']?></td>
<td><?=$item['speed_2_actual']?></td>
<td style="<?= $td_style_1 ?>"><?= $error_1 ?>%</td>
<td style="<?= $td_style_2 ?>"><?= $error_2 ?>%</td>
<td>
	<a href="lib_modules/delete/delete_mixing_programs.php?id=<?php echo $item['id']?>">Видалити</a>
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


<!-- тут нужно прописать путь к кнопке !!! ДЛЯ ДОБАВЛЕНИЯ В ТАБЛИЦУ -->
<td width="100px" align="center"><input type="button" value="Додати запис" class="button01" onclick="disp(document.getElementById('add'))" /></td>
<form method="post" name="1" id=add style="display: none;">
<table  class="simple-little-table" border="1" align="center" style="margin: 0 auto;width:30%">
<tr>
<td colspan="2" height="50"><h3><center><b>Результати замісу:</b></center></h3></td>
</tr>
	<tr>
		<td height="50">Вхідні дані:</td>
		<td height="50"><input type="text" name="1"/></td></tr>
		
		<td height="50">1а швидкість (сформ.):</td>
		<td height="50"><input type="text" name="2"/></td></tr>

		<td height="50">2а швидкість (сформ.):</td>
		<td height="50"><input type="text" name="3"/></td></tr>
		
		<td height="50">1а швидкість (факт.):</td>
		<td height="50"><input type="text" name="4"/></td></tr>
		
		<td height="50">2а швидкість (факт.):</td>
		<td height="50"><input type="text" name="5"/></td></tr>
	</tr>		
		<tr>
		<td height="50" colspan="2">
		<input class="button01" type="submit" name="dz11" value="Додати" />	
		<td>
	</tr>
</table>
</form>


<td width="100px" align="center"><input type="button" value="Завантажити файл" class="button01" onclick="disp(document.getElementById('add2'))" /></td>
        <form method='post' action='' enctype= 'multipart/form-data' id=add2 style="display: none;">
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

<input type="button" class="button01" onclick="location.href='lib_modules/fann/powder_train.php'" target="_blank" value="Корекція НМ">

  
  <br />
  <br />
  
  

<table border="0" align="center" style="margin: 0 auto;width:65%">
<tr><td>
<form method="post" name="1" id=add1>
<table class="simple-little-table" border="1">
	<tr>
	<td colspan="2" height="50"><h3><center><b>Визначити параметри замісу:</b></center></h3></td>
	</tr>


		<tr><td>Час утворення тіста:</td>
		<td>			
			<select name="1" size="1" >
						<option selected value="0.1166">116,6</option>
						<option value="0.1200">120,0</option>
						<option value="0.0857">85,7</option>
						<option value="0.0891">89,1</option>
						<option value="0.0926">92,6</option>
						<option value="0.0926">92,6</option>
			</select></td></tr>

		<tr><td>Час стабільності тіста:</td>
		<td>			
			<select name="2" size="1" >
						<option selected value="0.4375">437,5</option>
						<option value="0.4813">481,3</option>
						<option value="0.4375">437,5</option>
						<option value="0.4594">459,4</option>
						<option value="0.5469">546,9</option>
						<option value="0.5250">525,0</option>
			</select></td></tr>
			
		<tr><td>Розрідження:</td>
		<td>			
			<select name="3" size="1" >
						<option selected value="0.758">75,8</option>
						<option value="0.800">80,0</option>
						<option value="0.632">63,2</option>
						<option value="0.660">66,0</option>
						<option value="0.730">73,0</option>
						<option value="0.716">71,6</option>
			</select></td></tr>
		
		<tr><td>Питома робота:</td>
		<td>			
			<select name="4" size="1" >
						<option selected value="0.474">47,4</option>
						<option value="0.500">50,0</option>
						<option value="0.395">39,5</option>
						<option value="0.412">41,2</option>
						<option value="0.456">45,6</option>
						<option value="0.447">44,7</option>
			</select></td></tr>
		
		<tr><td>К-ть клейковини:</td>
		<td>			
			<select name="5" size="1" >
						<option selected value="0.247">24,7</option>
						<option value="0.266">26,6</option>
						<option value="0.250">25,0</option>
						<option value="0.240">24,0</option>
						<option value="0.270">27,0</option>
						<option value="0.260">26,0</option>
			</select></td></tr>
			
		<tr><td>ВДК:</td>
		<td>			
			<select name="6" size="1" >
						<option selected value="0.800">80,0</option>
						<option value="0.803">80,3</option>
						<option value="0.663">66,3</option>
						<option value="0.679">67,9</option>
						<option value="0.694">69,4</option>
						<option value="0.698">69,8</option>
			</select></td></tr>
			
		<tr><td>Число падіння:</td>
		<td>			
			<select name="7" size="1" >
						<option selected value="0.3646">364,6</option>
						<option value="0.3653">365,3</option>
						<option value="0.3687">368,7</option>
						<option value="0.3971">397,1</option>
						<option value="0.3986">398,6</option>
						<option value="0.3988">398,8</option>
			</select></td></tr>
			
	<tr>
		<td height="50">
		<!-- ПРОПИСАТЬ НОВЫЕ ПИТИ ДЛЯ КНОПОК -->
		<input type="button" onclick="location.href='lib_modules/fann/powder_train.php'" target="_blank" value="Сформувати НМ" />
		</td>
		<td height="50">
		<input type="submit" name="senddata" value="Отримати результат" />	
		</td>
	</tr>

</table>
</form>
</td>

<td>
	<table class="simple-little-table" border="1" align="center">
			<tr>
			<td colspan="2" height="50"><h3><center><b>Сформовані параметри програми:</b></center></h3></td>
			</tr>
			
			<tr>
			<td>Номер програми</td>
			<td><?=$nomer_prog?></td>
			</tr>
			
			<tr>
			<td>Час замісу на 1й швидкості</td>
			<td><?=$speed1?> с.</td>
			</tr>
			
			<tr>
			<td>Час замісу на 2й швидкості</td>
			<td><?=$speed2?> с.</td>
			</tr>
			
	</table>
</td></tr>

</table>


<?php
// Подключаем БД
include 'old_connection.php';
if(isset($_POST['dz11']))
{
$input_data=strip_tags(trim($_POST['1']));
$speed_1_formed=strip_tags(trim($_POST['2']));
$speed_2_formed=strip_tags(trim($_POST['3']));
$speed_1_actual=strip_tags(trim($_POST['4']));
$speed_2_actual=strip_tags(trim($_POST['5']));

mysql_query("INSERT INTO `mixing_programs` (`input_data`, `speed_1_formed`, `speed_2_formed`, `speed_1_actual`, `speed_2_actual`) 
VALUES ('$input_data', '$speed_1_formed', '$speed_2_formed', '$speed_1_actual', '$speed_2_actual');");
mysql_close();
header("Refresh:0");
}
?>