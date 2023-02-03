<?php
  session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    header('location: index.php');
  }
?>
<?php
  include '../connect.php';
  use App\Models\Product;
  use App\Models\User;
  use Illuminate\Database\Capsule\Manager as Manager;
 
  $thanhtien = 0;
  if(isset($_POST['addcart'])){
    $user = user::where('username', $_SESSION['username'])->get('id');
    $id = $_GET['id'];
    $query = Product::where('id', $id)->get();
    if($user=='[]'){
      header('location: dangnhap.php');
     } else {
      $size = $_POST['size'];
      $soluong = $_POST['number'];
      $gia = $_POST['gia'];
      $hinhanh = $_POST['hinhAnh']; 
      $thanhtien = (int)$soluong * (int)$gia;
      $idUser = $user[0]->id;
      $idProduct = $query[0]->id;
      $sum = number_format($thanhtien,'3','','0');
     }
     Manager::insert('insert into user_product(image, size, soLuong, gia, thanhTien, product_id, product_user) values(?,?,?,?,?,?,?)', [$hinhanh, $size, $soluong, $gia, $sum,  $idProduct, $idUser]);

  } 
  if(isset($_GET['id'])){
  Manager::delete('delete from user_product where id=:id',['id' => $_GET['id']]);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
  <link rel = "icon" href = "../../image/logo_icon.jpg" type = "image/x-icon">
  <link href="../../css/header.css" type="text/css" rel="stylesheet">
  <link href="../../css/footer.css" type="text/css" rel="stylesheet">
  <title>Trang chủ</title>
  <style>
    .get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 2.5em;
  line-height: 48px;
  padding-bottom: 48px;
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 20px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
  background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
  margin-left: 35%;
}
  </style>
