<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    require_once __DIR__.'/../layouts/header.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_SESSION['u_id'];
        $data = [
            'u_lastName' => postInput('lastName'),
            'u_firstName' => postInput('firstName'),
            'u_description' => postInput('description'),
        ];
        $error = [];
        if(empty($error)){
            if(isset($_FILES['thunbar'])){
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if($file_erro == 0){
                    $part = ROOT ."avt/";
                    $data['thunbar'] = $file_name;
                }
            }
            $update_id = $db->update('users',$data, "u_id = $id ");
            if($update_id > 0){
                $_SESSION['u_firstName'] = $data['u_firstName'];
                $_SESSION['u_lastName'] = $data['u_lastName'];
                $_SESSION['u_description'] = $data['u_description'];
                $_SESSION['thunbar'] = $file_name;
                $_SESSION['success'] = "Cập nhật thành công!";
            }else{
                $_SESSION['error'] = "Cập nhật thất bại! Bạn chưa chọn hình ảnh";
            }
        }
    }
?>
<?php 
    require_once __DIR__.'/../notification/notification.php';
    
?>

<div class = "container" style = "margin-top:20px;">
        <div class="tab">
        <button class="tablinks" onclick="display_info(event, 'user_info')" id="defaultOpen">
            <i class="fa fa-user"></i>
            <a ></aclass> Thông tin cá nhân</a>
        </button>
        <button class="tablinks" onclick="display_info(event, 'info_edit')">
            <i class="fa fa-pencil"></i>
            <a> Chỉnh sửa thông tin</a>
        </button>
        <button class="tablinks" onclick="display_info(event, 'do_test')">
            <i class="fa fa-book"></i>
            <a> Lịch sử làm bài</a>
        </button>
        <button class="tablinks" onclick="display_info(event, 'ques_post')">
            <i class="fa fa-question-circle"></i>
            <a> Số câu hỏi đã đăng</a>

        </button>
        </div>
   
<div id="user_info" class="profile-content">
    <p><b style = "font-size: 30px;padding-left:275px;">Thông tin cá nhân</b></p>
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="../public/uploads/avt/<?php echo $_SESSION['thunbar'] ?>"  class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php if(isset($_SESSION['u_id'])): ?>
                    <?php echo $_SESSION['u_firstName'] . ' ' . $_SESSION['u_lastName']; ?>
                <?php endif; ?>
            </div>
            <div class="profile-usertitle-job">
                <?php echo ($_SESSION['u_role'] == 0 ? "Thành Viên" : "Admin"); ?>
            </div>
        </div>
    </div>
    <p><b>Họ tên : </b>
        <?php if(isset($_SESSION['u_id'])): ?>
            <?php echo $_SESSION['u_firstName'] . ' ' . $_SESSION['u_lastName']; ?>
        <?php endif; ?>
    </p>
    <p><b>Email : </b>
        <?php if(isset($_SESSION['u_id'])): ?>
            <?php echo $_SESSION['u_email']; ?>
        <?php endif; ?>  
    </p>
    <p><b>Mô tả bản thân : </b>
        <?php if(isset($_SESSION['u_id'])): ?>
            <?php echo $_SESSION['u_description']; ?>
        <?php endif; ?> 
    </p>
</div>

<div id="info_edit" class="profile-content" style = "display: none;">
    <p><b style = "font-size: 30px;">Chỉnh sửa thông tin cá nhân</b></p>
    <form action="" method = "POST" enctype="multipart/form-data">
        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="firstName" style = "width: 150px;margin:0 20px;"> Nhập họ:</label>
            <input type = "text" id = "firstName" name = "firstName" class="col-sm-6" value = "<?php echo $_SESSION['u_firstName']; ?>">
        </div>
        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="lastName" style = "width: 150px;margin:0 20px;"> Nhập tên:</label>
            <input type = "text" id = "lastName" name = "lastName" class="col-sm-6" value = "<?php echo $_SESSION['u_lastName']; ?>">
        </div>
           <div class="row form-group">
                <label for="inputEmail3" style = "width: 150px;margin:0 20px;">Hình ảnh</label>
                    <input type="file" class="col-sm-6" id="inputEmail3" name = "thunbar">
           </div>
            <?php if(isset($error['thunbar'])):?>
                <p class = "text-danger"><?php echo $error['thunbar'];?></p>
            <?php endif?>
        <div class = "row form-group">
            <label for="description" style = "width: 150px;margin:0 20px;"> Mô tả về bản thân</label>
            <textarea id = "description" name = "description" class="col-sm-6" style ="height:100px;" ><?php echo $_SESSION['u_description']; ?></textarea>
        </div>
        <button type = "submit" class = "btn btn-success" name = "reload" style = "margin:0 20px;" onclick = "confirmation()">Thay đổi</button>
    </form>
</div>


<?php 
    $test = $db->fetchJoin("do_test dt","tests t","dt.t_id = t.t_id","dt.u_id = '".$_SESSION['u_id']."' ");
    $temp = $db->countQuestions("do_test","u_id = '".$_SESSION['u_id']."' ");
    $total = $temp['count'];
?>
<div id="do_test" class="profile-content" style = "display: none;">
    <p><b>Tổng số bài đã thi</b>: <?php echo $total; ?></p>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Mã Đề</th>
            <th scope="col">Tên đề thi </th>
            <th scope="col">Điểm</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($test as $item): ?>
            <tr>
                <td><?php echo $item['t_id']; ?></td>
                <td><?php echo $item['t_name']; ?></td>
                <td><?php echo $item['mark']; ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<div id="ques_post" class="profile-content" style = "display: none;">

<?php 
    $ques = $db->fetchAll("questions","u_id = '".$_SESSION['u_id']."' ");
    
    $temp = $db->countQuestions("questions","u_id = '".$_SESSION['u_id']."' ");
    $total = $temp['count'];
    
?>
    <p><b>Số câu hỏi đã đăng: <?php echo $total; ?></b></p>
    
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Câu hỏi</th>
            <th scope="col">Kiểu</th>
            <th scope="col">Lĩnh Vực</th>
            <th scope="col">Độ Khó</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 1; foreach($ques as $item): ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $item['q_content']; ?></td>
                <td><?php echo ($item['q_type'] == 1 ? 'Đúng/Sai' : ($item['q_type'] == 2 ? 'Chọn 1 đáp án' : 'Chọn nhiều đáp án' )); ?></td>
                <td><?php echo $item['q_linhvuc']; ?></td>
                <td><?php echo $item['q_level']; ?></td>
                <td>
                    <a class = "btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['q_id']; ?>" ><i class = "fa fa-times"></i> Xóa</a>
                </td>
            </tr>
        <?php $stt++; endforeach;?>
        </tbody>
    </table>
    <div class="pull-right">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>
<script type = "text/javascript" src = "../public/front-end/js/profile.js"></script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>
