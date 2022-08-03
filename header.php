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
</head>
<body>

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
					<ul class="top-details menu-beta l-inline">
					<?php	while($rows = mysqli_fetch_array($sql_name)){?>
						<li><a>Xin chào <?php echo $rows['usernames'];?>   </a></li>
					<?php }?>
						<?php if(isset($_SESSION['user'])) {?>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
					
					<?php } else { ?>
						<li><a href="signup.php"><i class="fa fa-user"></i>Đăng kí</a></li>
                 		<li><a href="login.php"><i class="fa fa-user"></i>Đăng nhập</a></li>
					<?php } ?>
						
						
					</ul>
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
						<form role="search" method="POST"  action="index.php?page_layout=timkiem">
					        <input type="text" value="" name="text_search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" name="search" id="searchsubmit"></button>
						</form>
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
						<li><a href="trangchu.php">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
                        <?php foreach($brand as $br): ?>
								<li><a href="loaisp.php?id=<?php echo  $br["brand_id"] ?>"><?=$br['brand_name'] ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li><a href="index.php?page_layout=cart">Giỏ hàng</a></li>
						<li><a href="donhang.php">Đơn hàng đã mua</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
    
</body>
</html>