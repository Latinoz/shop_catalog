<?php
	
function addItemToCatalog($link, $title, $category_id, $netto){            //Функция добавления товара

  $sql = 'INSERT INTO product (title, category_id, netto)
  VALUES (?, ?, ?)';
if (!$stmt = mysqli_prepare($link, $sql)) return false; 
                     mysqli_stmt_bind_param($stmt, "ssd", $title, $category_id, $netto);
                     mysqli_stmt_execute($stmt); 
                     mysqli_stmt_close($stmt); 
                 return true;
                }


function addCategToCatalog($link, $name){              //Функция добавления категории
if (!empty($name)) {

              {
$sql = 'INSERT INTO category (name)
  VALUES (?)';
if (!$stmt = mysqli_prepare($link, $sql)) return false; 
                     mysqli_stmt_bind_param($stmt, "s", $name);
                     mysqli_stmt_execute($stmt); 
                     mysqli_stmt_close($stmt); 
                 return true;
                }

            }

}    


function selectAllItems($link){                        //Функция вывода всех товаров
   $sql = 'SELECT id, title, category_id, netto FROM product';  
   if(!$result = mysqli_query($link, $sql)) 
    return false; 
	     
		 while($row = mysqli_fetch_assoc($result)){
		
		echo "<tr><td>",'<input type="checkbox" name="checkbox0[]" value='.$row['id'].'>',"</td>";
		echo "<td>",$row['id'],"</td>";
		echo "<td>",$row['title'],"</td>";
		echo "<td>",$row['category_id'],"</td>";
		echo "<td>",$row['netto'],"</td></tr>\n";
		
		}
		
	
     }
 
 
function selectGategs($link){                             //Функция вывода всех категорий
  $sql = 'SELECT * FROM category';
	
	if(!$res = mysqli_query($link,$sql))
	return false;
	
        
	    while($row = mysqli_fetch_assoc($res)){
		
		echo "<tr><td>",'<input type="checkbox" name="checkbox1[]" value='.$row['ID'].'>',"</td>";
		echo "<td>",$row['ID'],"</td>";
		echo "<td>",$row['name'],"</td></tr>\n";
		
		}
		
	
     }


function registrator($link) {                //Функция регистрации пользователя (Взято из интернета "редактированно")


if (!empty($_POST["submit"]))

    {
	
	          if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "Логин может состоять только из букв английского алфавита и цифр<br>";

    }

    

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30<br>";

    }
	
			
	$query = "SELECT COUNT(user_id) FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."'";
    
	if ($stmt = mysqli_prepare($link,$query)) {
	                  mysqli_stmt_execute($stmt);
					  mysqli_stmt_bind_result($stmt, $user_id);
					  mysqli_stmt_store_result($stmt);
					  mysqli_stmt_fetch($stmt);
					  mysqli_stmt_close($stmt);

					  }
	
	
	
	if (!$user_id == 0) 
	
	
	
	 
	 
    {

        $err[] = "Пользователь с таким логином уже существует в базе данных<br>";

    }

    

    

    if(count($err) == 0)

    {

        
        $login = $_POST['login'];

        

       

        $password = md5(md5(trim($_POST['password'])));

        

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");

        header("Location: login.php"); exit();

    }

    else

    {

        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }

    }

}


}	 


//Функции для login.php


function login_generation_hash($length = 8)    {                   //Функция для генерации случайной строки в login.php


                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = '';
                for ($i = 0; $i <= $length; $i++) {
                        $code .= $characters[mt_rand (0, strlen ($characters) - 1)];
                }
				
				return $code;
        }

	 
?>
