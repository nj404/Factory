<!DOCTYPE html>
<html>
<head>
<base href="<?=BASE_URL?>" />
<title><?=$title;?></title>
<meta name="copyright" content="Copyright (c) 2017-<?=date("Y")?> by ONAFT">
<meta name="author" content="Dets Dmitry">
<meta name="generator" content="DeCo IT">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$keywords;?>">
<meta name="description" content="<?=$description;?>">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?foreach($styles as $style):?>
<link rel="stylesheet" type="text/css" media="screen" href="/<?=DIR_CSS.$style?>.css" />
<?endforeach;?>
</head>
<body>
<div class="wrapper">
<header class="header">

<br>
<br>
<strong>Автоматизована система логістичної підготовки сировини</strong>
<br>
<strong>Користувач: начальник відділу закупок, Онищенко Олександр.</strong>
<form class="exit" action = 'exit.php' method = 'post'>
	<input class="button01"  align="left" name = 'Выйти из учетной записи' type='submit' value = 'Вихід'/>
</form>
</header>
<hr />
<menu>
<ul id="navbar" >
	<li><a class="a1" href="/" >Головна</a></li>

	<li><a class="a1" href="/contracts">Договори</a>
		<ul>
			<li><a class="a1" href="/contracts">Договори</a></li>
			<li><a class="a1" href="/contracts_old">Архів договорів</a></li>
		</ul>
	</li>
	<li><a class="a1" href="/providers">Довідник поставників</a></li>
	<li><a class="a1" href="/request_supply">Заявки</a>
		<ul>
			<li><a class="a1" href="/request_supply">Заявки на поставку</a></li>
			<li><a class="a1" href="/request_supply_old">Архів заявок</a></li>
		</ul>
	</li>
	<li><a class="a1" href="/quality_of_VIEW">Якісні показники борошна</a></li>
	<li><a class="a1" href="/avalible_raw_VIEW">Доступна сировина</a></li>
				<li><a class="a1" href="/API_1_1">API 1.1 Прогрозування</a></li>
				<li><a class="a1" href="/API_1_2">API 1.2 Прогрозування</a></li>

	

</ul>
</menu>
<?foreach($scripts as $script):?>
<script type="text/javascript" src="/<?=DIR_JS.$script?>.js"></script>
<?endforeach;?>
<hr />
<article>
<?=$content?>

</article>
<hr /><br />
<footer>
<div class="copyright">Copyright &copy; 2017-<?=date("Y")?> by NONAME&nbsp;<a class="At" href="">WebMaster</a></div>
</footer>
</div>
</body>
</html>