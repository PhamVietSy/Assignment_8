    

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WEB BÁN HÀNG </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    <link href="source/assets/dest/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/assets/dest/css/datepicker3.css" rel="stylesheet">
    <link href="source/assets/dest/css/styles.css" rel="stylesheet">
    <script src="source/assets/dest/js/lumino.glyphs.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php 	
			include './Controller/CartController.php';
			
	?>
 	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Sơn trà đà nẵng</a></li>
						<li><a href=""><i class="fa fa-phone"></i>0986579181</a></li>
					</ul>
				</div>
                <div class="pull-right auto-width-right">
                    <div class="navbar-header">
				        <ul class="user-menu">
					        <li class="dropdown pull-right">
						    <a  class="dropdown-toggle" data-toggle="dropdown" style="color:black"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['fullname']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					        </li>
				        </ul>
			</div>
				</div>
                
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
        <div class="header-body">
			<div class="container beta-relative">
            <div class="pull-left">
					<a href="" id="logo"><img src="source/assets/dest/images/logoit.png" width="100px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="POST" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="text_search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" name="search" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> 
                        </div>
							
								
                          
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="home.php">Trang chủ</a></li>
						<li><a >Sản phẩm</a>
							<ul class="sub-menu">
                        <?php foreach($brand as $br): ?>
								<li><a href="loaisp.php?id=<?php echo  $br["brand_id"] ?>"><?=$br['brand_name'] ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li><a >Blog</a></li>
						<li><a >Shop</a></li>
                        <li><a >Contact</a></li>
                        
					</ul>

					<div class="clearfix"></div>
                    
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	</div>
	<div class="row">
					<div class="col-sm-12">
						<div class="space50">&nbsp;</div>

						
                               <?php detail_product(); ?>

                        <div class="space40">&nbsp;</div>
                                
					<div class="card">
					</div>
	</div>
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2022</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<script src="source/js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</body>
</html>

