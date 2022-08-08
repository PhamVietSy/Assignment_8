<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/logincss.css">  
    <title>Login</title>
    
</head>
<body>
<?php
    include './Controller/UsersController.php';
    
?>
 <?php if (count($errors) > 0) : ?>
              <div class="alert alert-danger">
              <?php foreach ($errors as $error) : ?>
              <li>
              <?php echo $error; ?>
              </li>
              <?php endforeach; ?>
              </div>
<?php endif; ?>
    <form  method="POST">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" name="submit-login">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1; position: relative;">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="button"  class="cancelbtnn" style=" margin: 0;position: absolute;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"><a style="text-decoration: none;" href="register.php">SIGNUP</a></button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>
</html>