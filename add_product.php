<?php

include "config.inc.php";
include "lib.inc.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Форма добавления товара в каталог</title>
</head>
<body>
	<form action="save_product.php" method="post">
		<p>Наименование товара: <input type="text" name="title" size="30">
		
		<p>Категория товара: <select name="catselect">
        <option value="0">Выберите категорию</option>
        <?php
	    $sql = 'SELECT * FROM category';
	
	    $res = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($res)){
	    
        
	 echo "<option value='".$row['ID']."'>".$row['name']."</option>";
    
         }
	?>
     </select>
		
		<p>Вес товара, кг: <input type="text" name="netto" size="5">
		<p><input type="submit" value="Добавить">
	</form>
	
	<br>
	</br>
	
	<a href="catalog_prod.php">Вернуться в каталог</a>
</body>
</html>

