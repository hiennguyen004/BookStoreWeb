<?php
    include('../connect.php');
	include('../database/config.php'); 
    include('../database/db.php');
	$db = new Database();
    if(
        !empty($_POST['name']) &&
        !empty($_POST['phone_number'])&&
		!empty($_POST['email'])&&
        !empty($_POST['username'])&&
        !empty($_POST['password'])
    ){
        $ten = $_POST["name"];
        $sodienthoai = $_POST["phone_number"];
        $tendangnhap = $_POST["username"];
        $matkhau = $_POST["password"];
		$email = $_POST["email"];
        $sql = "SELECT * FROM users WHERE `username` = '$tendangnhap';";
        $result = $db->select($sql);
        if ($result!==false && $result->num_rows > 0) {
            echo "Tên tài khoản đã có người sử dụng vui lòng sử dụng tên tài khoản khác";
        }
        else{
            $sql = " INSERT INTO `users`
            (`name`, `phone_number`, `username`, `password`, `email`) VALUES 
            ('$ten','$sodienthoai','$tendangnhap','$matkhau','$email') " ;
			$insert = $db -> insert($sql);
			if($insert){
            session_start();
            $_SESSION["username"] = $tendangnhap;
            header('location: index.php');
			}else{
				echo "Đăng kí thất bại";
			}
        }
    }else{
        echo "Thiếu thông tin mất rồi";
    }
?>