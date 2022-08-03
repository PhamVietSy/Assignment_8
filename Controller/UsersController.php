<?php
// xử lí đăng kí
session_start();
include 'config.php';
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
    $token=bin2hex(random_bytes(10));
    
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

    if(count($errors)==0){
            
        $query = "INSERT INTO customers SET fullname=?,username=?, email=?, token=?, password=?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $fullname,$username, $email, $token, $password);
        $result = $stmt->execute();
        
        if ($result) {
            $_SESSION['id'] = $user_id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            sendEmail($email,$token);
            $_SESSION['verified'] = $user['verified'];
            header("location:./login.php");
            
        }
    }
}

?>