<?php
    $open = "tests";
    require_once __DIR__.'/../../autoloads/autoload.php';

    $id = intval(getInput('id'));
    $p = intval(getInput('p'));
    $Edittests = $db->fetchOne("tests","t_id = $id");
    

    $status = $Edittests['status'] == 0 ? 1 : 0;
    $update = $db->update("tests",array("status"=>$status),"t_id=$id");
    if($update > 0){
        $_SESSION['success'] = "Cập nhật thành công";
        echo "<script>location.href='index.php'</script>";
    }else{
        // them that bai
         $_SESSION['error'] = "Dữ liệu không thay đổi";
         echo "<script>location.href='index.php'</script>";
     }

?>