<?php
    session_start();
function detail_product(){
    $conn = mysqli_connect("localhost", "root", "", "users");
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = " SELECT * FROM products WHERE pro_id=$id ";
      $statement = $conn ->query($query);

     
    
      $output = '';
      foreach($statement as $sp)
      {
      $output .= '
      <div class="row" style="height: 340px ;">
      <div class="col-sm-4">
         <?php  foreach($sql_pro as $sp): ?>
          <img src="source/image/'.$sp['image'].'" alt="">
      </div>
      <div class="col-sm-8">
          <div class="single-item-body">
              <p class="single-item-title"><h2>'.$sp['pro_name'] .'</h2></p>
         </br>
                 <p class="single-item-price">
                  <label >Tồn kho :</label>'.$sp['quantity'] .'
              </p>
         </br>
              <p class="single-item-price">
                  <span class="flash-sale">'.number_format($sp['price'],0).' VNĐ</span>       
              </p>
          </div>

          <div class="clearfix"></div>
          <div class="space20">&nbsp;</div>
          <div class="single-item-options">
        
          <input type="number" size = "4"  name="quantity" id="quantity'.$sp["pro_id"].'" class="form-control" value="1" style="max-width: 100px ; margin-bottom: 20px;" />
          <div class="clearfix"></div>
          
             </div>
              <div class="single-item-options">
              <input type="button" name="add_to_cart" id="'.$sp["pro_id"].'" class="btn btn-outline-dark mt-3 p-2 form-control add_to_cart" style="max-width: 10%; background-color: aqua;" value="Add to Cart" />
              
          </div>
          
          
          
            </div>
        </div>
        <div class="woocommerce-tabs">
                                <ul class="tabs">
                                    <li><a href="#tab-description">Mô tả</a></li>
                                    
                                </ul>

                                <div class="panel" id="tab-description">
                                    <p>'.$sp['description'].'</p>
                                </div>
            </div>

      ' ;
      }
      echo $output;
      
      
  } 
}

        
        // $id= $_GET['id'];
      
        // if (isset($_SESSION['cart'][$id]))
        //     $sl = $_SESSION['cart'][$id]+1;
        // else
        //     $sl = 1;

        // $_SESSION['cart'][$id]= $sl;
        
      
    //    add to cart
       
        //  if($_POST['add-to-cart'] )
        //  {
        //   if(isset($_SESSION['cart']))
        //   {
        //    $is_available = 0;
        //    foreach($_SESSION['cart'] as $keys => $values)
        //    {
        //     if($_SESSION['cart'][$keys]['pro_id'] == $_POST['pro_id'])
        //     {
        //      $is_available++;
        //      $_SESSION['cart'][$keys]['quantity'] = $_SESSION['cart'][$keys]['quantity'] + $_POST['quantity'];
        //     }
        //    }
        
        //    if($is_available == 0)
        //    {
        //     $item_array = array(
        //      'pro_id' => $_POST['pro_id'], 
        //      'pro_name' => $_POST['pro_name'],
        //      'pro_price' => $_POST['pro_price'],
        //      'quantity' => $_POST['quantity']
        //     );
        //     $_SESSION['cart'][] = $item_array;
        //    }
        //   }
        //   else
        //   {
        //    $item_array = array(
        //     'pro_id'  => $_POST['pro_id'],
        //     'pro_name'  => $_POST['pro_name'],
        //     'pro_price'  => $_POST['pro_price'],
        //     'quantity' => $_POST['quantity']
        //    );
        
        //    $_SESSION['cart'][] = $item_array;
        //   }
        //  }
      
       

        // add cart 2 
      
        if (!isset($_SESSION['cart']))
        $_SESSION['cart'] = [];

        if (isset($_POST['add-to-cart'])&&($_POST['add-to-cart'])){
            $is_available = 0;
           foreach($_SESSION['cart'] as $keys => $values)
           {
            if($_SESSION['cart'][$keys]['pro_id'] == $_POST['pro_id'])
            {
             $is_available++;
             $_SESSION['cart'][$keys]['quantity'] = $_SESSION['cart'][$keys]['quantity'] + $_POST['quantity'];
            }
           }
        
           if($is_available == 0)
           {
            // $image = $_POST['image'];
            // $pro_name = $_POST['pro_name'];
            // $price = $_POST['price'];
            // $quantity = $_POST['quantity'];
            $item_array = array(
                     'pro_id' => $_POST['pro_id'], 
                     'image' => $_POST['image'],
                     'pro_name' => $_POST['pro_name'],
                     'price' => $_POST['price'],
                     'quantity' => $_POST['quantity']
                    );
            $_SESSION['cart'][] = $item_array; 
              }   
            }
            else
            {
             $item_array = array(
              'pro_id'  => $_POST['pro_id'],
              'image' => $_POST['image'],
              'pro_name'  => $_POST['pro_name'],
              'price'  => $_POST['price'],
              'quantity' => $_POST['quantity']
             );
          
             $_SESSION['cart'][] = $item_array;
            }
            
var_dump($_SESSION['cart']);
        
?>