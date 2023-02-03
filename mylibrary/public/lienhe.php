<?php
  session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    header('location: index.php');
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
  <link rel="stylesheet" href="../../css/style.css">
  <title>Liên hệ</title>
  <style> 
    .background_image{
      max-width: 100%;
      max-height: 100%;
      background: url(../../image/giaynam/banner-1.jpg);

    }
  </style>
</head>
<body style="background-color: #FDF5E6;">
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
    
  <main>
  <section class="ftco-section p-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5 d-flex justify-content-center border border-5 border-primary bg-light">
        <span><h2 class="heading-section text-center"><a href="index.php">Trang chủ</a></h2></span>&nbsp;&nbsp;
        <span><h2 class="text-center">/&nbsp;&nbsp;Liên hệ</h2></span>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-lg-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4 py-5" style="background-color: black;">
									<h3 class="mb-4">Liên hệ với chúng tôi</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Thư của bạn đã đươc gửi.
				      		</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu đề">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Nhập văn bản"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                        <input type="submit" value="Gửi" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-md-5 p-4 py-5 img">
									<h3>Thông tin liên hệ</h3>
									<p class="mb-4">Chúng tôi sẽ nhận bất kỳ đề xuất nào từ bạn</p>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Địa chỉ:</span> 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Tp.Cần Thơ</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span> Số điện thoại:</span> <a href="tel://03451391xx">03451391xx</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">thinhb1910454@student.ctu.edu.vn</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Facebook:</span> <a href="#">https://www.facebook.com/ThinhQuach/</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5476.565098115643!2d105.76538046965297!3d10.02978586106615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1652704693945!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
  </main>


  <footer>
    <div class="secssion_foot pb-3">
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
	<script src="../../js/jquery.min.js"></script>
  <script src="../../js/popper.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.validate.min.js"></script>
  <script src="../../js/main.js"></script>
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