<?php require_once 'app/init.php';require 'app/parts/header.php'; ?>

<?php
$validate = new Validate();
$user = new User();
if(Input::exists()){
    $login = $user->login('username', 'password');
    try{
        if($login){
            if(Cookie::exists('cookie_name')){
                $cart = new Cart();
                $cart->update();
                Cookie::delete('cookie_name');
            }

            header('Location: http://localhost/ShoppingCart/');
        }
    }catch(Exception $e){
        $e->getMessage();
    }
}
?>

<div class="login_form">
    <form method="post" class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo Input::get('username'); ?>"><span><?php echo $user->error(0); ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off" <?php echo $user->error(0); ?>><span><?php echo $user->error(1); ?></span>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="login">Login</button>
            </div>
        </div>
    </form>
</div>

<?php require 'app/parts/footer.php'; ?>