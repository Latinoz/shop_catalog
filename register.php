<?php

require_once "lib/config.inc.php";
require_once "lib/lib.inc.php";


registrator($link)


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация пользователя</title>
</head>
<body>

<form method="POST">

Логин: <input name="login" type="text"><br></br>

Пароль: <input name="password" type="password"><br></br>

<input name="submit" type="submit" value="Зарегистрироваться"><br></br>

<a href="login.php">Войти</a>

</form>
<br>
<a href="index.php">Главная страница</a>

</body>
</html>


