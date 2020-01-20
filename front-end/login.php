<?php 
    require_once __DIR__.'/../layouts/header.php';
?>
  <!-- form login -->
  <div class="container-fluid bg">
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-6 col-xs-12 row-container">
        <form action="">
            <h2 class="title">CLEVER</h2>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
              <p class="emailError"></p>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required>
              <p class="passwordError"></p>
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