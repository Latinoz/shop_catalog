<?php
include "config.inc.php";
include "lib.inc.php";
?>

<?php

      $cheks_categ = $_POST['checkbox1'];
      
	  if (!empty($cheks_categ))  {
	  
      foreach($cheks_categ as $fordelete_categ) {
      		
         
      
      $sql = "delete from category where id='".$fordelete_categ."'";
      $result = mysqli_query($link,$sql) or die(mysqli_error($link));

      }
    
		
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
