<?php
    session_start();
    // load các sản phẩm order
     function order_detail (){
        $total_price = 0;
        
        $item_details = '';
        
        $order_details = '
        <div class="table-responsive" id="order_table">
         <table class="table  table-striped table-hover"> 
         <tr>  
                       
                        <th> Name</th> 
                        <th>Quantity</th>  
                        <th>Price</th>  
                        <th>Total</th>  
                        <th>Action</th>  
            </tr>
        ';
        
        if(!empty($_SESSION["shopping_cart"]))
        {
         foreach($_SESSION["shopping_cart"] as $keys => $values)
         {
          $order_details .= '
          <tr>
          
           <td>'.$values["product_name"].'</td>
           <td>  <input type="number" name="quantity" id="quantity'.$values["product_id"].'" class="form-control" value="1" style="max-width: 4rem" /></td>
           <td >$ '.$values["product_price"].'</td>
           <td >$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
           <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'"><i class="fa-solid fa-trash-can"></i></button></td>
          </tr>
          ';
          $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        
          $item_details .= $values["product_name"] . ', ';
         }
         $item_details = substr($item_details, 0, -2);
         $order_details .= '
         <tr>  
                <td colspan="3" align="right">Total :</td>  
                <td >$ '.number_format($total_price, 2).'</td>
                <td>   <a href="#" class="btn btn-warning" id="clear_cart">
                <span class="glyphicon glyphicon-trash"></span> Clear
               </a></td>
            </tr>
         ';
        }
        $order_details .= '</table>';
        echo $order_details;
     
    }
    // Tính tổng tiền của product
    function totail (){
    
   $total_price = 0;
         
   $item_details = '';

   $order_details = '
   <div class="table-responsive" id="order_table">
   <table class="table  table-striped table-hover"> 
   <tr>  
                  <th> STT</th>
                  <th> Name</th> 
                  <th>Quantity</th>  
                  <th>Price</th>  
                  <th>Total</th>  
                  <th>Action</th>  
      </tr>
   ';
      $stt =0;
   if(!empty($_SESSION["shopping_cart"]))
   {
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
      $stt +=1;
      $order_details .= '
      <tr>
         
         <td >'.$stt.' </td>
         <td>'.$values["product_name"].' </td>
         <td>  <input data-product-id ="'.$values["product_id"].'" type="number" name="quantity" class="form-control quantity  " value="'.$values["product_quantity"].'" style="max-width: 4rem" /></td>
         <td >$ '.$values["product_price"].'</td>
         <td >$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
         <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'"><i class="fa-solid fa-trash-can"></i></button></td>
      </tr>
      ';
      $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);

      $item_details .= $values["product_name"] . ', ';
      }
      $item_details = substr($item_details, 0, -2);
      $order_details .= '
      <tr>  
            <td colspan="4" align="right">Total :</td>  
            <td class="total" > $ '.number_format($total_price, 2).'</td>
            <td>   <a href="#" class="btn btn-warning" id="clear_cart">
            <span class="glyphicon glyphicon-trash"></span> Clear
            </a></td>
         </tr>
      ';
   }
    $order_details .= '</table>';
        echo $total_price;
     
    }
// load chi tiết sản phẩm
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
                  <label >Tồn kho :</label>'.$sp['quality'] .'
              </p>
         </br>
              <p class="single-item-price">
                  <span class="flash-sale">'.number_format($sp['price'],0).' VNĐ</span>       
              </p>
          </div>

          <div class="clearfix"></div>
          <div class="space20">&nbsp;</div>
          <div class="single-item-options">
        
          <input type="number" size = "4"  name="quality" id="quality'.$sp["pro_id"].'" class="form-control" value="1" style="max-width: 100px ; margin-bottom: 20px;" />
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

    