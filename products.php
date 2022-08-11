
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
    
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						
					</li>
				</ul>
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
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
        <div class="container-fluid">
        <div class="card">
            
            <div class="card-body">
            <a class="btn btn-primary" href="index.php?page_layout=them">Thêm sản phẩm</a>
            <br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Danh mục</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $i = 1;
                                while($rows = mysqli_fetch_array($query4)){ 

                                    ?>
                                <tr>
                                    <th><?php echo $i++; ?> </th>
                                    <th><?php echo $rows['pro_name'];?> </th>
                                    <th>
                                        <img style="width: 100px; height: 130px;" src="source/image/<?php echo $rows['image']; ?>" alt="">
                                        </th>
                                    <th><?=number_format($rows['price'],0)?> VNĐ</th>
                                    <th><?php echo $rows['quality']; ?></th>
                                    <th><?php echo $rows['description']; ?></th>
                                    <th><?php echo $rows['brand_name']; ?></th>
                                    <th>
                                        <a href="index.php?page_layout=sua&id=<?php echo $rows['pro_id']; ?>">Sửa</a>
                                    </th>
                                    <th>
                                        <a onclick="return Del('<?php echo $rows['pro_name']; ?>') " href="index.php?page_layout=xoa&id=<?php echo $rows['pro_id']; ?>">Xóa</a>
                                    </th>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>						
		
		
		
	</div>	<!--/.main-->
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
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

<script>
        function Del(name) {
            return confirm("Bạn có chắc chắn muốn xóa sản phẩm " + name + "?");
        }
    </script>
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
