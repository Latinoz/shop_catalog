<?php

include 'config.inc.php';
include 'lib.inc.php';


login_generation_hash($code);      //Функция для генерации случайной строки


if(!empty($_POST['submit']))

{

    //Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");

    $data = mysqli_fetch_assoc($query);

    

    //Соавниваем пароли

    if($data['user_password'] === md5(md5($_POST['password'])))

    {

        //Генерируем случайное число и шифруем его

        $hash = md5(login_generation_hash(10));

            

        
        //Записываем в БД новый хеш авторизации и IP

        mysqli_query($link,"UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        

        //Ставим куки

        setcookie("id", $data['user_id'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);

        

        //Переадресовываем браузер на страницу проверки нашего скрипта

        header("Location: check.php"); exit();

    }

    else

    {

        print "Вы ввели неправильный логин/пароль<br></br>";

    }

}

?>

		 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Аутентификация пользователя</title>
</head>
<body>

<form method="POST">

Логин: <input name="login" type="text"><br></br>

Пароль: <input name="password" type="password"><br></br>

<input name="submit" type="submit" value="Войти">

<a href="register.php">Зарегистрироваться</a>

</form>

</body>
</html>
