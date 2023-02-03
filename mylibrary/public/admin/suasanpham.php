<?php
    include '../../connect.php';
    use App\Models\Product;
    use Illuminate\Database\Capsule\Manager as Manager;
    
    $id = $_GET['id'];

    $sql_product = Product::where('id', $id)->get();
    
    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];
        $prd_code = $_POST['prd_code'];
        $prd_type = $_POST['prd_type'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
       // $image = $_FILES['image']['name'];
        $soLuong = $_POST['soLuong'];
     //  $image_tmp = $_FILES['image']['tmp_name'];
       foreach($sql_product as $element){
        if($image = $_FILES['image']['name'] == '[]'){
            $image = $element->hinhAnh;
        }else{
            $image = $element->hinhAnh;
        }
    }
        Manager::table('product')->where('id', $id)->update(['tenSP' => $prd_name, 'maSp' => $prd_code, 'chatLieu' => $prd_type, 'size' => $size, 'kieuGiay' => $model, 'theLoai' => $brand, 'hinhAnh' => $image, 'soLuong' => $soLuong, 'gia' => $price]);
       // move_uploaded_file($image_tmp, '../../../image/giaynam/'.$image);
        header('Location: lietkesanpham.php?layout=danhsachsp'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Thêm sản phẩm</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw ml-2"></i> <span>&nbsp;ADMIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                
              <?php     
                        if(isset($_SESSION['username'])) {
                            $name = $_SESSION['username']; ?>
                    <span>
                        <?php
                            echo '<span> Xin chào ' . '<span style="color:red;">' . $name . '</span>' .  '</span>';
                            echo '<span> <a href="../dangnhap.php?logout" class="text-info">Thoát</a></span>';
                        }else{
                            echo '<span> <a href="../dangnhap.php">Đăng nhập</a> </span>';
                        } ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Quản lý</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-list"></i> Danh mục sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="lietkesanpham.php?layout=nu">Giày nữ</a></li>
                      <li><a href="lietkesanpham.php?layout=nam">Giày nam</a></li>
                      <li><a href="lietkesanpham.php?layout=treem">Giày trẻ em</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gift"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="themsanpham.php">Thêm sản phẩm</a></li>
                      <li><a href="lietkesanpham.php?layout=danhsachsp">Danh sách sản phẩm</a></li>         
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i> Đơn hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="donhang.php">Liệt kê đơn hàng</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="baiviet.php">Liệt kê bài viết</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Người dùng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nguoidung.php">Danh sách người dùng</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col " role="main">
          <div class="body_add-product">
          <div class="container-fluid">
        <div class="card">
            <!--Card header-->
            <div class="card-header">
                <h2 class="text-center font-weight-bold text-dark">Sửa sản phẩm</h2> 
            </div>

            <!--Card header-->
          <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <?php foreach($sql_product as $element){?>
                <div class="form-group">
                  <label for="prd_name">Tên sản phẩm</label>
                  <input type="text" id="prd_name" name="prd_name" class="form-control" require value="<?php echo $element->tenSP;?>">
                </div>
                <div class="form-group">
                  <label for="prd_code">Mã sản phẩm</label>
                  <input type="text" id="prd_code" name="prd_code" class="form-control" require value="<?php echo $element->maSp;?>">
                </div>
                <div class="form-group">
                  <label for="prd_type">Chất liệu</label>
                  <input type="text" id="prd_type" name="prd_type" class="form-control" require value="<?php echo $element->chatLieu;?>">
                </div>
                <div class="form-group">
                  <label for="">Size</label>
                  <select name="size" id="size" class="form-control" >
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="31">41</option>
                    <option value="42">42</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Kiểu dáng</label>
                  <select name="model" id="model" class="form-control">
                    <option value="Classic">Classic</option>
                    <option value="Sunbaked">Sunbaked</option>
                    <option value="Chuck 70s">Chuck 70s</option>
                    <option value="One Star">One Star</option>
                    <option value="PSY-Kicks">PSY-Kicks</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Giá</label>
                    <input type="number" id="price" name="price" class="form-control" require value="<?php echo $element->gia;?>">
                </div>
                <div class="form-group">
                  <label for="soluong">Số lượng</label>
                    <input type="number" id="soluong" name="soLuong" class="form-control" require value="<?php echo $element->soLuong;?>">
                </div>
                <div class="form-group">
                  <label for="">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="form-control" require>
                </div>

                <div class="form-group">
                  <label for="brand">Thể loại</label>
                  <select name="brand" id="brand" class="form-control">
                    <option value="Giày nữ">Giày nữ</option>
                    <option value="Giày nam">Giày nam</option>
                    <option value="Giày trẻ em">Giày trẻ em</option>
                  </select>
                </div>
                <?php } ?>
                  <button class="btn btn-primary mt-3 btn-lg" type="submit" name="sbm">Thêm</button>
            </div>
          </form>
        </div>
    </div>
        </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
