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
<img src="/images/logo.png" border="0" width="152" height="150" align="left" alt="">
<h1><strong>Название сайта</strong></h1>
</header>
<hr />
<menu>
<ul id="navbar">
	<li><a href="/">Главная</a></li>
	<li><a href="/product">Товар</a></li>
	
	<li><a href="/avalible_raw">Доступное сырье</a></li>
	<li><a href="/coming_raw">Приход сырья</a></li>
	<li><a href="/invnt">Инвентаризация</a></li>
	<li><a href="/quality">Качественные показатели муки</a></li>
	
	<li><a href="/web_cam">Видеонаблюдение</a></li>
	
	<li><a href="/contracts">Договоры</a></li>
	<li><a href="/offers">Предложения</a></li>
	<li><a href="/providers">Поставщики</a></li>
	<li><a href="/request_supply">Заявки на поставку</a></li>
	<li><a href="/request_param">ТЭ парам.</a></li>
	
	<li><a href="/neural_network">Нейронна мережа</a></li>
	
	<li><a href="#">Контакты</a></li>
	<li><a href="#">О нас</a></li>
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