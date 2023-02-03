<?php
  session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    header('location: index.php');
  }
  include '../connect.php';
  use App\Models\Product;
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
          <span><a href="addcart.php"><i class="fa-solid fa-cart-shopping"></i></a>
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
  <?php
    $stt = $_GET['id'];
    $query = Product::where('id', $stt)->get(); 
  ?> 
  <main>
  <div class="container">
    <h2 class="pt-4 pl-4 text-left ml-4 text-danger">CHI TIẾT SẢN PHẨM</h2>
  <form action="addcart.php?id=<?php echo $query[0]->id;?>" method="POST">
    <div class="row p-3">
      <div class="col border border-secondary rounded">
        <img class="d-block w-100 img-fluid"  alt="..." src="../../image/SachKhoaHoc/<?php echo $query[0]->hinhAnh;?>"  style="width: 400px; height:500px;">
        <input type="text" value="<?php echo $query[0]->hinhAnh;?>" name="hinhAnh">
      </div>
      <div class="col">
        <div class="product-name mt-4 mb-4">
          <h6 style="color: #A9A9A9;">TRANG CHỦ / <?php echo strtoupper($query[0]->kieuGiay);?></h6>
          <h4 class="font-weight-bold pt-2 pb-2"><?php echo $query[0]->tenSP;?></h4>
            <p class="font-weight-bold">Giá: <span class="text-danger"><?php  echo number_format($query[0]->gia,'0','',',') . 'đ' ;?></span></p>
            <input class="invisible" type="text" value="<?php echo number_format($query[0]->gia,'0','',','); ?>" name="gia">
          <div class="add-cart ">
            <span class="number pt-2 pb-2">Số lượng: <input name="number" type="number"  min="1" max="10" value="1"></span>        
            <span><input type="submit" class="themgiohang ml-5" value="Thêm vào giỏ" name="addcart"></span>
          </div>
          <div class="form-group d-flex mt-3">
            <label for="" class="mr-3">Size:</label>
            <select name="size" id="size" class="form-control" style="width: 100px;">
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
          <!-- <input type="submit" class="btn btn-primary" value="Thêm vào giỏ"> -->

        </div>
          <?php   
          use Illuminate\Database\Capsule\Manager as Manager; 
          $query_new = Manager::table('image_library')->where('product_id', $stt)->get();
       ?> <table>
         <tr>
     <?php foreach($query_new as $key){?>
        <td>
         <img class="d-block img-fluid"  alt="..." src="../../image/giaynam/<?php echo $key->path;?>"  style="width: 250px; height:175px;">
         </td>
       <?php }  ?>
       </tr>
       </table>
      </div>
    </div>
     </form>
  </div>

  </main>


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