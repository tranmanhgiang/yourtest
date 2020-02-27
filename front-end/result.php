<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    require_once __DIR__.'/../layouts/header.php';
    $get_mark = $db->fetchOne("do_test","u_id = '".$_SESSION['u_id']."' ORDER BY do_id DESC ");
    $t_id = $get_mark['t_id'];
    $temp = $db->countQuestions("tests_questions","t_id = $t_id ");
    $total = $temp['count'];
    $a_true = $get_mark['mark']*$total/10;
?>

<div class="container" style = "height: 615px;">
<h3><b>Chúc mừng bạn đã hoàn thành bài thi</b></h3>
<hr style = "width:300px;">
<div>Điểm của bạn là: <?php echo $get_mark['mark']; ?></div>
<div>Số câu đúng: <?php echo $a_true . '/' . $total;?></div>
</div>
<?php require_once __DIR__.'/../layouts/footer.php'; ?>