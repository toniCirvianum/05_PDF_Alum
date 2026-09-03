<?php
session_start();
include ('./model/users.php');
include('./model/products.php');
include('./model/categories.php');
include('./config/config.php');
header("Location: ./views/products.php");

?>