<?php
session_start();

$login = isset($_POST['Login']) ? $_POST["Login"] : "";
$password = isset($_POST['Password']) ? $_POST["Password"] : "";

$db = CMySQL::Instance(); // инициализация подключения к БД
$result = $db->Select("SELECT * FROM users WHERE login = '".$login."' AND password = '".$password."' "); // запрос на получение всех строк с табл. в БД
//$db->Delete("users","id_user = 3"); // Удаление строчки из БД
if($result != null)
{
  $_SESSION['DOSTYP_LEVEL'] = $result[0]['rights'];
  header('Location: index.php'); exit;
  
}
?>

<!DOCTYPE html>
<html>
<head>
<base href="<?=BASE_URL?>" />
<title><?=$title;?></title>
<meta name="copyright" content="Copyright (c) 2018-<?=date("Y")?> by VP">
<meta name="author" content="DemonFox">
<meta name="generator" content="FoxWorld">
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
<img src="/images/logo.png" border="0" width="90" height="90" align="middle" alt="">
</header>
<hr /><br />
</div>
<div>
 <section>
  <form action = 'tpl_content_authorization.inc.php' method = 'post'>
 
  <h1>Авторизация</h1>
    <div>
     <input type='text' name='Login' placeholder="Login" required=''/>
    </div>
    <div>
     <input type='password' name='Password' placeholder="Password" required=''/>
    </div>
    <div>
      <input type='submit' value='Войти'/>
    </div>
   </form>
 </section>
</div>
</body>
</html>