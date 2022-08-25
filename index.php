<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../../Assets/css/style.css" rel="stylesheet"/>
    <title>Juta Shopping</title>

    

</head>
<body>
    <?php 
    
    session_start();
    ?>
<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../../../Assets/img/'.$row["image"].'"" alt="..."></div>
        <div class="col-md-6">
            <div class="small mb-1">SKU: BST-498</div>
            <h1 class="display-5 fw-bolder">'.$row["name"].'</h1>
            <ul class="rating nav  " style="list-style: none; color:red;">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              </ul>
            <div class="fs-5 mb-5">
                <span>$ '.$row["price"].'</span>
            </div>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
            <div class="">
            <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
            <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
            <div class ="">
            <input type="number" name="quantity" id="quantity'.$row["id"].'" class="form-control" value="1" style="max-width: 4rem" />
            <input type="button" name="add_to_cart" id="'.$row["id"].'" class="btn btn-outline-dark mt-3 p-2 form-control add_to_cart" style="max-width: 50%" value="Add to Cart" />
            </div>
            </div>
        </div>
    </div>
</div>
</body>