<?php 
    require_once __DIR__.'/../autoloads/autoload.php';
    $id = intval(getInput('id'));
    $del = $db->delete("questions","q_id = $id");
    if($del > 0){
        echo  "<script>alert('Xóa thành công!'); location.href='profile.php'</script>";
    }else{
         $_SESSION['error'] = "Xóa thất bại";
     }
?>