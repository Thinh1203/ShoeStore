<?php
include '../../connect.php';
use App\Models\Product;

  session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['username']);
  }
?>
<?php
    $string1 = '';
    $layout = '';
    if(isset($_GET['layout'])){
        $layout = $_GET['layout'];
    }
    switch($layout){
        case 'nu': {
            $string1 = 'Giày nữ';
            break;
        }
        case 'nam': {
            $string1 = 'Giày nam';
            break;
        }
        case 'treem': {
            $string1 = 'Giày trẻ em';
            break;
        }
        default: {
            $string1 = 'Danh sách sản phẩm';
        }
           
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

    <title><?php echo $string1; ?></title>

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
              <a href="danhsach.php" class="site_title"><i class="fa fa-paw ml-2"></i> <span>&nbsp;ADMIN</span></a>
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
                      <li><a href="?layout=nu">Giày nữ</a></li>
                      <li><a href="?layout=nam">Giày nam</a></li>
                      <li><a href="?layout=treem">Giày trẻ em</a></li>
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
        <div class="right_col" role="main">
          <h1><?php echo $string1; ?></h1>
          <div class="body_add-product border border-5 border-dark">
          <div class="row p-2">
            <div class="col text-primary font-weight-bold text-center">STT</div>
            <div class="col text-primary font-weight-bold">Tên SP</div>
            <div class="col text-primary font-weight-bold">Mã SP</div>
            <div class="col text-primary font-weight-bold">Chất liệu</div>
            <div class="col text-primary font-weight-bold">Size</div>
            <div class="col text-primary font-weight-bold">Kiểu dáng</div>
            <div class="col text-primary font-weight-bold">Thể loại</div>
            <div class="col col-2 text-primary font-weight-bold">Hình ảnh</div>
            <div class="col text-primary font-weight-bold">Số lượng</div>
            <div class="col text-primary font-weight-bold">Giá</div>
            <div class="col text-primary font-weight-bold">Chức năng</div>      
          </div>
          <hr style="height:1px;border-width:0;color:gray;background-color:gray">
          <?php 
            $i = 1;
            switch($layout){
              case 'nu': {
                $row = Product::all()->where('theLoai','Giày nữ');
                  break;
              }
              case 'nam': {
                $row = Product::all()->where('theLoai','Giày nam');
                  break;
              }
              case 'treem': {
                $row = Product::all()->where('theLoai','Giày trẻ em');
                  break;
              }
              default: {
                $row = Product::all();
              }
                } foreach($row as $element){?>
          <div class="row p-2">
            <div class="col text-dark font-weight-bold text-center"><?php echo $i++ ;?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->tenSP; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->maSp; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->chatLieu; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->size; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->kieuGiay; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->theLoai; ?></div>
            <div class="col col-2 text-dark font-weight-bold"><img style="width: 120px; height: 120px;;" src="../../../image/giaynam/<?php echo $element->hinhAnh;?>"></div>
            <div class="col text-dark font-weight-bold"><?php echo $element->soLuong; ?></div>
            <div class="col text-dark font-weight-bold"><?php echo number_format($element->gia,'0','',',') . 'đ';?></div>
            <div class="col text-primary font-weight-bold">
              <span><a onclick="return Del('<?php echo  $element->tenSP;?>') " href="xoasanpham.php?id=<?php echo $element->id; ?>"><i class="fa fa-trash text-danger" style="font-size: 18px;"></i></a></span> &nbsp; 
              <span><a href="suasanpham.php?id=<?php echo $element->id; ?>"><i class="fa fa-pencil-square-o text-primary" aria-hidden="true" style="font-size: 18px;"></i></a></span>
            </div>
          </div>
          <hr style="height:1px;border-width:0;color:gray;background-color:gray">  
       <?php } ?>
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
    <script>
        function Del(name){
            return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
        }
    </script>
  </body>
</html>
