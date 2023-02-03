<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
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
 <style>
   .back_home-icon{
     font-size: 20px;
   }
 </style>
</head>
<body>
  <main>
  <div class="limiter">
		<div class="container-login100" style="background-image: url('../Login_v4/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-54">
				<form method="POST" class="login100-form validate-form">
          <div class="header_dk d-flex justify-content-between">         
            <span class="back_home" ><a href="index.php"><i class="fa fa-arrow-left back_home-icon" style="font-size: 25px;"></i></a></span>
            <span class="m-l-30"><h2 class="text-black">Đăng ký</h2></span>
            <div class="p-b-25 p-t-8">
              <a style="font-size: 18px;" href="dangnhap.php"><b>Đăng nhập</b></a>
            </div>
          </div>
          <div class="php-code">
          <?php
        include '../connect.php';
        use App\Models\User;

        function validating($phone){
          if(preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $phone)) {
            return true;
            } else {
            return false;
          }
        }
     
        function emailValid($string){ 
          if (preg_match ('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/', $string)) {
            return true;
            } else {
            return false;
          }
        }
        if(isset($_POST['sign-submit'])){
          $username=$_POST['username'];
          $password1=$_POST['pswd1'];
          $password2=$_POST['pswd2'];
          $check=false;       
          if(validating($username) || emailValid($username)){ 
            
            if(strlen($password1) > 6){
              if($password1 == $password2) {
                $user = User::where('username', $username)->get('username');

                if($user=="[]") {
                    $password1=md5($password1);
                    $newUser = new User(['username' => $username, 'password' => $password1]);
                    $newUser->save();
                    echo '<p style="text-align:center; color: green;">Đăng ký thành công!</p>';
                    
                } else {
                    echo '<p style="text-align:center; color: red;">Tài khoản đã tồn tại.</p>';
                  }
              } else {
                  echo '<p style="text-align:center; color:red">Mật khẩu không trùng khớp</p>';
              }
            } else {
              echo '<p style="text-align:center; color:red">Mật khẩu phải nhiều hơn 6 ký tự!!!</p>';
            }   
          } else {
            echo '<p style="text-align:center; color:red">Tên đăng nhập phải là Email hoặc Số điện thoại!!!</p>';
          } 
        }
      ?>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Vui lòng nhập tài khoản">
						<span class="label-input100">Tài khoản</span>
						<input class="input100" type="text" name="username" placeholder="Email hoặc số điện thoại">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập mật khẩu">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="pswd1" placeholder="Mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
          <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập lại mật khẩu">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="pswd2" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="p-t-8 p-b-31 d-flex justify-content-between"></div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="sign-submit">
								Đăng ký
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>



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