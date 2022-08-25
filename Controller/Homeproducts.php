<?php

   
$conn = mysqli_connect("localhost", "root", "", "users");

    $queryy = " SELECT * FROM products  ";
    $statement = $conn ->query($queryy);
//     $output = '';
//     foreach($statement as $sp){
//     $output .= '
//     <div class="col-sm-3">
// 	<div class="single-item">
// 	    <div class="single-item-header">
//          <a href="./cart.php?id='.$sp["pro_id"].'"><img src="source/image/'.$sp["image"].'"   height="250px"/></a>
//         </div>
//         <div class="single-item-body">
//             <h4 class="single-item-title">'.$sp["pro_name"].'</h4>
//             <h4 class="single-item-title">$ '.$sp["price"].'</h4>
//             <input type="hidden" name="quantity" id="quantity'.$sp["pro_id"].'" class="form-control" value="1" />
//             <input type="hidden" name="hidden_name" id="name'.$sp["pro_id"].'" value="'.$sp["pro_name"].'" />
//             <input type="hidden" name="hidden_price" id="price'.$sp["pro_id"].'" value="'.$sp["price"].'" />
//         </div>
//         <div class="single-item-caption">
//             <input type="button" name="add-to-cart" href="./Controller/CartController.php?id='.$sp["pro_id"].'" id="'.$sp["pro_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart"  value="Add to Cart" />
    
//             <a class="beta-btn primary" style="margin-bottom: 26px ; margin-top: 10px; "  href="detail_product.php?id='. $sp["pro_id"] .'">Chi tiết <i class="fa fa-chevron-right"></i></a>  
//         <div class="clearfix"></div>
//         </div>
//       </div>
//   </div>';
//                   }
//                   echo $output;

?>
<?php  foreach($statement as $sp): ?>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chitietsp.php?id=<?php echo  $sp["pro_id"] ?>"><img src="source/image/<?=$sp['image'] ?>" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="height: 40px"><?=$sp['pro_name'] ?></p>
											<p class="single-item-price" style="font-size: 17px; height: 30px">
												<span  class="flash"><?=number_format($sp['price'],0)?> VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
										<?php if($sp['quantity']>0) {?>
											<form class="buy-form" action="./Controller/CartController.php" method="post">
											<!-- <a name="add-cart" class="add-to-cart" href="./Controller/CartController.php?id= echo  $sp["pro_id"] " ><i class="fa fa-shopping-cart"></i></a> -->
											<input type="hidden" name="pro_id" id="pro_id<?=$sp["pro_id"]?>" value="<?=$sp["pro_id"]?>" />
											<input type="hidden" name="image" id="image<?=$sp["pro_id"]?>"  value="<?=$sp["image"]?>" />
											<input type="hidden" name="quantity" id="quantity"  value="1" />
											<input type="hidden" name="pro_name" id="pro_name<?=$sp["pro_id"]?>" value="<?=$sp["pro_name"]?>" />
											<input type="hidden" name="price" id="price<?=$sp["pro_id"]?>" value="<?=$sp["price"]?>" />
											<input type="submit" value="Add to cart" name="add-to-cart" class="btn btn-success form-control" style="margin-top:5px; width: 40%" />
											</form>
											<?php } else { ?>
												<span class="btn btn-danger">Hết hàng</span>
												<?php } ?>	
											<a class="beta-btn primary" style="margin-bottom: 26px ; "  href="detail_product.php?id=<?php echo  $sp["pro_id"] ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach ?>
						