<?php

require_once "lib/config.inc.php";
require_once "lib/lib.inc.php";

$name = $_POST["name"];

	 
if(!addCategToCatalog($link,$name)) { 
  echo "Произошла ошибка при добавлении категории в каталог.<br> Заполните поле категория.";

     }
else{ header("Location: add_categ.php"); 
  exit; }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<br>
<br>
<a href="add_categ.php">Вернуться в добавление категории</a>