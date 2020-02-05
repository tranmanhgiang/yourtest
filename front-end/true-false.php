<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    // if(!isset($_SESSION['u_id'])){
    //     echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";
    // }
?>
<form class = "container" id = "true-false">
		<div class = "form-group">
			<label for = "ques-type1">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type1" rows = "3"></textarea>
		</div>
		<div class = "form-group">
			<div>Đáp án:</div>
			<input type = "radio" name = "true_ques"/> Đúng<br/>
			<input type = "radio" name = "false_ques"/> Sai
		</div>
		<div class="form-group form-inline">
			<label style="margin-right : 27px;">Độ khó:</label>
			<select class="custom-select my-1 mr-sm-2"  style="width: 50%" name="dokho">
				<option value="easy" selected>Dễ</option>
				<option value="medium">Trung bình</option>
				<option value="difficult">Khó</option>
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
		
			<button type="button" class="btn btn-danger">Thoát</button>
		</div>
	</div>
		
    </form>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>