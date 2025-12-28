<?php
    include('../connect.php');
	include('../database/config.php');
	include('../database/db.php');
    session_start();
	$db = new Database;
    $userName = $_SESSION["tendangnhap"];
    $old_Pass = $_POST['oldpass'];
    $new_Pass = $_POST['newpass'];
    $sql="SELECT * FROM users WHERE username='$userName';";
    $result = $db ->select($sql);
    $user = mysqli_fetch_assoc($result);
    $check = $user['password'];
    if( $old_Pass == $check ){
        $sql = "UPDATE `users` SET `password`='$new_Pass' WHERE username ='$userName';";
		$res = $db ->update($sql);
        if($res){
        header('location: taikhoan.php');
    }
    else{
        echo "ĐỔI MẬT KHẨU THẤT BẠI VÌ SAI MẬT KHẨU CŨ";
    }
	}
?>