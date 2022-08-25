<?php
// $output = '
// <div class="table-responsive" id="order_table">
//  <table class="table table-bordered table-striped">
//   <tr>  
//             <th width="40%">Product Name</th>  
//             <th width="10%">Quantity</th>  
//             <th width="20%">Price</th>  
//             <th width="15%">Total</th>  
//             <th width="5%">Action</th>  
//         </tr>
// ';


// 	if(!empty($_SESSION["cart"])){
// 		foreach ($_SESSION['cart'] as $id => $sl)
// 		$arid[] = $id;
// 		$str= implode(",", $arid);
// 		$sql = "SELECT * FROM products WHERE pro_id IN ($str)";

	
// 		$conn = mysqli_connect("localhost", "root", "", "users");
// 		$kq = mysqli_query($conn, $sql);
// 		$total=0;
// 		while ($row = mysqli_fetch_array($kq)) {
//   $output .= '
    //   <tr>
    //    <td>'.$kq["pro_name"].'</td>
    //    <td>'.$kq["quantity"].'</td>
    //    <td align="right">$ '.$kq["price"].'</td>
    //    <td align="right">$ '.number_format($kq["quantity"] * $kq["price"], 2).'</td>
    //    <td><button name="delete-cart" class="btn btn-danger btn-xs delete" id="'. $kq["pro_id"].'">Remove</button></td>
    //   </tr>
//   ';
//   $total_price = $total_price + ($kq["quantity"] * $kq["price"]);


//  }
//  $output .= '
//  <tr>  
//         <td colspan="3" align="right">Total</td>  
//         <td align="right">$ '.number_format($total_price, 2).'</td>  
//         <td></td>  
//     </tr>
//  ';
// }
// else
// {
//  $output .= '
//     <tr>
//      <td colspan="5" align="center">
//       Your Cart is Empty!
//      </td>
//     </tr>
//     ';
// }
// $output .= '</table></div>';

// echo $output;
    function showcart(){
        $total_price = 0;
        
        $item_details = '';
        
        $order_details = '
        <div class="table-responsive" id="order_table">
         <table class="table table-bordered table-striped">
          <tr>  
                    <th width="20%">Product Name</th>
                    <th width="20%">Image</th>   
                    <th width="10%">Quantity</th>  
                    <th width="20%">Price</th>  
                    <th width="15%">Total</th>  
                    <th width="5%">Action</th>  
                </tr>
        ';
        
        if(!empty($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $keys => $values){
                $order_details .='
                        <tr>
                        <td>'.$values["pro_name"].'</td>
                        <td><img src="source/image/'.$values['image'].'" alt="" height="100px"></td>
                        <td>'.$values["quantity"].'</td>
                        <td align="right">$ '.$values["price"].'</td>
                        <td align="right">$ '.number_format($values["quantity"] * $values["price"], 2).'</td>
                        <td><button name="delete-cart" class="btn btn-danger btn-xs delete" id="'. $values["pro_id"].'">Remove</button></td>
                        </tr>
                    
                ';
                $total_price = $total_price + ($values["quantity"] * $values["price"]);
                $item_details .= $values["pro_name"] . ', ';
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
    
?>
