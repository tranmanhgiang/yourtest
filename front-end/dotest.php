<?php 
  require_once __DIR__.'/../autoloads/autoload.php';
  require_once __DIR__.'/../layouts/header.php';
  if(!$_SESSION['u_id']){
    echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
  }
?>
<script src="../public/js/jquery/jquery-2.2.4.min.js"></script>
<div class="containerr">
  <div class="left1">
    <div class="title1"> Chọn nhanh câu hỏi
    </div>
    <div class="contain1">
      
      <a href="#q1"><button class="cell1">1</button></a>
      <a href="#q2"><button class="cell1">2</button></a>
      <a href="#q3"><button class="cell1">3</button></a>
    </div>
    <div class="title1" style="text-align: center;" id="timer">
    </div>
  </div>

  <div class="right1">
    <h4 style="text-align: center"></h4>
    <div class="contain1">
      <form action="/tests/success" method="post">
      <div class="top1" >
        <div id="q1"><b>Câu 1: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="1">
        <label class="form-check-label" >A.Đúng</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="0" >
        <label class="form-check-label" >B.Sai</label>
      </div>
    </div>
    <div class="top1">
      <div id="q2"><b>Câu 2: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="radio">
        <label class="form-check-label" ></label>
      </div>
    </div>
    <div class="top1" >
      <div id="q3"><b>Câu 3: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" >
        <label class="form-check-label"></label>
      </div>
    </div>
    <div class="top1" >
      <div id="q3"><b>Câu 3: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" >
        <label class="form-check-label"></label>
      </div>
    </div>
    <div class="top1" >
      <div id="q3"><b>Câu 3: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" >
        <label class="form-check-label"></label>
      </div>
    </div>
    <div class="top1" >
      <div id="q3"><b>Câu 3: What is your name?</div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" >
        <label class="form-check-label"></label>
      </div>
    </div>
    

  </div>
</div>
</div>
<input style="display: none" name = 'total_ques' type="text" />
<input style="display: none" name = 'name_test' type="text" />
<input style="display: none" name = 'test_id' type="text" />
<div style="margin-top: 20px;margin-bottom: 15px; text-align: center">
  <button class="btn btn-success " onclick="functionSubmit()" type="button">Kết thúc bài thi</button>
  <button style="display: none" id="bt_submmit_fake"></button>
</div>
</form>
<script>
  // $(document).ready(function() {
  //   var pass = '123456';
  //   var x = prompt('Nhập mật khẩu (Nếu không có để trống)');
  //   if (x == pass) {
  // document.getElementsByClassName('containerr')[0].style.display = "inline-block";
  //   } else {
  //     alert('Mật khẩu sai! ');
  //     window.location.replace("http://localhost:4000");
  //   }
  // });
  // $(document).ready(function() {
  //   var a_tag = $('.a_ques');
  //   for (var i = 0; i < a_tag.length; i++) {
  //     $(a_tag[i]).attr("href", window.location.href + $(a_tag[i]).attr('href'));
  //   }
  // })

  // function functionSubmit() {
  //   if (confirm("Bạn có chắc chắn nộp bài không ?")) {
  //     alert('Đã nộp bài !');
  //     $('#bt_submmit_fake').click();
  //   }
  // }
  // window.onload = function() {
  //   time = 60, r = document.getElementById('timer'), tmp = time;
  //   setInterval(function() {
  //     var c = tmp--,
  //       m = (c / 60) >> 0,
  //       s = (c - m * 60) + '';
  //     r.textContent = 'Thời gian làm bài ' + m + ':' + (s.length > 1 ? '' : '0') + s;
  //     if (tmp <= 0 ) {
  //       alert('Hết thời gian làm bài !');
  //       $('#bt_submmit_fake').click();
  //     }
  //     tmp != 0 || (tmp = time);

  //   }, 1000);
  // }
</script>

<script>
  // $(document).scroll(function() {
  //   if ($('.left1').offset().top + $('.left1').height() >= $('footer').offset().top - 10)
  //     $('#left1').css({
  //       'position': 'absolute',
  //       'bottom': 0,
  //       'top': '30px'
  //     });

  //   if ($(document).scrollTop() + $('.left1').height() < $('footer').offset().top)
  //     $('.left1').css({
  //       'position': 'fixed',
  //       'top': '100px',
  //       'bottom': 'auto'
  //     }); // restore when you scroll up
  // });

  function check_input(input) {
    var id = 'b_' + $(input).parent().parent().attr('id');
    $('#' + id).css("background-color", "green");
  }
</script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>