</head>
<body>
<header>
    <div class="nav-header">
      
      <div class="nav-header_logo d-flex justify-content-around">
        <div class="nav_header_logo_login m-auto col text-center" style="position:relative;">
        <?php 
          if(isset($_SESSION['username'])) {
            $name = $_SESSION['username'];                  
              echo '<span style="color: white;">' . $name . '&nbsp;</span>'; 
              echo '<a href="?logout" class="text-light">Đăng xuất</a>';
          }else{
              echo '<span><a href="dangnhap.php">ĐĂNG NHẬP</a></span> <span class="text-light"> / </span>  
                  <span><a href="dangky.php">ĐĂNG KÝ</a></span> &nbsp; ';
          }
        ?>    
          <span><a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="nav_header_logo_LG m-auto col text-center" style="position:relative;">
          <a href="#" class="text-decoration-none"><span id="logo_1">M</span><span id="logo_2">V</span><span id="logo_3">C</span></a>
        </div>
        <div class="nav-header_logo_search d-inline-flex col"> 
          <ul class="m-auto search_box"><a href="#"><i class="fa-solid fa-magnifying-glass text-white" id="nav_search" style="position:relative;"></i></a></ul>  
          <li class="search_form list-unstyled" style="display: none; z-index:1000; position:absolute;">
            <form method="POST" class="form-inline d-inline-flex" id="nav_search-show" action="timkiem.php">
              <div class="box_search ">
                <input class="form-control border border-radius-0 mr-n2 ml-2 mt-3" type="text" placeholder="Search" name="tukhoa">
                <button class="btn btn-primary border border-radius-0 ml-n1 mt-3" type="submit" name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
          </li>         
        </div>
      </div>
     
      <div class="nav-header_menu">
        <div class="container">
          <nav class="navbar navbar-expand-sm justify-content-center">
          <ul class="navbar-nav d-flex justify-content-around nav_menu">

            <li class="nav-item active">
              <a class="nav-link" href="index.php">TRANG CHỦ</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="gioithieu.php">GIỚI THIỆU</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                NỮ
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Classic</a>
                <a class="dropdown-item" href="#">Sunbaked</a>
                <a class="dropdown-item" href="#">Chuck 70s</a>
                <a class="dropdown-item" href="#">One Star</a>
                <a class="dropdown-item" href="#">PSY-Kicks</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                NAM
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Classic</a>
                <a class="dropdown-item" href="#">Sunbaked</a>
                <a class="dropdown-item" href="#">Chuck 70s</a>
                <a class="dropdown-item" href="#">One Star</a>
                <a class="dropdown-item" href="#">PSY-Kicks</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">TRẺ EM</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="tintuc.php">TIN TỨC</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="lienhe.php">LIÊN HỆ</a>
            </li>
            
          </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!--End header-->
  <!-- Start main-->
  <main>
    <div class="container bg-light ">
      <div class="row mt-2 text-light" style="background: rgb(142,81,221); background: linear-gradient(90deg, rgba(142,81,221,1) 36%, rgba(81,135,221,1) 62%);">
        <div class="col border text-center">STT</div>
        <div class="col border text-center">Hình ảnh</div>
        <div class="col border text-center">Size</div>
        <div class="col border text-center">Giá</div>
        <div class="col border text-center">Số lượng</div>
        <div class="col border text-center">Thành tiền</div>
        <div class="col border text-center">Xóa</div>
      </div>
    <?php $cart = Manager::select('select * from user_product'); 
     $GLOBALS['sum'] = 0;
    for($i=0 ; $i < count($cart);){?>
      <div class="row">
        <div class="col text-center pt-2 pb-2"><?php echo ++$i;?></div>
        <div class="col text-center pt-2 pb-2">
        <img  class="d-block w-100 img-fluid "  alt="..." src="../../image/giaynam/<?php echo $cart[$i-1]->image;?>"> 
       </div>
       <div class="col text-center pt-2 pb-2"><?php echo $cart[$i-1]->size;?> </div>
        <div class="col text-center pt-2 pb-2"><?php echo number_format($cart[$i-1]->gia,'3',',',',') . 'đ';?> </div>
        <div class="col text-center pt-2 pb-2"><input name="change" type="number"  min="1" max="10" value="<?php echo $cart[$i-1]->soLuong;?>"></div>
        <div class="col text-center pt-2 pb-2"><?php echo number_format($cart[$i-1]->thanhTien,'0','',',') . 'đ';
        $GLOBALS['sum'] += $cart[$i-1]->thanhTien;?></div>
        <div class="col text-center pt-2 pb-2"><a href="addcart.php?id=<?php echo $cart[$i-1]->id; ?>">Xoá</a></div>
        </div>  
        <?php  }  ?>
        <div class="row" style="background: #5187dd;">
          <div class="col-6"><h4 class="text-right text-light">Tổng tiền = </h4></div>
          <div class="col-4"><h4 class="text-left text-light"><?php echo '<b>' . number_format($GLOBALS['sum'],'0','',',') .'đ' . '</b>';?></h4></div>
          <!-- <div class="col-2"><//?//php //if($GLOBALS['sum'] > 0){
         // echo '<button class="bg bg-primary text-center text-light p-2">Đặt hàng</button>';
        //} //?></div> -->
        </div>  
    </div>
  <section class="get-in-touch p-4"  style="border: 2px solid red; border-radius: 6px;">
    <h1 class="title">XÁC NHẬN ĐƠN HÀNG</h1>
    <form class="contact-form row" method="POST">
        <div class="form-field col-lg-6">
          <input id="name" class="input-text js-input" type="text" name="hoTen" required>
          <label class="label" for="name">Họ và tên</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input id="email" class="input-text js-input" type="email" name="Email" required>
          <label class="label" for="email">email</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input id="company" class="input-text js-input" type="text" name="diaChi" required>
          <label class="label" for="company">Địa chỉ</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input id="phone" class="input-text js-input" type="text" name="sdt" required>
          <label class="label" for="phone">Số điện thoại</label>
        </div>
        <div class="form-field col-lg-12">
          <input id="message" class="input-text js-input" type="text" name="note" required>
          <label class="label" for="message">Ghi chú đơn hàng của bạn</label>
        </div>
        <div class="form-field col-lg-12">
          <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
    
  </section>
    
    
  </main>
  <!--End main-->
  <!--Footer-->
  <footer>
    <div class="secssion_foot">
    <div class="row">/br</div>
      
        <div class="row row-cols-1 row-cols-md-4 align-center ml-5">
          <div class="col col-md-3">
            <h5 class="title">GIỚI THIỆU</h5>
            <div class="is-divider divider clearfix" style="max-width:35px;background-color:rgb(195, 0, 5);"></div>
            <p class="footer_content">Chào mừng bạn đến với ngôi nhà MVC! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử MVC 100 năm, và đang không ngừng phát triển lớn mạnh.</p>
          </div>
          <div class="col col-md-3">
          <h5 class="title">ĐỊA CHỈ</h5>
          <div class="is-divider divider clearfix" style="max-width:35px;background-color:rgb(195, 0, 5);"></div>
          <div class="row">
            <div class="col col-1 text-light"><i class="fa-solid fa-location-dot"></i></div>
            <div class="col col-11"><p class="footer_content">3/2, Phường Xuân Khánh, Quận Ninh Kiều, Tp.Cần Thơ</p></div>
          </div>
          <div class="row">
            <div class="col col-1 text-light"><i class="fa-solid fa-phone"></i></div>
            <div class="col col-11"><p class="footer_content">03451391xx</p></div>
          </div>
          <div class="row">
            <div class="col col-1 text-light"><i class="fa-solid fa-envelope-circle-check"></i></div>
            <div class="col col-11"><p class="footer_content">thinhb1910454@student.ctu.edu.vn</p></div>
          </div>
          <div class="row">
            <div class="col col-1 text-light"><i class="fa-brands fa-skype"></i></div>
            <div class="col col-11"><p class="footer_content">thinhquach</p></div>
          </div>
          </div>
          <div class="col col-md-3">
            <h5 class="title">MENU</h5>
            <div class="is-divider divider clearfix" style="max-width:35px;background-color:rgb(195, 0, 5);"></div>
            <div class="footer_menu "> 
              <div class="row">  
              <div class="col-6">
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Trang chủ</a></div>
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Giới thiệu</a></div>
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Tin tức</a></div>
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Liên hệ</a></div>
              </div>
              <div class="col-6">
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Nữ</a></div>
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Nam</a></div>
                <div class="footer_content"><a class="footer_content text-decoration-none" href="#">Trẻ em</a></div>
              </div>
            </div>
            </div> 
          </div>
    

          <div class="col col-md-3">
            <h5 class="title">MẠNG XÃ HỘI</h5>
            <div class="is-divider divider clearfix" style="max-width:35px;background-color:rgb(195, 0, 5);"></div>
            <div class="mxh_icon" style="font-size: 190%;">
              <a data-toggle="tooltip" title="Follow on Facebook" href="#" id="facebook"><i class="fa-brands fa-facebook-f"></i></a>
              <a data-toggle="tooltip" title="Follow on Instagram" href="#" id="instagram"><i class="fa-brands fa-instagram"></i></a>
              <a data-toggle="tooltip" title="Follow on Twitter" href="#" id="twitter"><i class="fa-brands fa-twitter"></i></a>
              <a data-toggle="tooltip" title="Follow on Pinterest" href="#" id="pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
              <a data-toggle="tooltip" title="Subscribe to RSS" href="#" id="rss"><i class="fa-solid fa-rss"></i></a>
            </div>
          </div>   
      </div>
    </div>
    <div class=" bg_footer">
      <div class="container">
        <p class="text-center footer_content pt-2 pb-2">&copy; Bản quyền thuộc về B1910454 <span class="f-logo_1">M</span><span class="f-logo_2">V</span><span class="f-logo_3">C</span></p>
      </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

  <script>
    $(() => {
      $('#nav_search').click(()=>{
        $('.search_form').toggle();
      });
    });
  </script>
  <script>
  $(() => {
    $('[data-toggle="tooltip"]').tooltip();   
  });
  </script>
  
<script>
    // Disable form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
  
</body>
</html>