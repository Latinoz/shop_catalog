<?php
include "config.inc.php";
include "lib.inc.php";


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

     $cheks_categ = $_POST['checkbox1'];
      
	  if (!empty($cheks_categ))  {
	  
      foreach($cheks_categ as $fordelete_categ) {
      		
         
      
      $sql = "delete from category where id='".$fordelete_categ."'";
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
	<title>Категории</title>
</head>
<body>


<table border="1" cellpadding="4" cellspacing="0" width="100%">
<tr>
	<th></th>
	<th>ID</th>
	<th>Категория товара</th>
</tr>


<a href="add_categ.php"><b>Добавить новую категорию</b></a>
<br>
</br>

<form action="" method="post">
  
  <input name="delete" type="submit" id="delete" value="Удалить категорию">
  <br>
  </br>


  
 <?php
 
selectGategs($link,$sql);

?>

</form>
</table>



<br></br>
<a href="catalog_prod.php">Каталог Товаров</a>

</body>
</html>