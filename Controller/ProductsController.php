<?php
   
    include 'config.php';
    $sql4 = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query4 = $conn->query($sql4);
    $sql = "SELECT * FROM products";
    $query = $conn->query($sql);
    $sql1 ="SELECT * FROM brands";
    $query1 =$conn->query($sql1);
    $sql2 ="SELECT * FROM customers";
    $query2 =$conn->query($sql2);
    $sql3 ="SELECT * FROM comments";
    $query3 =$conn->query($sql3);
   
    while($rows = mysqli_fetch_array($query)){
       $pro[]= $rows['pro_name'];
   } 
    while($rows = mysqli_fetch_array($query1)){
        
       $pro1[]= $rows['brand_name'];
   } 
   while($rows = mysqli_fetch_array($query2)){
        
    $pro2[]= $rows['fullname'];
}  while($rows = mysqli_fetch_array($query3)){
        
    $pro3[]= $rows['content'];
} 
    count($pro3);
    count($pro);
    count($pro1);
    count($pro2);
 
?>