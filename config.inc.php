<?php

const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "catalog";
const ORDERS_LOG = "orders.log";

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if (!$link){
  echo 'Ошибка: '
    . mysqli_connect_errno()
    . ':'
    . mysqli_connect_error();
}

?>
