<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    if(!isset($_SESSION['u_id'])){
        echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
    }
?>
<?php 
	$q_data = [
		'u_id' => $_SESSION['u_id'],
		'q_content' => postInput('ques-type3'),
		'q_type' => 3,
		'q_linhvuc' => postInput('linhvuc'),
		'q_level' => postInput('dokho')
	];

	$count = 0;
	for($i = 1; $i <= 10; $i ++){
		if(postInput('ans'. $i) != NULL){
			$count++;
		}
	}


	$arr_check = [];
	for($i = 1 ; $i <= $count; $i ++){
		if(!empty(postInput('mul_true'.$i))){
			$arr_check[$i] = postInput('mul_true'.$i);
		}
	}

	$error = [];
	$arr = [];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($q_data['q_content'] == NULL){
			$error['q_content'] = 'Mời bạn nhập câu hỏi';
		}
		if(empty($arr_check)){
			$_SESSION['true_answers'] = "Bạn chưa xác định những đáp án đúng";
		}
		if($count == 0){
			$error['answers'] = "Bạn chưa nhập đáp án";
		}
		for($i = 1 ; $i <= $count; $i ++){
			$ans = 'ans' . $i;
			
			$arr[$i] = postInput($ans);
			for($j = $i+1; $j <= $count ; $j ++){
				$answer = 'ans' . $j;
				if(postInput($ans) === postInput($answer)){
					$_SESSION['answers'] = "Đáp án bị trùng! Mời bạn chỉnh sửa lại các đáp án";
				}
			}
		}
	}


	if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($error) && !isset($_SESSION['true_answers']) && !isset($_SESSION['answers'])){
		$check = $db->fetchOne("questions"," q_content = '".$q_data['q_content']."'");
		if($check != NULL){
			$_SESSION['error'] = "Thêm thất bại! Câu hỏi đã tồn tại trong ngân hàng câu hỏi";
		}else{
			$ques_insert = $db->insert("questions",$q_data);
			if($ques_insert > 0){
				for($i = 1 ; $i <= $count; $i ++){
					$ans = 'ans' . $i;
					$ans_data = [
						'q_id' => $ques_insert,
						'a_data' => postInput($ans),
						'a_true' => $arr_check[$i] == $i ? '1' : '0'
					];
					$ans_insert = $db->insert("answers",$ans_data);
				}
				echo  "<script>alert('Thêm thành công!'); location.href='MultipleChoice.php'</script>";
			}else{
				$_SESSION['error'] = "Thêm thất bại!";
			}
		}
	}
	$temp1 = postInput('ans1');
	$temp2 = postInput('ans2');
	$temp3 = postInput('ans3');
	$temp4 = postInput('ans4');
	$temp5 = postInput('ans5');
	$temp6 = postInput('ans6');
	$temp7 = postInput('ans7');
	$temp8 = postInput('ans8');
	$temp9 = postInput('ans9');
	$temp10 = postInput('ans10');
	
?>

<?php 
	require_once __DIR__.'/../notification/notification.php';
