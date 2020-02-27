<?php 
  require_once __DIR__.'/../autoloads/autoload.php';
  require_once __DIR__.'/../layouts/header.php';
  if(!$_SESSION['u_id']){
    echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
  }
  $data = [
    'u_id' => $_SESSION['u_id'],
    't_name' => postInput('name'),
    't_time' => postInput('time'),
    't_password' => postInput('password')
  ];
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $insert_test = $db->insert("tests",$data);
    }
    
?>
<form action="" method = "POST">
    <div class="container">
        <div class="row form-group">
            <label class = "col-sm-4"><b>Tên bài thi: </b></label>
            <input type="text" class="col-sm-8 form-control" name="name" required value = "<?php echo $data['t_name'] ?>">
        </div>
        <div class="row form-group">
            <label class = "col-sm-4"><b>Mật khẩu (nếu có): </b></label>
            <input type="password" class="col-sm-8 form-control" name="password" value = "<?php echo $data['t_password'] ?>">
        </div>
        <div class="row form-group">
            <label class = "col-sm-4"><b>Thời gian (phút): </b></label>
            <input type="number" class="col-sm-4 form-control" name="time" required value = "<?php echo $data['t_time'] ?>">
        </div>
        <div class="row form-group">
            <div class="col-sm-3">
                <button class="btn btn-success" type="submit" style = "margin-right: 5px;">Tạo bài thi</button>
                <a href="index.php"><button class="btn btn-danger" type="button">Hủy bỏ</button></a>
            </div>
            <div class="col-sm-9"><a class = "pull-right btn btn-link" href="addTest.php?id=<?php echo $insert_test; ?>">Chọn câu hỏi >></a></div>
        </div>   
    </div>
    </div>
</form>
<?php require_once __DIR__.'/../layouts/footer.php'; ?>