<?php
    require_once __DIR__.'/../layouts/header.php';
?>
	<div class = "container">
		<div class = "text-center">
			<h1 class = "display-4">Chọn dạng câu hỏi</h1>
		</div>
		<ul class = "nav nav-tabs nav-justified" id = "nav" role = "tablist">
			<li class = "nav-item">
				<a href = "#" class = "nav-link h4 mb-0" id = "type-1" aria-controls = "step-1" aria-selected = "true">Dạng 1<br/><small>chọn đúng/sai</small></a>
      		</li>
			<li class = "nav-item">
				<a href = "#" class = "nav-link h4 mb-0" id = "type-2" aria-controls = "step-2" aria-selected = "false">Dạng 2<br/><small>chọn 1 đáp án</small></a>
			</li>
			<li class = "nav-item">
				<a href = "#" class = "nav-link h4 mb-0" id = "type-3" aria-controls = "step-3" aria-selected = "false">Dạng 3<br/><small>chọn nhiều đáp án</small></a>
			</li>
		</ul>
	</div>
<!-- end option -->
	<form class = "container" id = "true-false" style = "display: none;">
		<div class = "form-group">
			<label for = "ques-type1">Nhập câu hỏi:</label>
			<textarea class = "form-control" id = "ques-type1" rows = "3"></textarea>
		</div>
		<div class = "form-group">
			<div>Đáp án:</div>
			<input type = "radio" name = "true_ques"/> Đúng<br/>
			<input type = "radio" name = "true_ques"/> Sai
		</div>
		<button type = "submit" class = "btn btn-success"> Lưu</button>
		<button type = "button" class = "btn btn-danger"> Thoát</button>
	</form>
<!-- end true-false question -->
	
	<form class = "container" id = "choise" style = "display: none;">
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

		
		<input type = "button" class = "btn btn-success" value = "Lưu">
		<button type="button" class="btn btn-danger">Thoát</button>
	</form>
 <!-- end choise question -->

	<form class = "container" id = "multichoise" style = "display: none;">
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
	<div class = "form-group row">
		<div class = "col-sm-10"></div>
		<div class = "col-sm-2">
			<input type = "submit" class = "btn btn-success" value = "Lưu">
		
			<button type="button" class="btn btn-danger">Thoát</button>
		</div>
	</div>
	</form>
<!-- end multichoise question -->

    <script type="text/javascript" src="../public/js/add-question.js"></script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>