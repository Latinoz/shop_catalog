<?php

include "lib.inc.php";
include "config.inc.php";

$name = $_POST["name"];


if(!addCategToCatalog($link,$name)){ 
  echo 'Произошла ошибка при добавлении категории в каталог'; }else{ header("Location: add_categ.php"); 
  exit; }

?>
