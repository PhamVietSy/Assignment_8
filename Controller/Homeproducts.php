<?php

   
$conn = mysqli_connect("localhost", "root", "", "users");

    $queryy = " SELECT * FROM products  ";
    $statement = $conn ->query($queryy);


 

 


?>