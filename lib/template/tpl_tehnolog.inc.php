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
<strong>Користувач: головний технолог, Кравченко Едуард.</strong>
<form class="exit" action = 'exit.php' method = 'post'>
	<input class="button01"  align="left" name = 'Выйти из учетной записи' type='submit' value = 'Вийти'/>
</form>
</header>
<hr />
<menu>
<ul id="navbar">
	<li><a class="a1" href="/">Головна</a></li>

	<li><a class="a1" href="/quality_of_VIEW">Якісні показники борошна</a></li>
	<li><a class="a1" href="/param">ТЕ параметри</a></li>
	<li><a class="a1" href="/neural_network">Нейронна мережа</a></li>
	<li><a class="a1" href="/farinograf_VIEW">Фаринограма</a>
			<ul>
				<li><a class="a1" href="/farinograf_averaged_VIEW">Обробка фаринограми</a>
			</ul>
	</li>
	
	<li><a class="a1" href="/web_cam">Відеонагляд</a>
			<ul>
				<li><a class="a1" href="/web_cam">IP камера</a></li>
			</ul>
	</li>
	
	

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