<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    // if(!isset($_SESSION['u_id'])){
    //     echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";
    // }
?>
<form class = "container" id = "choise">
		<div class = "form-group">
			<label for = "ques-type2">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type2" rows = "3"></textarea>
		</div>
		<div class = "form-group row">
			<div class = "col-sm-2">Nhập đáp án:</div>
			<div class = "col-sm-6"></div>
			<div>Đáp án đúng</div>
		</div>
		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="id1">A: </label> 				
			<input class="form-control col-sm-6" type="text" id="id1"> 
			<input type = "radio" name = "single_true" class = "col-sm-3"> 
		</div>
		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="id2">B: </label> 
			<input class="form-control col-sm-6" type="text" id="id2"> 
			<input type = "radio" name = "single_true" class = "col-sm-3"> 
		</div>
		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="id3">C: </label> 	
			<input class="form-control col-sm-6" type="text" id="id3">
			<input type = "radio" name = "single_true" class = "col-sm-3"> 
		</div>
		<div class="form-group has-success row"> 
			<label class="control-label col-sm-1" for="id4">D: </label>
			<input class="form-control col-sm-6" type="text" id="id4"> 
			<input type = "radio" name = "single_true" class = "col-sm-3"> 
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
		
			<button type="button" class="btn btn-danger">Thoát</button>
		</div>
	</div>
    </form>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>