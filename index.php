<?php
$current_page_uri = $_SERVER['REQUEST_URI'];
$part_url = explode("/", $current_page_uri);
//$page_name = end($part_url);
$siteurl="http://localhost/vs/badhaidilse/bdsn - Copy/";
echo '<base href="'.$siteurl.'">';
if(isset($_GET['l1']))
{
	$page_name = $_GET['l1'];
}
else
{
	$page_name = "";
}
if(isset($_GET['Cat']))
{
	$_GET['Cat']=str_replace("-"," ", $_GET['Cat']);
	$spage_name = str_replace("-"," ", $_GET['Cat']);
}
else
{
	$spage_name = "";
}
if(isset($_GET['l3']))
{
	$sspage_name = $_GET['l3'];
}
else
{
	$sspage_name = "";
}

if ($page_name=='') {
	include 'login.php';
	}
elseif ($page_name=='home') {
	include 'home.php';
	}
elseif ($page_name=='Greetings' || $page_name=='greetings' ) {
	include 'greetings.php';
	}
elseif (($page_name=='Greetings' || $page_name=='greetings' ) && $spage_name!='') {
	//$_GET['Cat']=$spage_name;
	include 'greetings.php';
	}
else
	{
		print_r($_GET);
		include 'login.php';
	}
?>