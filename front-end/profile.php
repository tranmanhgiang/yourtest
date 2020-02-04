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
        $update_id = $db->update('users',$data, "u_id = $id ");
        if($update_id > 0){
            $_SESSION['success'] = "Cập nhật thành công!";
        }else{
            $_SESSION['error'] = "Cập nhật thất bại!";
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
            <a> Số bài đã thi</a>
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
            <img src="../public/img/bg-img/t3.jpg" class="img-responsive" alt="">
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
                <?php echo (isset($_SESSION['u_role']) == 0 ? "Thành Viên" : "Admin"); ?>
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
    <form action="" method = "POST" >
        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="firstName" style = "width: 150px;margin:0 20px;"> Nhập họ:</label>
            <input type = "text" id = "firstName" name = "firstName" class="col-sm-6" value = "<?php echo $_SESSION['u_firstName']; ?>">
        </div>
        <div class = "row form-group" style = "margin-top:20px; ">
            <label for="lastName" style = "width: 150px;margin:0 20px;"> Nhập tên:</label>
            <input type = "text" id = "lastName" name = "lastName" class="col-sm-6" value = "<?php echo $_SESSION['u_lastName']; ?>">
        </div>
        <div class = "row form-group">
            <label for="description" style = "width: 150px;margin:0 20px;"> Mô tả về bản thân</label>
            <textarea id = "description" name = "description" class="col-sm-6" style ="height:100px;" ><?php echo $_SESSION['u_description']; ?></textarea>
        </div>
        <button type = "submit" class = "btn btn-success" style = "margin:0 20px;">Thay đổi</button>
    </form>
</div>



<div id="do_test" class="profile-content" style = "display: none;">
    <p><b>Tổng số bài đã thi</b>: 10</p>
    <p><b>Môn thi:</b></p>
        <ul style = "list-style: none">Toán
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
        </ul>
        <ul style = "list-style: none">Lý
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
        </ul>
        <ul style = "list-style: none">Hóa
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
        </ul>
        <ul style = "list-style: none">Tiếng Anh
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
        </ul>
        <ul style = "list-style: none">IQ
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
            <li><a href = "#">Đề 1</a></li>
        </ul>
    </ul></p>
</div>
<div id="ques_post" class="profile-content" style = "display: none;">
    <p><b>Số câu hỏi đã đăng:</b>7</p>
    <p>Chi tiết: </p>
    <p><div><b>Câu 1:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 2:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 3:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 4:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 5:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 6:</b>What là cái gì?</div>
        <div>A: Đúng  </div>
        <div>B:Sai</div>
        <div>=> Đáp án đúng: A</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    <p><div><b>Câu 7:</b>What là cái gì?</div>
        <div>A: a</div>
        <div>B: b</div>
        <div>C: c</div>
        <div>D: d</div>
        <div>E: e</div>
        <div>F: f</div>
        <div>=> Đáp án đúng: A,B,C</div>
    </p>
    
</div>
</div>
<script type = "text/javascript" src = "../public/js/profile.js"></script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>
