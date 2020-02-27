<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    require_once __DIR__.'/../layouts/header.php';
    // $get_test = $db->fetchAll("tests",'1');
    if(!$_SESSION['u_id']){
      echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
    }

    $temp = $db->countQuestions("tests",'status = 1');
    $total = $temp['count'];
    if(isset($_GET['p'])){
      $p = $_GET['p'];;
    }else{
        $p = 1;
    }
    $sql = "SELECT * FROM tests WHERE status = 1";
    $row = 5;
    $get_test = $db->fetchJones("tests",$sql,$total,$p,$row,true);
    $numberPage = $get_test['page'];    
    unset($get_test['page']);
    $path = $_SERVER['SCRIPT_NAME'];

?>
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên bài thi</th>
      <th scope="col">Mã bài thi</th>
      <th scope="col">Thời gian làm bài</th>
      <th scope="col">Thời gian đăng bài</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $stt=($p-1)*$row+1; foreach($get_test as $item): ?>
    <tr>
        <th scope="row"><?php echo $stt; ?></th>
        <td><?php echo $item['t_name']; ?></td>
        <td><?php echo $item['t_id'] ?></td>
        <td><?php echo $item['t_time'].' phút'; ?></td>
        <td><?php echo $item['t_timeCreate']; ?></td>
        <td>
            <a class = "btn btn-link" href="rankdetail.php?id=<?php echo $item['t_id']; ?>">Xem xếp hạng >></a>
        </td>
    </tr>
  <?php $stt++; endforeach; ?>
  </tbody>
</table>
  <div class="pull-right">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
      <?php for($i = 1; $i <= $numberPage;$i++) : ?>
        <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a class="page-link" href="<?php echo $path; ?>?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>  
      <?php endfor;?>
      </ul>
    </nav>
  </div>
</div>
<?php require_once __DIR__.'/../layouts/footer.php'; ?>