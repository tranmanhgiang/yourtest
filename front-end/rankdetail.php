<?php 
  require_once __DIR__.'/../autoloads/autoload.php';
  require_once __DIR__.'/../layouts/header.php';
  if(!$_SESSION['u_id']){
    echo "<script>alert('bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='login.php'</script>";
  }
  $id = intval(getInput('id'));
  $get_rank = $db->fetchJoin("do_test dt","users u","dt.u_id = u.u_id","dt.t_id = $id ORDER BY dt.mark DESC");
?>

<div class="container">
<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Hạng</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Avatar</th>
            <th scope="col">Điểm</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 1; foreach($get_rank as $item): ?>
                <tr style = 'background-color: <?php echo ($item['u_id'] == $_SESSION['u_id']) ? '#5cb85c': '' ?>' >
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $item['u_firstName']. ' ' .$item['u_lastName']; ?></td>
                    <td>
                      <img src="../public/uploads/avt/<?php echo $item['thunbar'] ?>" width = "50px" height = "50px">
                    </td>
                    <td><?php echo $item['mark']; ?></td>
                </tr>
        <?php $stt++; endforeach;?>
        </tbody>
    </table>
</div>


<?php require_once __DIR__.'/../layouts/footer.php'; ?>