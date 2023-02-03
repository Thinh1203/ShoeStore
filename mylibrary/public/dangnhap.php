<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Login_v4/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Login_v4/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body>
  <main>
  <div class="limiter">
		<div class="container-login100" style="background-image: url('../Login_v4/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
				<form method="POST" class="login100-form validate-form">

              <span class="back_home" ><a href="index.php"><i class="fa fa-arrow-left back_home-icon" style="font-size: 25px;"></i></a></span>
              <span class="m-l-30"><h2 class="text-black text-center p-b-20">Đăng nhập</h2></span>

          <div class="php-code">
         <?php
          include '../connect.php';
          use App\Models\User;
          if(isset($_POST['sign-submit'])){
            $username = $_POST['username'];
            $pass = $_POST['pswd'];
            $pass = md5($pass);
            $checkAccount = User::where('username', $username)->where('password', $pass)->get();
            
            if($checkAccount != "[]") {
			$checkTypeUser = $checkAccount->where('type_user', 'admin'); 
            $_SESSION['username'] = $username;
				if($checkTypeUser != "[]"){
					header("location: admin/danhsach.php");
				} else {
					header("Location: index.php?"); 
				}                  
            } else {
            echo '<p style="text-align: center; color: red;">Tên tài khoản hoặc mật khẩu không hợp lệ!</p>';
            }
          }
        ?> 
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Vui lòng nhập tài khoản">
						<span class="label-input100">Tài khoản</span>
						<input class="input100" type="text" name="username" placeholder="Email hoặc số điện thoại">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="pswd" placeholder="Mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="p-t-8 p-b-31 d-flex justify-content-between">
           <a href="dangky.php">
							Đăng ký
						</a>
						<a href="#">
							Quên mật khẩu?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="sign-submit">
								Đăng nhập
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							<b style="font-size: 20px;">Đăng nhập với</b>
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
  </main>

 <!--===============================================================================================-->
 <script src="../Login_v4/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/vendor/bootstrap/js/popper.js"></script>
	<script src="../Login_v4/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Login_v4/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Login_v4/js/main.js"></script>
</body>
</html>