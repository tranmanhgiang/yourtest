<?php 
  require_once __DIR__.'/../autoloads/autoload.php';
  require_once __DIR__.'/../layouts/header.php';
  if(!$_SESSION['u_id']){
    echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
  }
?>

<script src = "../public/js/jquery/jquery-2.2.4.min.js"></script>
<script src = "../public/front-end/js/addTest.js"></script>
<br>

<?php 
  $get_lv1 = $db->fetchID("questions","q_linhvuc"," u_id = '".$_SESSION['u_id']."' " );
  $get_lv2 = $db->fetchID("questions","q_linhvuc"," u_id = '".$_SESSION['u_id']."' " );
  $get_ques = $db->fetchOne1("questions","answers","questions.q_content , questions.q_type , questions.q_level , questions.q_linhvuc , questions.q_id","questions.q_id = answers.q_id"," questions.u_id = '".$_SESSION['u_id']."' " );
  $u_id = $_SESSION['u_id'];
  $id_test = $db->fetchOne("tests","u_id = $u_id ORDER BY t_id DESC ");
  $id = intval(getInput('ques'));
    $data = [
        't_id' => $id_test['t_id'],
        'q_id' => $id
    ];
    if($data['q_id'] != 0){
      $insert_ques = $db->insert("tests_questions",$data);
      if($insert_ques > 0){
        $_SESSION['success'] = "Thêm thành công";
      }
    }


    // $check = $db->fetchAll("tests_questions","t_id = $id_test");
?>

<!-- create question -->
<?php 
    require_once __DIR__.'/../notification/notification.php';
?>
<div class="container">
    <div class="row">
    
      
      
      <div class="col-md-12" id="right-layer">
        <div class="tab">
          <div class="row">
            <button type="button" class="tablinks col-md-6" onclick="openTab(event, 'handwork')">Thêm thủ công</button>
            <button type="button" class="tablinks col-md-6" onclick="openTab(event, 'automatic')">Thêm tự động</button>
          </div>
        </div>

        <div class="tabcontent" id="handwork">
          <div id="find-box-handwork">
            <div>
              <label>Lĩnh vực: </label><select id="theloai_select" onchange="find()">
                <option value="">Choose...</option>
                <?php while($row = $get_lv1->fetch_row()):?>
                    <option value="<?php $row[0]; ?>"><?php echo $row[0]; ?></option>
                <?php endwhile ;?>
              </select>
            </div>
            <div>
              <label>Độ khó: </label><select id="dokho_select" onchange="find()">
                <option value="">Choose...</option>
                <option value="de">Dễ</option>
                <option value="tb">Trung bình</option>
                <option value="kho">Khó</option>
              </select>
            </div>
          </div>
          <!-- Question selector box -->
          <div>
          <?php $stt = 1; foreach($get_ques as $item): ?>
            <div class="question-box">
              <div>
                <a class = "button-add" href="addTest.php?ques=<?php echo $item['q_id'] ?>">Thêm</a>
                
                <button type="button" class="button-type" style="float: right"><?php echo $item['q_level']; ?></button>
                <button type="button" class="button-sub"
                  style="float: right; margin-right: 5px;"><?php echo $item['q_linhvuc']; ?>
                </button>
                
              </div>
              <p id="id" name = "ans[]" style="display: none"><?php echo $item['q_id'];?></p>
              <div class="question"><b>Câu <?php echo $stt; ?>: </b><?php echo $item['q_content'] ?>
              </div>
              <div class="answer-box">
                <div class="row">
                
                  <?php if($item['q_type'] == 1): ?>
                    <div class="col-md-6">
                      <label name="answer-info"> <input type="radio" name = "ans_type1<?php echo $stt ?>"> <label class="STT">A.</label>Đúng</label>
                    </div>
                    <div class="col-md-6">
                      <label name="answer-info"> <input type="radio" name = "ans_type1<?php echo $stt ?>"> <label class="STT">B.</label>Sai</label>
                    </div>

                  <?php elseif($item['q_type'] == 2): ?>
                    <?php $get_ans = $db->fetchJoin("questions","answers","questions.q_id = answers.q_id"," questions.u_id = '".$_SESSION['u_id']."' AND questions.q_content = '".$item['q_content']."' " ); ?>
                    <?php $i = 0; foreach($get_ans as $ele): ?>
                    <div class="col-md-6">
                      <label name="answer-info"> <input type="radio" name = "ans_type2<?php echo $stt ?>"> <label class="STT"><?php echo chr(($i++)+ 65).'. ' .$ele['a_data'] ?></label>
                    </div>
                    <?php endforeach; ?>
                  <?php elseif($item['q_type'] == 3): ?>
                    <?php $get_ans = $db->fetchJoin("questions","answers","questions.q_id = answers.q_id"," questions.u_id = '".$_SESSION['u_id']."' AND questions.q_content = '".$item['q_content']."' " ); ?>
                    <?php $i = 0; foreach($get_ans as $ele): ?>
                  <div class="col-md-6">
                    <label name="answer-info"> <input type="checkbox"> <label class="STT"><?php echo chr(($i++)+ 65).'. ' .$ele['a_data'] ?></label>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php $stt++ ;endforeach; ?>
          </div>      
        </div>
        
        <div class="tabcontent" id="automatic">
          <div id="find-box-automatic">
            <div>
              <label>Lĩnh vực: </label><select id="theloai_auto" onchange="find()">
                <option value="">Choose...</option>
                <?php while($row = $get_lv2->fetch_row()):?>
                    <option value="<?php $row[0]; ?>"><?php echo $row[0]; ?></option>
                <?php endwhile ;?>
              </select>
            </div>
            <div>
              <label>Độ khó: </label><select id="dokho_auto" onchange="find()">
                <option value="">Choose...</option>
                <option value="de">Dễ</option>
                <option value="tb">Trung bình</option>
                <option value="kho">Khó</option>
              </select>
            </div>
            <div>
              <label>Số câu hỏi: </label>
              <input type="number" name="time_auto" id="n_auto">
            </div>
            <button class="btn btn-success" onclick="auto_add()" type="button" style="cursor: pointer;">Thêm câu
              hỏi</button>
          </div>
        </div>
      </div>
    </div>
    
