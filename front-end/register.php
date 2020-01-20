<?php
    require_once __DIR__.'/../layouts/header.php';
?>
  <!-- register start -->

     <div class="container-fluid bg">
			<div class="row justify-content-center">
				<div class="form-group row-container">
					<form action="" id="form" method="post">
                    <h2 class="title">Tạo tài khoản MIỄN PHÍ</h2>
                    	<div class="row form-group" > 
          					<div class="col-xs-6 col-md-6"> 
              				<input class="form-control" name="lastname" placeholder="Họ" required="" autofocus="" type="text"> 
          				    </div> 
          				    <div class="col-xs-6 col-md-6"> 
              				<input class="form-control" name="firstname" placeholder="Tên" required="" type="text"> 
          				    </div>                                                                                                                                                                                                                    
         		        </div> 
                    	<div class="form-group">
                        <input class="form-control" name="email" placeholder="Email" required="" type="email">
                        </div>
						<div class="form-group"> 
							<input type="password" placeholder="Mật khẩu" class="form-control" name="pass" id="pass" required>
						</div>
						<div class="form-group">
							
							<input type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="confpass" id="confpass" required>
						</div>
						<div class="form-group">
							<span class="error" style="color:red; font-weight: bold;"></span>
						</div>
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