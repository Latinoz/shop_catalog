<?php

require_once "lib/config.inc.php";
require_once "lib/lib.inc.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = mysqli_query($link,"SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysqli_fetch_assoc($query);


    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))

    {

        setcookie("id", "", time() - 3600*24*30*12);

        setcookie("hash", "", time() - 3600*24*30*12);
        
        print "Хм, что-то не получилось";

    }

 		
}	  
	
 
else

{

    header('Content-type: text/html; charset=utf-8');
	header('Refresh: 3; URL=login.php');
        
		echo "Вы не авторизировались!";
        exit;

}


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
