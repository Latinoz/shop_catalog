<?php

include "config.inc.php";
include "lib.inc.php";


$title = $_POST["title"];
$category_id = $_POST["catselect"];

$netto = str_replace(',','.',$_POST["netto"]);

if(empty($title) || empty($category_id) || empty($netto)) {
echo 'Произошла ошибка при добавлении товара в каталог'; }else{
         addItemToCatalog($link,$title, $category_id, $netto); 
         header("Location: add_product.php");
  exit; }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<br>
<br>
<a href="add_product.php">Вернуться в добавление товара</a>

