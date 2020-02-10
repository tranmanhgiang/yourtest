<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    if(!isset($_SESSION['u_id'])){
        echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
    }
?>
<?php 
	$data_print = [
		'ans1' => postInput('ans1'),
		'ans2' => postInput('ans2'),
		'ans3' => postInput('ans3'),
		'ans4' => postInput('ans4')
	];
	$q_data = [
		'u_id' => $_SESSION['u_id'],
		'q_content' => postInput('ques-type2'),
		'q_type' => 2,
		'q_linhvuc' => postInput('linhvuc'),
		'q_level' => postInput('dokho')
	];
	$arr = [];
	$error = [];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($q_data['q_content'] == NULL){
			$error['q_content'] = 'Mời bạn nhập câu hỏi';
		}
		for($i = 1 ; $i <= 4; $i ++){
			$ans = 'ans' . $i;
			
			$arr[$i] = postInput($ans);
			if($arr[$i] == NULL){
				$error[$ans] = "Mời bạn nhập đáp án";
			}
			for($j = $i+1; $j <= 4 ; $j ++){
				$answer = 'ans' . $j;
				if(postInput($ans) === postInput($answer)){
					$error[$answer . $j] = "Đáp án bị trùng! Mời bạn nhập đáp án khác";
				}
			}
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error)){
		$check = $db->fetchOne("questions"," q_content = '".$q_data['q_content']."'");
		if($check != NULL){
			$_SESSION['error'] = "Thêm thất bại! Câu hỏi đã tồn tại trong ngân hàng câu hỏi";
		}else{
			$ques_insert = $db->insert("questions",$q_data);
			if($ques_insert > 0){
				for($i = 1 ; $i <= 4; $i ++){
					$ans = 'ans' . $i;
					$ans_data = [
						'q_id' => $ques_insert,
						'a_data' => postInput($ans),
						'a_true' => postInput('single_choice') == $i ? '1' : '0'
					];
					$ans_insert = $db->insert("answers",$ans_data);
				}
				echo  "<script>alert('Thêm thành công!'); location.href='SingleChoice.php'</script>";
			}else{
				$_SESSION['error'] = "Thêm thất bại!";
			}
		}
	}
?>
<?php 
	require_once __DIR__.'/../notification/notification.php';
?>
<form class = "container" id = "singlechoise" action = "" method = "POST">
	<p><b style = "font-size: 30px; color: black; ">Kiểu câu hỏi :<small> Single Choice</small></b></p>
		<div class = "form-group">
			<label for = "ques-type2">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type2" name = "ques-type2" rows = "3"><?php echo $q_data['q_content'] ?></textarea>
		</div>
		<?php  if(isset($error['q_content'])): ?>
            <div class="text-danger"><?php echo $error['q_content']; ?></div>
        <?php endif; ?>
		<div class = "form-group row">
			<div class = "col-sm-2">Nhập đáp án:</div>
			<div class = "col-sm-6"></div>
			<div>Đáp án đúng</div>
		</div>
		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="ans1">A: </label> 				
			<input class="form-control col-sm-6" type="text" id="ans1" name = "ans1" value = "<?php echo $data_print['ans1'] ?>" > 
			<input type = "radio" name = "single_choice" class = "col-sm-3" value = "1" checked = "checked"> 
		</div>
		<?php  if(isset($error['ans1'])): ?>
        	<div class="text-danger"><?php echo $error['ans1']; ?></div>
        <?php endif; ?>

		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="ans2">B: </label> 
			<input class="form-control col-sm-6" type="text" id="ans2" name = "ans2" value = "<?php echo $data_print['ans2'] ?>"> 
			<input type = "radio" name = "single_choice" class = "col-sm-3" value = "2"> 
		</div>
		<?php  if(isset($error['ans2'])): ?>
        	<div class="text-danger"><?php echo $error['ans2']; ?></div>
		<?php elseif(isset($error['ans22'])): ?>
			<div class="text-danger"><?php echo $error['ans22']; ?></div>
        <?php endif; ?>

		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="ans3">C: </label> 	
			<input class="form-control col-sm-6" type="text" id="ans3" name = "ans3" value = "<?php echo $data_print['ans3'] ?>">
			<input type = "radio" name = "single_choice" class = "col-sm-3" value = "3"> 
		</div>
		<?php  if(isset($error['ans3'])): ?>
        	<div class="text-danger"><?php echo $error['ans3']; ?></div>
		<?php elseif(isset($error['ans33'])): ?>
			<div class="text-danger"><?php echo $error['ans33']; ?></div>
        <?php endif; ?>

		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="ans4">D: </label>
			<input class="form-control col-sm-6" type="text" id="ans4" name = "ans4" value = "<?php echo $data_print['ans4'] ?>"> 
			<input type = "radio" name = "single_choice" class = "col-sm-3" value = "4"> 
		</div>
		<?php  if(isset($error['ans4'])): ?>
        	<div class="text-danger"><?php echo $error['ans4']; ?></div>
		<?php elseif(isset($error['ans44'])): ?>
			<div class="text-danger"><?php echo $error['ans44']; ?></div>
        <?php endif; ?>

		<div class="form-group form-inline">
			<label style="margin-right : 27px;">Độ khó:</label>
			<select class="custom-select my-1 mr-sm-2"  style="width: 50%" name="dokho">
				<option value="de" selected>Dễ</option>
				<option value="tb">Trung bình</option>
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