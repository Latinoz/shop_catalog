<?php

include "lib.inc.php";
include "config.inc.php";


$title = $_POST["title"];
$category_id = $_POST["catselect"];

$netto = str_replace(',','.',$_POST["netto"]);

if(!addItemToCatalog($link,$title, $category_id, $netto)){ 
  echo 'Произошла ошибка при добавлении товара в каталог'; }else{ header("Location: add_product.php"); 
  exit; }

?>

