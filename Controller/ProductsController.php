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

    $query_brand = "SELECT * FROM brands ";
    $brand = mysqli_query($conn, $query_brand );
   
    while($rows = mysqli_fetch_array($query)){
       $pro[]= $rows['pro_name'];
   } 
    while($rows = mysqli_fetch_array($query1)){
        
       $pro1[]= $rows['brand_name'];
   } 
   while($rows = mysqli_fetch_array($query2)){
        
    $pro2[]= $rows['fullname'];
    }  
    while($rows = mysqli_fetch_array($query3)){
        
    $pro3[]= $rows['content'];
    } 
    count($pro3);
    count($pro);
    count($pro1);
    count($pro2);
   


    
   session_start();
   
   $conn = mysqli_connect("localhost", "root", "", "users");
   
       $query = " SELECT * FROM products  ";
       $statement = $conn ->query($query);
   
    $output = '';
    foreach($statement as $row)
    {
    $output .= '
    <div class="col-md-3" style="margin-top:12px;">  
                <div class=" p-5 shadow p-3 mb-5 bg-body rounded-3 overflow-hidden ">
                    <a href="./cart.php?id='.$row["id"].'"><img src="../../../Assets/img/'.$row["image"].'" class="img-thumbnail w-100%" /></a>
                    <div class ="text-center">
                    <h4 class="fs-5">'.$row["name"].'</h4>
                    <h4 class="fs-5">$ '.$row["price"].'</h4>
                    <input type="hidden" name="quantity" id="quantity'.$row["id"].'" class="form-control" value="1" />
                    <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
                    <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
                    <input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
                    </div>
                
                </div>
            </div>
    ';
    }
    echo $output;
    }
   
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
        if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id'])
        {
         $is_available++;
         $_SESSION['shopping_cart'][$keys]['product_quantity'] = $_SESSION['shopping_cart'][$keys]['product_quantity'] + $_POST['product_quantity'];
        }
       }
    
       if($is_available == 0)
       {
        $item_array = array(
         'product_id' => $_POST['product_id'], 
         'product_name' => $_POST['product_name'],
         'product_price' => $_POST['product_price'],
         'product_quantity' => $_POST['product_quantity']
        );
        $_SESSION['shopping_cart'][] = $item_array;
       }
      }
      else
      {
       $item_array = array(
        'product_id'  => $_POST['product_id'],
        'product_name'  => $_POST['product_name'],
        'product_price'  => $_POST['product_price'],
        'product_quantity' => $_POST['product_quantity']
       );
    
       $_SESSION['shopping_cart'][] = $item_array;
      }
     }
    //  Update quantity product ở giỏ hàng
     if($_POST['action'] == 'update')
     {
      foreach($_SESSION['shopping_cart'] as $keys => $values)
      {
       if($values['product_id'] == $_POST['product_id'])
       {
        $is_available++;
         $_SESSION['shopping_cart'][$keys]['product_quantity'] = $_SESSION['shopping_cart'][$keys]['product_quantity'] = $_POST['product_quantity'];
        
       }
      }
     }
    // Remove product theo id 
     if($_POST['action'] == 'remove')
     {
      foreach($_SESSION['shopping_cart'] as $keys => $values)
      {
       if($values['product_id'] == $_POST['product_id'])
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
    

?>
