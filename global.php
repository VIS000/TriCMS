<?php
//Include all files in inc

foreach(glob('inc/*.php') as $file)
{
	include_once $file;
}

$Core = new Core($CONFIG);
$tpl = new Template($CONFIG);
$Habbo = new Habbo($CONFIG);
?>