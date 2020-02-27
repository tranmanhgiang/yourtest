<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    require_once __DIR__.'/../layouts/header.php';
    $id = $_SESSION['u_id'];
    $data = [
      'oldPass' => postInput('old_pass'),
      'confirmPass' => postInput('conf_new_pass')
    ];
    $data1 = [
      'u_password' => postInput('new_pass')
    ];
    $error = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($data['oldPass'] == ''){
        $error['empty_oldPass'] = 'Mời bạn nhập mật khẩu hiện tại';
      }
      if($data1['u_password'] == ''){
        $error['u_password'] = "Mời bạn nhập mật khẩu mới";
      }
      if($data['confirmPass'] != $data1['u_password']){
          $error['confirmPass'] = "Mật khẩu không trùng khớp";
      }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)){
        $check = $db->fetchOne("users"," u_password = '".$data['oldPass']."' AND u_id = '".$id."'");
        if($check != NULL){
            $edit_pass = $db->update("users",$data1,"u_id = $id ");
            if($edit_pass > 0){
            echo "<script>alert('Cập nhật thành công! Mật khẩu sẽ có hiệu lực kể từ lần đăng nhập sau'); location.href='index.php'</script>";
            }else{
                $_SESSION['error'] = "Cập nhật thất bại!";
            }
        }else{
            $_SESSION['error'] = "Mật khẩu không đúng";
        }
    }
?>
<?php 
    require_once __DIR__.'/../notification/notification.php';
?>
<div class="container">
    <p><b style = "font-size: 30px;">Thay đổi mật khẩu</b></p>
    <form action = "" method = "POST" >
        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="old_pass" style = "width: 150px;margin:0 20px;"> Nhập mật khẩu hiện tại:</label>
            <input type = "password" id = "old_pass" name = "old_pass" class="col-sm-6" value = "<?php echo $data['oldPass']; ?>">
        </div>
        <?php if(isset($error['empty_oldPass'])): ?>
            <div class="text-danger"><?php echo $error['empty_oldPass']; ?></div>
        <?php endif; ?>

        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="new_pass" style = "width: 150px;margin:0 20px;"> Nhập mật khẩu mới:</label>
            <input type = "password" id = "new_pass" name = "new_pass" class="col-sm-6" value = "<?php echo $data1['u_password']; ?>">
        </div>
        <?php if(isset($error['u_password'])): ?>
            <div class="text-danger"><?php echo $error['u_password']; ?></div>
        <?php endif; ?>

        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="conf_new_pass" style = "width: 150px;margin:0 20px;"> Nhập mật khẩu mới:</label>
            <input type = "password" id = "conf_new_pass" name = "conf_new_pass" class="col-sm-6" value = "<?php echo $data['confirmPass']; ?>">
        </div>
        <?php if(isset($error['confirmPass'])): ?>
            <div class="text-danger"><?php echo $error['confirmPass']; ?></div>
        <?php endif; ?>
        <input type = "submit" class = "btn btn-success" value = "Xác nhận">
    </form>
</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>