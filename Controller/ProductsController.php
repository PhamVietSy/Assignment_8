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
}  while($rows = mysqli_fetch_array($query3)){
        
    $pro3[]= $rows['content'];
} 
    count($pro3);
    count($pro);
    count($pro1);
    count($pro2);
 
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
            
              <input type="number" size = "4"  name="quantity" id="quantity'.$sp["pro_id"].'" class="form-control" value="1" style="max-width: 100px ; margin-bottom: 20px;" />
              <div class="clearfix"></div>
              
                 </div>
                  <div class="single-item-options">
                <a class="add-to-cart" href="addcart.php?id='.$sp["pro_id"] .'"><i class="fa fa-shopping-cart"></i></a>
                  
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
       
?>
