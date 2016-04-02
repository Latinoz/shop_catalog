<?php

require_once "lib/config.inc.php";
require_once "lib/lib.inc.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = mysqli_query($link,"SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysqli_fetch_assoc($query);


      if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
	  
    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "Хм, что-то не получилось";

    }

    else

    {

    echo "Test passed!";   
		
		
    }

}

else

{
    
	
		header('Content-type: text/html; charset=utf-8');
		header('Refresh: 2; URL=login.php');
        
		echo "Авторизируйтесь или Включите cookie!";
        exit;

    

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Тест</title>
</head>
<body>

</body>
</html>