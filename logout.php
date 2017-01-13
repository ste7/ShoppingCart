<?php
require_once 'app/init.php';

$user = new User();
$user->logOut();
header('Location: http://localhost/ShoppingCart/');