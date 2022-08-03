
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng kí </title>
    <link rel="stylesheet" title="style" href="source/assets/dest/css/register.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
<body>
<?php
include './Controller/UsersController.php';
?>
<form  method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
  
    <label for="email"><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="User name" name="username" required>
    <label for="email"><b>Họ & Tên</b></label>
    <input type="text" placeholder="Full name" name="fullname" required>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repassword" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <?php if (count($errors) > 0) : ?>
              <div class="alert alert-danger">
              <?php foreach ($errors as $error) : ?>
              <li>
              <?php echo $error; ?>
              </li>
              <?php endforeach; ?>
              </div>
    <?php endif; ?>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
      <div class="loginn" >
      <button type="submit" class="login" ><a href="login.php" style="text-decoration: none; width: 100%; ">LOGIN</a></button>

      </div>
    </div>
  </div>
</form>

</body>
</html>
