<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	$data = [
		'u_lastName' => postInput('lastname'),
		'u_firstName' => postInput('firstname'),
		'u_email' => postInput('email'),
		'u_password' => postInput('password'),
		'u_description' => postInput('description')
	];
	$error = [];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($data['u_lastName'] == ''){
			$error['lastname'] = "Họ không được để trống";
		}
		if($data['u_firstName'] == ''){
			$error['firstname'] = "Tên không được để trống";
		}
		if($data['u_email'] == ''){
			$error['email'] = "Email không được để trống";
		}
		if($data['u_password'] == ''){
			$error['password'] = "Mật khẩu không được để trống";
		}
		if($data['u_password'] != postInput('confpass')){
			$error['confpass'] = 'Mật khẩu không trùng khớp';
		}
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)){
		$check = $db->fetchOne("users"," u_email = '".$data['u_email']."'");
		if($check != NULL){
			$_SESSION['error'] = "Email đã tồn tại";
		}else{
			$id_insert = $db->insert("users",$data);
			if($id_insert > 0){
				echo "<script>alert('Đăng ký thành công! Mời bạn đăng nhập'); location.href='login.php'</script>";
			}else{
				$_SESSION['error'] = "Đăng nhập thất bại";
			}
		}
		
		
	}
?>

<?php
    require_once __DIR__.'/../layouts/header.php';
?>
 <?php 
    require_once __DIR__.'/../notification/notification.php';
  ?>
  <!-- register start -->
     <div class="container-fluid bg">
			<div class="row justify-content-center">
				<div class="form-group row-container">
					<form action="" id="form" method="post">
                    <h2 class="title">Tạo tài khoản MIỄN PHÍ</h2>
                    	<div class="row form-group" > 
          					<div class="col-xs-6 col-md-6"> 
              					<input class="form-control" name="lastname" placeholder="Họ" autofocus type="text" value = "<?php echo $data['u_lastName'] ?>"> 
								<?php if(isset($error['lastname'])): ?>
									<div class="text-danger"><?php  echo $error['lastname']; ?></div>
								<?php endif; ?>
							</div> 
          				    <div class="col-xs-6 col-md-6"> 
              					<input class="form-control" name="firstname" placeholder="Tên" type="text" value = "<?php echo $data['u_firstName'] ?>"> 
								<?php if(isset($error['firstname'])): ?>
									<div class="text-danger"><?php  echo $error['firstname']; ?></div>
								<?php endif; ?>
							</div>                                                                                                                                                                                                                    
         		        </div> 
                    	<div class="form-group">
                        	<input class="form-control" name="email" placeholder="Email" type="email" value = "<?php echo $data['u_email'] ?>">
						</div>
						<?php if(isset($error['email'])): ?>
							<div class="text-danger"><?php  echo $error['email']; ?></div>
						<?php endif; ?>

						<div class="form-group"> 
							<input type="password" placeholder="Mật khẩu" class="form-control" name="password" id="password" >
						</div>
						<?php if(isset($error['password'])): ?>
							<div class="text-danger"><?php  echo $error['password']; ?></div>
						<?php endif; ?>

						<div class="form-group">
							<input type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="confpass" id="confpass" >
						</div>
						<?php if(isset($error['confpass'])): ?>
							<div class="text-danger"><?php  echo $error['confpass']; ?></div>
						<?php endif; ?>
						<div class="form-group">
							<span class="error" style="color:red; font-weight: bold;"></span>
						</div>

						<textarea rows="5" cols="80" placeholder="Nhập mô tả về bản thân" name = "description" id = "description"></textarea>
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button><br/>
                        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập >></a></p>
					</form>
				</div>
			</div>
		</div>
    <!-- register area end -->

    <?php
        require_once __DIR__.'/../layouts/footer.php';
    ?>