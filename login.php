<?php 
session_start();
include'sql/connect.php';
?>

<!DOCTYPE HTML>
<html lang="en" style="background: silver;">
<head>
<title>ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesomee.css"> 

</head>
<body>
<!-- main -->
<div class="center-container" style="background:silver">
	<!--header-->
	<div class="header-w3l">
		<h1>Đăng Nhập Quản Trị</h1>
	</div>
	<?php 
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$pass = md5($_POST['pass']);

			$sql = "SELECT id,name,email,avatar FROM admin WHERE email ='$email' AND password = '$pass'";
			$res = mysqli_query($conn,$sql);

			if (mysqli_num_rows($res) ==1 ) {
				$admin = mysqli_fetch_assoc($res);
				$_SESSION['admin_login'] = $admin;
				header('location: index.php');
			}else{

				echo "<script>alert('Tài Khoản Không Tồn Tại')</script>";
			}
		}
	?>

	<div class="main-content-agile">
		<div class="sub-main-w3">	
			<div class="wthree-pro">
				<h2>Đăng Nhập Quản Trị</h2>
			</div>
			<form action="#" method="post">
				<div class="pom-agile">
					<input placeholder="E-mail" name="email" class="user" type="email" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				</div>
				<div class="pom-agile">
					<input  placeholder="Password" name="pass" class="pass" type="password" required="">
					<span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
				</div>
				<div class="sub-w3l">
					<h6><a href="#">Forgot Password?</a></h6>
					<div class="right-w3l">
						<input type="submit" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>