<style>
	.required{
		color: red;
	}
</style>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$erros = array();
	if (empty($_POST['fullname'])) {
		$erros[] = 'fullname';
	}
	else {
		$fullname = $_POST['fullname'];
	}
	if (empty($_POST['password'])) {
		$erros[] = 'password';
	}
	else{
		$password = md5($_POST['password']);
	}
	if (trim($_POST['password'])!=trim($_POST['password1'])) {
		$erros[] = 'password1';
	}
	if (filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)==TRUE) {
		$email = mysqli_real_escape_string($conn,$_POST['email']);
	}
	else {
		$erros[] = 'email';
	}

    if (empty($_POST['phone'])) {
		$erros[] = 'phone';
	}
	else {
		$phone = $_POST['phone'];
	}

    if (empty($_POST['address'])) {
		$erros[] = 'address';
	}
	else {
		$address = $_POST['address'];
	}

    if (empty($_POST['birthday'])) {
		$erros[] = 'birthday';
	}
	else {
		$birthday = $_POST['birthday'];
	}

	if (empty($erros)) {
		$sql= "SELECT * FROM customer WHERE email = '$email'";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res)==1) {
			$message= "<p class='required'>Tài Khoản Đã Tồn Tại</p>";
		}else{

		$sql_insert = "INSERT INTO customer(name,email,password,phone,address,birthday)VALUES('$fullname','$email','$password','$phone','$address','$birthday')";
		$sql_insert1 = mysqli_query($conn,$sql_insert);
		if (mysqli_affected_rows($conn)==1) {
			echo "<p style='color:green'>Thêm Mới Thành Công</p>";
		}else
		{
	       echo "<p class='required'>Thêm Mới Không Thành Công</p>";
		}
		}
	}
	else{
		$message= "<p class='required'>Bạn Hãy Nhập Đủ Thông Tin</p>";
	}
}
 ?>



<form action="" method="POST" role="form">
	<legend>Thêm Mới Khách Hàng</legend>

	<div class="form-group">
		<label for="">Họ Tên</label>
		<input type="text" class="form-control" name="fullname" id="" placeholder="Nhập Họ Tên">
		<?php 
         if (isset($erros) && in_array('fullname',$erros)) {
         	echo "<p class='required'>Họ Tên Không Được Trống</p>";
         }
		 ?>
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" name="email" id="" placeholder="Nhập Email" >
		<?php 
         if (isset($erros) && in_array('email',$erros)) {
         	echo "<p class='required'>Email không Hợp Lệ</p>";
         }
		 ?>
	</div>
    <div class="form-group">
		<label for="">Số điện thoại</label>
		<input type="text" class="form-control" name="phone" id="" placeholder="Nhập Số điện thoại">
		<?php 
         if (isset($erros) && in_array('phone',$erros)) {
         	echo "<p class='required'>Số điện thoại Không Được Trống</p>";
         }
		 ?>
	</div>

    <div class="form-group">
		<label for="">Địa chỉ</label>
		<input type="text" class="form-control" name="address" id="" placeholder="Nhập Địa chỉ">
		<?php 
         if (isset($erros) && in_array('address',$erros)) {
         	echo "<p class='required'>Địa chỉ Không Được Trống</p>";
         }
		 ?>
	</div>
    <div class="form-group">
		<label for="">Ngày sinh</label>
		<input type="text" class="form-control" name="birthday" id="" placeholder="Nhập Ngày sinh">
	</div>
    
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" id="" placeholder="Nhập Mật Khẩu">
		<?php 
         if (isset($erros) && in_array('password',$erros)) {
         	echo "<p class='required'>Mật Khẩu  Không Được Trống</p>";
         }
		 ?>
	</div>
    <div class="form-group">
		<label for="">Xác Nhận Password</label>
		<input type="password" class="form-control" name="password1" id="" placeholder="Xác Nhận Mật Khẩu">
			<?php 
         if (isset($erros) && in_array('password1',$erros)) {
         	echo "<p class='required'>Mật Khẩu Không Giống Nhau</p>";
         }
		 ?>
	</div>
	

	<button type="submit" class="btn btn-primary" name="adduser">Thêm</button>
</form>