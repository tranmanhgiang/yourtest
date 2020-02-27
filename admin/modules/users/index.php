<?php 
    $open = 'users';
    require_once __DIR__.'/../../autoloads/autoload.php';
    require_once __DIR__.'/../../layouts/header.php';
    $temp = $db->countQuestions('users','1');
    $total = $temp['count'];

    if(isset($_GET['p'])){
      $p = $_GET['p'];;
    }else{
        $p = 1;
    }
    $sql = "SELECT * FROM users WHERE 1";
    $row = 5;
    $list_users = $db->fetchJones("users",$sql,$total,$p,$row,true);
    $numberPage = $list_users['page'];    
    unset($list_users['page']);
    $path = $_SERVER['SCRIPT_NAME'];

?>
<div class="container-fluid">
    <table class="table table-hover">
    <p><b>Tổng số người dùng: <?php echo $total; ?></b></p>
    <a href="add.php" class = "btn btn-success">Thêm mới</a>
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Email</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
    <tbody>
        <?php $stt=($p-1)*$row+1; foreach($list_users as $item): ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $item['u_firstName'].' '.$item['u_lastName']; ?></td>
                <td><?php echo ($item['u_role'] == 1 ? 'Admin' : 'Thành viên'); ?></td>
                <td><?php echo $item['u_email']; ?></td>
                <td>
                    <img src="<?php echo  base_url(); ?>/public/uploads/avt/<?php echo $item['thunbar'] ?>" width = "50px" height = "50px">
                </td>
                <td>
                    <a class = "btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['u_id']; ?>" ><i class = "fa fa-times"></i> Xóa</a>
                <td>
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
        <!-- /.container-fluid -->

    </div>

<?php require_once __DIR__.'/../../layouts/footer.php'; ?>