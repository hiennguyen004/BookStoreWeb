<?php
    include("../database/config.php");
    include("../database/db.php");
    include("../connect.php");
    
    $db = new Database();

    
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id']; 
        
        $sql = "UPDATE `order` SET `status`='Đang vận chuyển' WHERE order_id = $id;";
        $res = $db->update($sql);
        
        if($res){
            header('location:danhsachdonhang.php');
            exit(); 
        } else {
            echo "Cập nhật thất bại!";
        }
    } else {
        echo "Tham số ID không hợp lệ!";
    }
?>