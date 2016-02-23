<?php

include 'config.inc.php';
include 'lib.inc.php';

?>
<?php

      $cheks = $_POST['checkbox0'];
      
	  if (!empty($cheks))  {
	  
      foreach($cheks as $fordelete) {
      		
         
      
      $sql = "delete from product where id='".$fordelete."'";
      $result = mysqli_query($link,$sql) or die(mysqli_error($link));

      }
    
		
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
  
  
 <?php
   selectAllItems($link,$sql);
    
 ?> 
	
  
  
</form>
</table>
</body>
</html>
