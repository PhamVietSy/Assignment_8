
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang quản trị</title>
<link href="source/assets/dest/css/bootstrap.min.css" rel="stylesheet">
<link href="source/assets/dest/css/datepicker3.css" rel="stylesheet">
<link href="source/assets/dest/css/styles.css" rel="stylesheet">
<script type="source/assets/dest/text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="source/assets/dest/js/lumino.glyphs.js"></script>
</head>
<body>
<?php
      
    include './Controller/ProductsController.php';
    include './Controller/UsersController.php';
    
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				
                    <div class="navbar-header">
				        <ul class="user-menu">
					        <li class="dropdown pull-right" >
						    <a  class="dropdown-toggle" data-toggle="dropdown" ><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['fullname']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li ><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					        </li>
				        </ul>
					</div>
					
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="products.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="bill.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Đơn hàng</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ</h1>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo count($pro);?></div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo count($pro1);?></div>
							<div class="text-muted">Danh mục</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo count($pro2);?></div>
							<div class="text-muted">Người dùng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo count($pro3);?></div>
							<div class="text-muted">Bình luận</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-red">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Lịch</div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
		  

	<script src="source/assets/dest/js/jquery-1.11.1.min.js"></script>
	<script src="source/assets/dest/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/js/chart.min.js"></script>
	<script src="source/assets/dest/js/chart-data.js"></script>
	<script src="source/assets/dest/js/easypiechart.js"></script>
	<script src="source/assets/dest/js/easypiechart-data.js"></script>
	<script src="source/assets/dest/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
