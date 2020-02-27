<?php 
    $open = 'tests';
    require_once __DIR__.'./../../autoloads/autoload.php';
    $id = intval(getInput('id'));
    $del_test = $db->delete("tests","t_id = $id");
    $del_ques_test = $db->delete("tests_questions","t_id = $id");
    if($del_test > 0 && $del_ques_test > 0){
        echo  "<script>alert('Xóa thành công!'); location.href='index.php'</script>";
    }else{
         $_SESSION['error'] = "Xóa thất bại";
     }
?>