<?php
// xử lí đăng kí
session_start();
include 'config.php';
include 'SendmailController.php';
    $name ='';
    $email ='';
    $fullname ='';
    $password ='';
    $repassword='';
    $errors = [];
    $patern = "([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)s";


if( isset($_POST["submit"]) ){
    $username    = $_POST["username"];
    // $name    = $_POST["name"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $repassword = $_POST["repassword"];
    $token=bin2hex(random_bytes(50));
    
    if(empty($_POST['fullname'])){
        $errors['fullname'] = 'Họ và tên không được để trống';
    }else{
        if(!preg_match($patern,$fullname)){
            $errors['fullname'] = 'Họ và tên không hợp lệ';
        }
    }
    if(empty($_POST['username'])){
        $errors['username'] = 'Tên đăng nhập không được để trống';
    }else{
        if(!preg_match("/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/",$username)){
            $errors['username'] = 'Tên đăng ký không hợp lệ';
        }
    }
    if(empty($_POST['email'])){
        $errors['email'] = 'Email không được để trống';
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email không hợp lệ hoặc đã tồn tại!';
        }
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'Password không được để trống';
    }else{
        if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)){
            $errors['password'] = 'Password không hợp lệ';
        }
    }
    if(empty($_POST['repassword'])){
        $errors['repassword'] = "Repassword không được để trống";
    }else{
        if(isset($_POST['repassword']) && $_POST['password'] !== $_POST['repassword']){
            $errors['repassword'] = 'Repassword không trùng khớp';
        }
    }
    $sql = "SELECT * FROM customers WHERE username='$username'";
    $db = mysqli_query($conn, $sql);
    if (mysqli_num_rows($db)>0)  {
        $errors["username"]= "User tồn tại";
        
    }
    $sql="SELECT * FROM customers where email ='$email' LIMIT 1";
        $result =mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $errors['email'] = "Email đã tồn tại";
        }

    if(count($errors)==0){
            
        $query = "INSERT INTO customers SET fullname=?,username=?, email=?, token=?, password=?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $fullname,$username, $email, $token, $password);
        $result = $stmt->execute();
        
        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();
            $_SESSION['id'] = $user_id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            sendEmail($email,$token);
            $_SESSION['verified'] = $user['verified'];
            header("location:./register.php");
            $errors['email']= "Đã gửi mail xác nhận";
            
        }
    }
}



//login

 /// LOGIN
 if (isset($_POST['submit-login'])) {
     
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($_POST['username'])){
        $errors['username'] = 'Tên đăng nhập không được để trống';
    }else{
        if(!preg_match("/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/",$username)){
            $errors['username'] = 'Tên đăng nhập không hợp lệ';
        }
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'Password không được để trống';
    }else{
        // if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)){
        //     $errors['password'] = 'Password không hợp lệ';
        // }
    }
    if (count($errors) === 0) {
      $query = "SELECT * FROM customers WHERE username=? OR email=?  LIMIT 1";
      $stmt = $conn->prepare($query);
      $stmt->bind_param('ss', $username, $password);
      if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if ($user['verified']===0) {
        $errors['verified'] = 'Vui lòng kích hoạt email';
        }
        else{
            if ($user['role'] === 1) {
                 if (password_verify($password, $user['password'])) { // if password matches
                    $stmt->close();
        
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['message'] = 'You are logged in!';
                    $_SESSION['type'] = 'alert-success';
                    $_SESSION['admin'] = $user['role'];
                    header("location:./admin.php");
                    exit(0);
                } else { // if password does not match
                    $errors['login_fail'] = "Wrong username / password";
                }
            } else {
                if (password_verify($password, $user['password'])) { // if password matches
                    $stmt->close();
        
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['message'] = 'You are logged in!';
                    $_SESSION['type'] = 'alert-success';
                    header("location:./home.php");
                    exit(0);
                } else { // if password does not match
                    $errors['login_fail'] = "Wrong username / password";
                }
            }
        } 
     }
    }
  }

?>