?>
<form class = "container" id = "multiplechoise" action = "" method = "POST">
	<p><b style = "font-size: 30px; color: black; ">Kiểu câu hỏi :<small> Multiple Choice</small></b></p>
		<div class = "form-group">
			<label for = "ques-type3">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type3" name = "ques-type3" rows = "3"><?php echo $q_data['q_content']; ?></textarea>
		</div>
		<?php  if(isset($error['q_content'])): ?>
            <div class="text-danger"><?php echo $error['q_content']; ?></div>
        <?php endif; ?>
		<div>
		<div class = "form-group row">
			<div class = "col-sm-2">Nhập đáp án:</div>
			<div class = "col-sm-6"></div>
			<div >Đáp án đúng</div>
		</div>
			<div class="form-group has-success " id = "ans1"> 
				<label class="control-label col-sm-1" for="a">A: </label>
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="a" name = "ans1" value = "<?php echo $temp1; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true1" value = "1"/>
				</div>
				<?php if(isset($error['answers'])): ?>
					<div class="text-danger"><?php echo $error['answers']; ?></div>
				<?php endif;?>
				<input type = "button" class = "btn btn-success" id = "add1" value = "Thêm">
			</div>

			<div class="form-group has-success " id = "ans2" style = "display: none;"> 
				<label class="control-label col-sm-1" for="b">B: </label> 
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="b" name = "ans2" value = "<?php echo $temp2; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true2" value = "2"/>
				</div>
				<?php if(isset($error['ans2'])): ?>
					<div class="text-danger"><?php echo $error['ans2']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add2" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del2">Xóa</button>
			</div>

			<div class="form-group has-success " id = "ans3" style = "display: none;"> 
				<label class="control-label col-sm-1" for="c">C: </label> 				
				<div class = "row">	
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="c" name = "ans3" value = "<?php echo $temp3; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true3" value = "3"/>
				</div>
				<?php if(isset($error['ans3'])): ?>
					<div class="text-danger"><?php echo $error['ans3']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add3" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del3">Xóa</button>
			</div>

			<div class="form-group has-success" id = "ans4" style = "display: none;"> 
				<label class="control-label col-sm-1" for="d" >D: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="d" name = "ans4" value = "<?php echo $temp4; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true4" value = "4"/>
				</div> 
				<?php if(isset($error['ans4'])): ?>
					<div class="text-danger"><?php echo $error['ans4']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add4" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del4">Xóa</button>
			</div>

			<div class="form-group has-success" id = "ans5" style = "display: none;"> 
				<label class="control-label col-sm-1" for="e">E: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="e" name = "ans5" value = "<?php echo $temp5; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true5" value = "5"/>
				</div>
				<?php if(isset($error['ans5'])): ?>
					<div class="text-danger"><?php echo $error['ans5']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add5" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del5">Xóa</button> 
			</div>

			<div class="form-group has-success" id = "ans6" style = "display: none;"> 
				<label class="control-label col-sm-1" for="f">F: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="f" name = "ans6" value = "<?php echo $temp6; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true6" value = "6"/>
				</div>
				<?php if(isset($error['ans6'])): ?>
					<div class="text-danger"><?php echo $error['ans6']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add6" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del6">Xóa</button>
			</div>

			<div class="form-group has-success" id = "ans7" style = "display: none;"> 
				<label class="control-label col-sm-1" for="g">G: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="g" name = "ans7" value = "<?php echo $temp7; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true7" value = "7"/>
				</div> 
				<?php if(isset($error['ans7'])): ?>
					<div class="text-danger"><?php echo $error['ans7']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add7" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del7">Xóa</button>
			</div>

			<div class="form-group has-success" id = "ans8" style = "display: none;"> 
				<label class="control-label col-sm-1" for="h">H: </label> 				
                <div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="h" name = "ans8" value = "<?php echo $temp8; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true8" value = "8"/>
				</div>
				<?php if(isset($error['ans8'])): ?>
					<div class="text-danger"><?php echo $error['ans8']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add8" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del8">Xóa</button>
			</div>

			<div class="form-group has-success " id = "ans9" style = "display: none;"> 
				<label class="control-label col-sm-1" for="i">I: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="i" name = "ans9" value = "<?php echo $temp9; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true9" value = "9"/>
				</div>
				<?php if(isset($error['ans9'])): ?>
					<div class="text-danger"><?php echo $error['ans9']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add9" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del9">Xóa</button>
			</div>

			<div class="form-group has-success " id = "ans10" style = "display: none;"> 
				<label class="control-label col-sm-1" for="j">J: </label> 				
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="j" name = "ans10" value = "<?php echo $temp10; ?>"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true10" value = "10"/>
				</div> 
				<?php if(isset($error['ans10'])): ?>
					<div class="text-danger"><?php echo $error['ans10']; ?></div>
				<?php endif; ?>
				<input type = "button" class = "btn btn-success" id = "add10" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del10">Xóa</button>
			</div>
		</div>
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
    <script type="text/javascript" src="../public/js/multipleChoice.js"></script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>