</div>
<br>
        

<script type="text/javascript">
  function find() {
    $('#handwork .question-box').show();
    var theloai = $(theloai_select).children("option:selected").val();
    var dokho = $(dokho_select).children("option:selected").val();
    if (theloai == dokho) {
      $('#handwork .question-box').show();
    } else {
      if (theloai == "") {
        var button_type = $("#handwork .question-box .button-type");
        button_type.each(function (index, butt) {
          if ($(butt).text() != dokho) $(butt).parent().parent().hide();
        });
      } else if (dokho == "") {
        var button_diff = $("#handwork .question-box .button-sub");
        button_diff.each(function (index, butt) {
          if ($(butt).text() != theloai) $(butt).parent().parent().hide();
        });
      } else {
        var button_type = $("#handwork .question-box .button-type");
        var button_diff = $("#handwork .question-box .button-sub");
        button_diff.each(function (index, butt) {
          if ($(button_diff[index]).text() != theloai || $(button_type[index]).text() != dokho) $(butt).parent().parent().hide();
        });
      }
    }
  }

  function get_id(){
    var ID = $('#left-layer .question-box #id');
    ID.each(function(){
      return (($this).text());
    })
  }

  function auto_add() {
    var num = $('#n_auto').val();
    var lv = $('#theloai_auto').val();
    var dk = $('#dokho_auto').val();
    if (num && lv != '' && dk != '') {
      var blv_ques = $('#handwork .question-box .button-sub');
      var bdk_ques = $('#handwork .question-box .button-type');
      var correct_ques = [];
      blv_ques.each(function (i, que) {
        if ($(que).html() == lv && $(bdk_ques[i]).html() == dk) {
          correct_ques.push($(que).parent().parent());
        }
      })
      if (correct_ques.length < num) {
        alert('Không đủ ' + num + ' câu hỏi.Thêm ' + correct_ques.length + ' câu hỏi !');
        correct_ques.forEach(function (q, i) {
          $('.button-add', $(q)).click();
        })
      }
      else {
        let rand_num;
        let selected = [];
        for (let i = 0; i < num; i++) {
          while (1) {
            rand_num = Math.floor(Math.random() * correct_ques.length);
            if (selected.indexOf(rand_num) == -1) break;
          }         
          selected.push(rand_num);
          $('.button-add', $(correct_ques[rand_num])).click();
        }
      }
    } else {
      alert('Hãy lựa chọn lĩnh vực, độ khó và số câu hỏi');
    }
  }

  
</script>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>