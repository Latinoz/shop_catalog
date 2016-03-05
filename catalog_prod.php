<?php

include 'config.inc.php';
include 'lib.inc.php';

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

    else

    {

      $cheks = $_POST['checkbox0'];
      
	  if (!empty($cheks))  {
	  
      foreach($cheks as $fordelete) {
      		
         
      
      $sql = "delete from product where id='".$fordelete."'";
      $result = mysqli_query($link,$sql) or die(mysqli_error($link));

      }
    
		
}	  
	
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
	<title>Каталог</title>
</head>
<body>

<a href="add_product.php"><b>Добавить новый товар</b></a>
<br>
</br>


<table border="1" cellpadding="4" cellspacing="0" width="100%">
<tr>
	<th></th>
	<th>ID</th>
	<th>Наименование товара</th>
	<th><a href="catalog_categ.php">Категория товара</a></th>
	<th>Вес товара, кг</th>
</tr>

  <form action="" method="post">
  
  <input name="delete" type="submit" id="delete" value="Удалить выбранный товар">
  <br>
  </br>
    
   <a href="index.php">Главная страница</a>
  <br>
  </br>
  <a href="logout.php">Выход</a>
  
 <?php
   selectAllItems($link,$sql);
    
 ?> 
	
  
  
</form>
</table>
</body>
</html>
