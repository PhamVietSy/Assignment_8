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

        
        $id= $_GET['id'];
        if (isset($_SESSION['cart'][$id]))
            $sl = $_SESSION['cart'][$id]+1;
        else
            $sl = 1;

        $_SESSION['cart'][$id]= $sl;
      
        

?>

    