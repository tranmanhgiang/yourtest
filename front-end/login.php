<?php 
    require_once __DIR__.'/../autoloads/autoload.php';

    $data = [
      'email' => postInput('email'),
      'password' => postInput('password')
    ];
    $error = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($data['email'] == ''){
        $error['email'] = "Email không được để trống";
      }
      if($data['password'] == ''){
        $error['password'] = "Password không được để trống";
      }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)){
      $check = $db->fetchOne("users"," u_email = '".$data['email']."' AND u_password = '".$data['password']."'");
      if($check != NULL){
        $_SESSION['u_id'] = $check['u_id'];
        $_SESSION['u_firstName'] = $check['u_firstName'];
        echo "<script>alert('Đăng nhập thành công'); location.href='index.php'</script>";
      }else{
        $_SESSION['error'] = "Email hoặc mật khẩu không chính xác";
      }
    }
    
?>
<?php 
    require_once __DIR__.'/../layouts/header.php';
?>
  <?php 
    require_once __DIR__.'/../notification/notification.php';
  ?>
  <!-- form login -->
  <div class="container-fluid bg">
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-6 col-xs-12 row-container">
        <form action="" method = "POST">
            <h2 class="title">YOURTEST</h2>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" value = "<?php echo $data['email']; ?>">
              <?php  if(isset($error['email'])): ?>
                <div class="text-danger"><?php echo $error['email']; ?></div>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" value = "<?php echo $data['password']; ?>">
              <?php  if(isset($error['password'])): ?>
                <div class="text-danger"><?php echo $error['password']; ?></div>
              <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <div>Bạn chưa có tài khoản? <a href="register.php">Đăng ký >></a></div>
        </form>
      </div>
    </div>
  </div>
  <!--form login end-->
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>