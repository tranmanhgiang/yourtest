<?php
	require_once __DIR__.'/../autoloads/autoload.php';
	require_once __DIR__.'/../layouts/header.php';
    if(!isset($_SESSION['u_id'])){
        echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";
    }
?>
<form class = "container" id = "multiplechoise">
	<p><b style = "font-size: 30px; color: black; ">Kiểu câu hỏi :<small> Multiple Choice</small></b></p>
		<div class = "form-group">
			<label for = "ques-type3">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type3" rows = "3"></textarea>
		</div>
		<div>
		<div class = "form-group row">
			<div class = "col-sm-2">Nhập đáp án:</div>
			<div class = "col-sm-6"></div>
			<div >Đáp án đúng</div>
		</div>
			<div class="form-group has-success " id = "ans1"> 
				<label class="control-label col-sm-1" for="a">A: </label>
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="a"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true"/>
				</div>
				<input type = "button" class = "btn btn-success" id = "add1" value = "Thêm">
			</div>

			<div class="form-group has-success " id = "ans2" style = "display: none;"> 
				<label class="control-label col-sm-1" for="b">B: </label> 
				<div class = "row"> 				
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="b"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true"/>
				</div>
				<input type = "button" class = "btn btn-success" id = "add2" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del2">Xóa</button>
			</div>

			<div class="form-group has-success " id = "ans3" style = "display: none;"> 
				<label class="control-label col-sm-1" for="c">C: </label> 				
				<div class = "row">	
					<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="c"> 
					<div class = "col-sm-2"></div>
					<input type ="checkbox" name = "mul_true"/>
				</div>
				<input type = "button" class = "btn btn-success" id = "add3" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del3">Xóa</button>
			</div>

			<div class="form-group has-success" id = "ans4" style = "display: none;"> 
				<label class="control-label col-sm-1" for="d" >D: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="d"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div> 
				<input type = "button" class = "btn btn-success" id = "add4" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del4">Xóa</button>
			</div>
			<div class="form-group has-success" id = "ans5" style = "display: none;"> 
				<label class="control-label col-sm-1" for="e">E: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="e"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div>
				<input type = "button" class = "btn btn-success" id = "add5" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del5">Xóa</button> 
			</div>
			<div class="form-group has-success" id = "ans6" style = "display: none;"> 
				<label class="control-label col-sm-1" for="f">F: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="f"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div>
				<input type = "button" class = "btn btn-success" id = "add6" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del6">Xóa</button>
			</div>
			<div class="form-group has-success" id = "ans7" style = "display: none;"> 
				<label class="control-label col-sm-1" for="g">G: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="g"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div> 
				<input type = "button" class = "btn btn-success" id = "add7" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del7">Xóa</button>
			</div>
			<div class="form-group has-success" id = "ans8" style = "display: none;"> 
				<label class="control-label col-sm-1" for="h">H: </label> 				
                <div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="h"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div>
				<input type = "button" class = "btn btn-success" id = "add8" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del8">Xóa</button>
			</div>
			<div class="form-group has-success " id = "ans9" style = "display: none;"> 
				<label class="control-label col-sm-1" for="i">I: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="i"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div>
				<input type = "button" class = "btn btn-success" id = "add9" value = "Thêm">
				<button type="button" class="btn btn-danger" id = "del9">Xóa</button>
			</div>
			<div class="form-group has-success " id = "ans10" style = "display: none;"> 
				<label class="control-label col-sm-1" for="j">J: </label> 				
				<div class = "row"> 				
						<input class="form-control col-sm-6" style = "margin-left: 10px;" type="text" id="j"> 
						<div class = "col-sm-2"></div>
						<input type ="checkbox" name = "mul_true"/>
					</div> 
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