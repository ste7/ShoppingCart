<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . "app/css/style.css" ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo APP_URL . "app/font-awesome/css/font-awesome.min.css" ?>">
    <title><?php echo url(); ?></title>
</head>
<body>

<?php
ob_start(); 
$user = new User();
$cart = new Cart();
?>

<header>
    <div class="header-center">
        <a class="head-btn <?php echo (url() == 'ShoppingCart') ? 'active' : ''; ?>" href="http://localhost/ShoppingCart/">Home</a>

        <ul>
            <li class="crt">
                <a class="cc" href="#"><i id="drop" class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>

               <div class="for">
                   <div class="cart-drop"></div>
               </div>

            </li>
            <?php if(!$user->isLogged()): ?>
                <li class="head-btn <?php echo (url() == 'Login') ? 'active' : ''; ?>" id="login"><a href="login.php">Login</a></li>
                <li class="head-btn <?php echo (url() == 'Register') ? 'active' : ''; ?>" id="register"><a href="register.php">Register</a></li>
            <?php else: ?>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>


<div class="wrapper">