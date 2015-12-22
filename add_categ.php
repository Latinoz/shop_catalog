<?php

include 'config.inc.php';
include 'lib.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Форма добавления категории в каталог</title>
</head>
<body>
	<form action="save_categ.php" method="post">
		<p>Добавить категорию товара: <input type="text" name="name" size="30">
		<p><input type="submit" value="Добавить">
	</form>
	<br>
 
 	<a href="catalog_prod.php">Вернуться в каталог</a>
</body>
</html>
