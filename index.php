<?php
session_start();

//error_reporting(0);
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Content-Type:text/html;charset='utf-8'");
header("Pragma: no-cache");

include_once("lib/conf/config.inc.php");

function __autoload($ClassName)
{
	include_once("lib/$ClassName.inc.php"); 
}

if(!isset($_SESSION['DOSTYP_LEVEL']))
{
	$_SESSION['DOSTYP_LEVEL'] = 0;	
}

$cmd = isset($_GET['page']) ? strip_tags($_GET['page']) : '';
$router = new CRouter($cmd);
$router->Request();
?>