<?php

//формирование строки JSON и её передача серверу

$ch = curl_init();
  if (!empty($_POST['product'])) {
    $product = $_POST['product'];
    $_SESSION['product'] = $product;
    $link = mysqli_connect('localhost', 'root', '', 'db_factory') 
        or die("Ошибка " . mysqli_error($link));
    $sql = "SELECT `".$product."` FROM `sales`";
    $result = mysqli_query($link, $sql);
    //Получение и занесение данных из БД в массив
    $data = [];
    while($row = mysqli_fetch_assoc($result)){

        $data[] = $row[$product]; 
    }
    $dan = implode(',', $data);
    curl_setopt($ch, CURLOPT_URL, 'http://bizprog/api/?json={"danue":['.$dan.']}');
    // Устанавливаем метод передачи данных POST
    curl_setopt($ch, CURLOPT_POST, 1);
    // Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Посылаем запрос и получаем ответ
    $json_string = curl_exec($ch);
    // Завершаем сессию cURL
    curl_close($ch);
    // перед тем как преобразовать строку JSON в объект, убирам вначале и в конце символ ", после этого заменяем символ " на '
    $obj = json_decode(str_replace("'", "\"", trim($json_string, "\"")));
    $kf = $obj->kf;
     $json_prognoz = json_encode($kf);
     $json_danue = json_encode($data);
  }
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
  
      <script src="https://cdn.anychart.com/releases/8.7.0/js/anychart-base.min.js" type="text/javascript"></script>
	</head>
<h1 class="page_h"><?=$name_page?></h1>

<p align="center"><strong>Даны про продажі:</strong></p>

<table cellspacing="1" class="tablesorter" style="margin: 0 auto;width:80%">
<thead>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Хліб "Обідній"</th>
		<th>Хліб "Одеський"</th>
		<th>Хліб "Нарізний"</th>
		<th>Загальні продажі</th>
		<th>Дії</th>
	</tr>
</thead>
<tfoot>
	<tr align="center">
		<th>Номер запису</th>
		<th>Дата</th>
		<th>Хліб "Обідній"</th>
		<th>Хліб "Одеський"</th>
		<th>Хліб "Нарізний"</th>
		<th>Загальні продажі</th>
		<th>Дії</th>
	</tr>
</tfoot>
<tbody>
<?foreach($content as $item):?>

<tr align="center">
<td><?=$item['id']?></td>
<td><?=$item['date']?></td>
<td><?=$item['obidniy']?></td>
<td><?=$item['odeskiy']?></td>
<td><?=$item['nareznoy']?></td>
<td><?=$item['sum']?></td>
<td>
	<a href="lib_modules/delete/delete_sales.php?id=<?php echo $item['id']?>">Видалити</a>
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

    <div class="container" align="center">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-primary mt-5" href="factory/API_1_1" role="button">Вернуться</a>
            </div>
        </div>
      <div class="row">
        <div class="col-sm-9 mt-5">
        <div id="graf" style="width:800px; height:500px;"></div>
        <script>
            var prognoz = <?php echo $json_prognoz;?>;
            var data = <?php echo $json_danue;?>;
            chart = anychart.line();
            var series = chart.line(prognoz);
            series.name("Прогноз");
            series.normal().stroke("#FF8000");
            var series2 = chart.line(data);
            series2.name("Данные");
            series2.normal().stroke("#0080FF");
             chart.legend()
            .enabled(true)
            chart.container("graf");
            chart.draw();

        </script>
        </div>


