<?php
require_once 'app/init.php';

$validate = new Validate();
$user = new User();

if(Input::exists()){
    $validate->requirements(array(
        'name' => Input::get('name'),
        'username' => Input::get('username'),
        'password' => Input::get('password'),
        'password_again' => Input::get('password_again'),
    ));
    if(!$validate->errorExists()){
        try{
            $user->register('name', 'username', 'password');
            header('Location: http://localhost/ShoppingCart/');

        }catch(Exception $e){
            $e->getMessage();
        }
    }
}

require 'app/parts/header.php'; ?>
   
    <div class="register_form">
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo Input::get('name'); ?>"><span><?php echo $validate->error('name'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo Input::get('username'); ?>"><span><?php echo $validate->error('username'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off"><span><?php echo $validate->error('password'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="password_again">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Enter password again" autocomplete="off"><span><?php echo $validate->error('password_again'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="register">register</button>
                </div>
            </div>
        </form>
    </div>

<?php require 'app/parts/footer.php'; ?>