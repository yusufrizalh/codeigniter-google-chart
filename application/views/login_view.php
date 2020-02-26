<?php
    if(isset($this->session->userdata['logged_in'])) {
        header("location: user_authentication/user_login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php 
        if(isset($pesan)) {
            echo $pesan;
        }
    ?>
    <h3>Form Login</h3>
    <hr>
    <?php echo form_open('user_authentication/user_login'); ?>
    <?php 
        if(isset($pesan_error)) {
            echo $pesan_error;
        }
        echo validation_errors();
    ?>

    <label for="user_name">Username</label>
    <input type="text" name="user_name" placeholder="Username here"> <br> <br>
    <label for="user_password">Password</label>
    <input type="password" name="user_password" placeholder="Password here"><br> <br>
    <input type="submit" value="Login" name="submit"> <br> <br> 

    <?php echo form_close(); ?>
</body>
</html>