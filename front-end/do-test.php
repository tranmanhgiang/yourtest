<?php 
  require_once __DIR__.'/../autoloads/autoload.php';
  require_once __DIR__.'/../layouts/header.php';
?>
<script src="../public/js/jquery/jquery-2.2.4.min.js"></script>
<div class="container">
        <div class="left">
            <div class="title"> Chọn nhanh câu hỏi
            </div>
            <div class="contain">
                <div class="cell">1</div>
                <div class="cell">2</div>
                <div class="cell">3</div>
                <div class="cell">4</div>
                <div class="cell">5</div>
                <div class="cell">6</div>
                <div class="cell">7</div>
                <div class="cell">8</div>
                <div class="cell">9</div>
                <div class="cell">10</div>
                <div class="cell">11</div>
                <div class="cell">12</div>
                <div class="cell">13</div>
            </div>
        </div>
        <div class="right">
            <div class="title" style="text-align: center;"> Thời gian</div>
            <div class="contain">
                <div class="top">
                    <div>Câu hỏi 1</div>
                    <div>
                        <input type="checkbox"> Múc độ ổn định
                    </div>

                    <div>
                        <input type="checkbox"> Múc độ ổn định
                    </div>
                    <div>
                        <input type="checkbox"> Múc độ ổn định
                    </div>
                    <div>
                        <input type="checkbox"> Múc độ ổn định
                    </div>

                </div>
                <div class="bottom" style="margin-bottom:10px">
                    <button class="btn" style="float: left;background-color: rgb(28, 221, 228);">Câu
                        trước</button>
                    <button class="btn" style="float:right;;background-color: rgb(28, 148, 228);">Câu
                        sau</button>
                </div>



            </div>

        </div>
    </div>
    <div style="margin-top: 20px; text-align: center">
        <button class="btn" style="background-color: rgb(204, 68, 27)">Kết thúc bài thi</button>
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
  $(document).ready(function() {
    var pass = '123456';
    var x = prompt('Nhập mật khẩu (Nếu không có để trống)');
    if (x == pass) {
  document.getElementsByClassName('containerr')[0].style.display = "inline-block";
    } else {
      alert('Mật khẩu sai! ');
      window.location.replace("http://localhost:4000");
    }
  });
  $(document).ready(function() {
    var a_tag = $('.a_ques');
    for (var i = 0; i < a_tag.length; i++) {
      $(a_tag[i]).attr("href", window.location.href + $(a_tag[i]).attr('href'));
    }
  })

  function functionSubmit() {
    if (confirm("Bạn có chắc chắn nộp bài không ?")) {
      alert('Đã nộp bài !');
      $('#bt_submmit_fake').click();
    }
  }
  window.onload = function() {
    time = 60, r = document.getElementById('timer'), tmp = time;
    setInterval(function() {
      var c = tmp--,
        m = (c / 60) >> 0,
        s = (c - m * 60) + '';
      r.textContent = 'Thời gian làm bài ' + m + ':' + (s.length > 1 ? '' : '0') + s;
      if (tmp <= 0 ) {
        alert('Hết thời gian làm bài !');
        $('#bt_submmit_fake').click();
      }
      tmp != 0 || (tmp = time);

    }, 1000);
  }
</script>

<script>
  $(document).scroll(function() {
    if ($('.left1').offset().top + $('.left1').height() >= $('footer').offset().top - 10)
      $('#left1').css({
        'position': 'absolute',
        'bottom': 0,
        'top': '30px'
      });

    if ($(document).scrollTop() + $('.left1').height() < $('footer').offset().top)
      $('.left1').css({
        'position': 'fixed',
        'top': '100px',
        'bottom': 'auto'
      }); // restore when you scroll up
  });

  function check_input(input) {
    var id = 'b_' + $(input).parent().parent().attr('id');
    $('#' + id).css("background-color", "green");
  }
</script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>