<?php
	
function addItemToCatalog($link, $title, $category_id, $netto){
//die($netto);
  $sql = 'INSERT INTO product (title, category_id, netto)
  VALUES (?, ?, ?)';
if (!$stmt = mysqli_prepare($link, $sql)) return false; 
mysqli_stmt_bind_param($stmt, "ssd", $title, $category_id, $netto);
mysqli_stmt_execute($stmt); 
mysqli_stmt_close($stmt); 
return true;
}


function addCategToCatalog($link, $name){
$sql = 'INSERT INTO category (name)
  VALUES (?)';
if (!$stmt = mysqli_prepare($link, $sql)) return false; 
mysqli_stmt_bind_param($stmt, "s", $name);
mysqli_stmt_execute($stmt); 
mysqli_stmt_close($stmt); 
return true;
}


function selectAllItems($link){
  $sql = 'SELECT id, title, category_id, netto FROM product';
  if(!$result = mysqli_query($link, $sql)) 
    return false; 
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 
  mysqli_free_result($result); 
  return $items;
}




?>
