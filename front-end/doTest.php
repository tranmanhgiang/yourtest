<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    require_once __DIR__.'/../layouts/header.php';
    
    $id = intval(getInput('id')); 
    $temp = $db->countQuestions("tests_questions","t_id = $id ");
    $total = $temp['count'];

    $get_ques = $db->fetchJoin("questions q","tests_questions tq","q.q_id = tq.q_id","tq.t_id = $id");
    $get_test = $db->fetchAll("tests","t_id = $id");
    $mark = 0;
  foreach($get_ques as $item){
    $a_true = [];
    $ans = [];
    $data = [];
    if($item['q_type'] == 1){
      $data[$item['q_id']] = postInput('ans1' . $item['q_id']);
      $check = $db->countQuestions("answers","a_data = '".$data[$item['q_id']]."' AND q_id = '".$item['q_id']."' AND a_true = 1");
      if($check['count'] != 0){
        $mark ++;
      }
    }
    if($item['q_type'] == 2){
      $data[$item['q_id']] = postInput('ans2' . $item['q_id']);
      $check = $db->countQuestions("answers","a_data = '".$data[$item['q_id']]."' AND q_id = '".$item['q_id']."' AND a_true = 1");
      if($check['count'] != 0){
        $mark ++;
      }
    }

    if($item['q_type'] == 3){
      if(!empty(postInput('ans3' . $item['q_id']))){
        foreach(postInput('ans3' . $item['q_id']) as $select){
        $ans[] = $select; 
        }
      }

      $check = $db->fetchAll("answers","q_id = '".$item['q_id']."' AND a_true = 1");
      foreach($check as $i){
        $a_true[] = $i['a_data'];
      }
      $result = array_diff($ans,$a_true);
      $reverse_compare = array_diff($a_true,$ans);
      if(empty($result) && empty($reverse_compare)){
        $mark++;
      }
    }
  }
  $point = $mark*(10/$total);

  $complete = [
    'u_id' => $_SESSION['u_id'],
    't_id' => $id,
    'mark' => $point
  ];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ins_test = $db->insert("do_test",$complete);
  }

  
  
?>
<script src="../public/js/jquery/jquery-2.2.4.min.js"></script>

<div class="containerr"> 
  <div class="left1">
    <div class="title1"> Chọn nhanh câu hỏi
    </div>
    <div class="contain1">
      <?php for($i = 1; $i <= $total; $i++): ?>
        <a href="#q<?php echo $i; ?>"><button class="cell1" id = "b_q<?php echo $i; ?>"><?php echo $i; ?></button></a>
      <?php endfor; ?>
    </div>
    <div class="title1" style="text-align: center;" id="timer">
    </div>
  </div>
  <form action="" method = "post">
  <div class="right1" style = "background-color:lightblue;">
    <h4 style="text-align: center"><b><?php echo $get_test[0]['t_name']; ?></b></h4>
    <div class="contain1">
     
     <?php $stt = 1; foreach($get_ques as $item): ?>
      <div class="top1" id = "q<?php echo $stt ?>">
     <div class="question" id = "q<?php echo $stt ?>"><b>Câu <?php echo $stt; ?> : <?php echo $item['q_content']; ?></b></div>
     <div class="row">
        <?php if($item['q_type'] == 1): ?>
            <div class="col-md-6">
                 <input type="radio" name = "ans1<?php echo $item['q_id'] ?>" onclick="check_input(this)" value = "1"> <label class="STT">A. Đúng</label>
            </div>
            <div class="col-md-6">
                 <input type="radio" name = "ans1<?php echo $item['q_id'] ?>" onclick="check_input(this)" value = "0"> <label class="STT">B. Sai</label>
            </div>
            <?php elseif($item['q_type'] == 2): ?>
            <?php $get_ans = $db->fetchJoin("questions","answers","questions.q_id = answers.q_id"," questions.q_content = '".$item['q_content']."' " ); ?>
            <?php $i = 0; foreach($get_ans as $ele): ?>
            <div class="col-md-6">
                 <input type="radio" name = "ans2<?php echo $item['q_id'] ?>" onclick="check_input(this)" value = "<?php echo $ele['a_data']; ?>"> <label class="STT"><?php echo chr(($i++)+ 65).'. ' .$ele['a_data'] ?></label>
            </div>
            <?php endforeach; ?>
            <?php elseif($item['q_type'] == 3): ?>
            <?php $get_ans = $db->fetchJoin("questions","answers","questions.q_id = answers.q_id"," questions.q_content = '".$item['q_content']."' " ); ?>
            <?php $i = 0; foreach($get_ans as $ele): ?>
            <div class="col-md-6">
                 <input type="checkbox" onclick="check_input(this)" name = "ans3<?php echo $item['q_id'] ?>[]" value = "<?php echo $ele['a_data']; ?>"> <label class="STT"><?php echo chr(($i++)+ 65).'. ' .$ele['a_data'] ?></label>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
      </div>
            </div>
    <?php $stt++ ;endforeach;?>

              

    </div>
  </div>
</div>
<!-- pagination -->

  
  <div class="container">
      <input style="display: none" name = 'total_ques' type="text"  value = "<?php echo $total; ?>" />
      <input style="display: none" name = 'name_test' type="text" value = "<?php echo $get_test[0]['t_name']; ?>"/>
      <input style="display: none" name = 'test_id' type="text" />
      <div style="margin: 20px 750px; text-align: center" >
        <button class="btn btn-success " onclick="functionSubmit()" type="button">Nộp bài</button>
        <button style="display: none" id="bt_submmit_fake" type = "submit"></button>
      </div>
      </div>

</form>
<script>
  $(document).ready(function() {
    var pass = '<?php echo ($get_test[0]['t_password']);  ?>';
    if(pass != ''){
    var x = prompt('Nhập mật khẩu');
    if (x == pass) {
  document.getElementsByClassName('containerr')[0].style.display = "inline-block";
    } else {
      alert('Mật khẩu sai! ');
      window.location.replace("http://localhost/yourtest/front-end/optionTest.php");
    }
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
      alert("Đã nộp bài");
      $('#bt_submmit_fake').click();
      location.href = "result.php";
    }
  }

  window.onload = function() {
    time = <?php echo ($get_test[0]['t_time']); ?> * 60, r = document.getElementById('timer'), tmp = time;
    setInterval(function() {
      var c = tmp--,
        m = (c / 60) >> 0,
        s = (c - m * 60) + '';
      r.textContent = 'Thời gian làm bài ' + m + ':' + (s.length > 1 ? '' : '0') + s;
      if (tmp <= 0 ) {
        alert('Hết thời gian làm bài !');
        $('#bt_submmit_fake').click();
        location.href = "result.php";
      }
      tmp != 0 || (tmp = time);

    }, 1000);
  }
  function check_input(input) {
    var id = 'b_' + $(input).parent().parent().parent().attr('id');
    $('#' + id).css("background-color", "green");
  }
</script>
<?php
    require_once __DIR__.'/../layouts/footer.php';
?>