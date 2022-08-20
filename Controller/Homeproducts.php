<?php

   
$conn = mysqli_connect("localhost", "root", "", "users");

    $queryy = " SELECT * FROM products  ";
    $statement = $conn ->query($queryy);

 $output = '';
 foreach($statement as $sp)
 {
 $output .= '
 <div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chitietsp.php?id='.$sp["pro_id"] .'"><img src="source/image/'.$sp['image'] .'" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="height: 40px">'.$sp['pro_name'] .'</p>
											<p class="single-item-price" style="font-size: 17px; height: 30px">
												<span  class="flash">'.number_format($sp['price'],0).' VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
										
											<a class="beta-btn primary" style="margin-bottom: 26px ; " href="detail_product.php?id='.  $sp["pro_id"] .' ">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
 ';
 }
 echo $output;
 
 

 // Add product vào giỏ hàng

 if(isset($_POST["action"]))
 {
  if($_POST["action"] == 'add')
  {
   if(isset($_SESSION["shopping_cart"]))
   {
    $is_available = 0;
    foreach($_SESSION['shopping_cart'] as $keys => $values)
    {
     if($_SESSION['shopping_cart'][$keys]['pro_id'] == $_POST['pro_id'])
     {
      $is_available++;
      $_SESSION['shopping_cart'][$keys]['quantity'] = $_SESSION['shopping_cart'][$keys]['quantity'] + $_POST['quantity'];
     }
    }
 
    if($is_available == 0)
    {
     $item_array = array(
      'pro_id' => $_POST['pro_id'], 
      'pro_name' => $_POST['pro_name'],
      'price' => $_POST['price'],
      'quantity' => $_POST['quantity']
     );
     $_SESSION['shopping_cart'][] = $item_array;
    }
   }
   else
   {
    $item_array = array(
     'pro_id'  => $_POST['pro_id'],
     'pro_name'  => $_POST['pro_name'],
     'price'  => $_POST['price'],
     'quantity' => $_POST['quantity']
    );
 
    $_SESSION['shopping_cart'][] = $item_array;
   }
   var_dump($_SESSION["shopping_cart"]);
    exit();
  }
 //  Update quantity product ở giỏ hàng
  if($_POST['action'] == 'update')
  {
   foreach($_SESSION['shopping_cart'] as $keys => $values)
   {
    if($values['pro_id'] == $_POST['pro_id'])
    {
     $is_available++;
      $_SESSION['shopping_cart'][$keys]['quantity'] = $_SESSION['shopping_cart'][$keys]['quantity'] = $_POST['quantity'];
     
    }
   }
  }
 // Remove product theo id 
  if($_POST['action'] == 'remove')
  {
   foreach($_SESSION['shopping_cart'] as $keys => $values)
   {
    if($values['pro_id'] == $_POST['pro_id'])
    {
     unset($_SESSION['shopping_cart'][$keys]);
    }
   }
  }
 //  clear all product
  if($_POST['action'] == 'empty')
  {
   unset($_SESSION['shopping_cart']);
  }
 }