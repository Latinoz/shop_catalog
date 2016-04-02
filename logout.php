<?php

require_once "lib/config.inc.php";
require_once "lib/lib.inc.php";

     if  (!empty($_COOKIE['hash']) or ($_COOKIE['id'])) 
	 { 

         setcookie("id", "", time() - 3600);

         setcookie("hash", "", time() - 3600);
		 
		 header('Content-type: text/html; charset=utf-8');
	     header('Refresh: 2; URL=index.php');
        
		echo "Вы вышли!";
        exit;
		 
		 }
		 
	else {

         echo "Ошибка";

            }			

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Выход</title>
</head>
</html>