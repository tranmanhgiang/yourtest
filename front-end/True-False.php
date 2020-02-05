<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    if(!isset($_SESSION['u_id'])){
        echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";
    }
?>
<?php 
	$q_data = [
		'u_id' => $_SESSION['u_id'],
		'q_content' => postInput('ques-type1'),
		'q_type' => 1,
		'q_linhvuc' => postInput('linhvuc'),
		'q_level' => postInput('dokho')
	];
	$error = [];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($q_data['q_content'] == NULL){
			$error['q_content'] = "Mời bạn nhập câu hỏi";
		}
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)){
		$ques_insert = $db->insert('questions',$q_data);
		if($ques_insert > 0){
			$a_data = [
				'q_id' => $ques_insert,
				'a_data' => postInput('tf_ques'),
				'a_true' => 1
			];
			$ans_insert = $db->insert('answers',$a_data);
			echo  "<script>alert('Thêm thành công!'); location.href='True-False.php'</script>";
		}else{
			$_SESSION['error'] = "Thêm thất bại";
		}
	}
	
?>
<form class = "container" id = "true-false" action = "" method = "POST">
	<p><b style = "font-size: 30px; color: black; ">Kiểu câu hỏi :<small> True or False</small></b></p>
		<div class = "form-group">
			<label for = "ques-type1">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type1" name = "ques-type1" rows = "3"></textarea>
		</div>
		<?php  if(isset($error['q_content'])): ?>
            <div class="text-danger"><?php echo $error['q_content']; ?></div>
        <?php endif; ?>
		<div class = "form-group">
			<div>Đáp án:</div>
			<input type = "radio" name = "tf_ques" value = '1' checked="checked"/> Đúng<br/>
			<input type = "radio" name = "tf_ques" value = '0'/> Sai
		</div>
		<div class="form-group form-inline">
			<label style="margin-right : 27px;">Độ khó:</label>
			<select class="custom-select my-1 mr-sm-2"  style="width: 50%" name="dokho">
				<option value="de" selected>Dễ</option>
				<option value="trungbinh">Trung bình</option>
				<option value="kho">Khó</option>
			</select>
		</div>
		<div class="form-group form-inline">
			<label style="margin-right : 15px;">Lĩnh vực:</label>
			<select class="custom-select my-1 mr-sm-2"  style="width: 42%" name = "linhvuc">
				<option value="toan" selected>Toán</option>
				<option value="ly">Vật lý</option>
				<option value="anh">Tiếng Anh</option>
				<option value="iq">IQ</option>
				<option value="khac" >Khác</option>
			</select>
			<div id="div_khac3" class="form-group form-inline" style="display: none">
				<label style="margin-right : 15px;">Nhập lĩnh vực:</label>
				<input type="text" class="form-control" name = "lv_khac"/>
			</div>
		</div>
		<div class = "form-group row">
		<div class = "col-sm-10"></div>
		<div class = "col-sm-2">
			<input type = "submit" class = "btn btn-success" value = "Lưu">
			<button type="button" class="btn btn-danger"><a href="index.php" style = "color: white; text-decoration:none">Thoát</a></button>
		</div>
	</div>
		
    </form>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>