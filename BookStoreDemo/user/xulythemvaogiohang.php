<?php
	include("../connect.php");
    include("../database/config.php");
    include("../database/db.php");
    
    $db = new Database;
    session_start();
    
    $userName = $_SESSION["tendangnhap"];
    $maSanPham = $_POST['masach'];
    $soLuong = (int)$_POST['soluong'];
    
   
    $sql_book = "SELECT available FROM books WHERE book_id = '$maSanPham'";
    $book_res = $db->select($sql_book);
    $book_data = $book_res->fetch_assoc();
    $tonKhoHienTai = $book_data['available'];

   
    if ($tonKhoHienTai < $soLuong) {
        echo"Xin lỗi, số lượng sách trong kho không đủ để đáp ứng yêu cầu của bạn!";
		exit;
      
    }

    
    $sql_check = "SELECT * FROM `cart` WHERE `user_name` = '$userName' AND `book_id` = '$maSanPham'";
    $result = $db->select($sql_check);

    if ($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        $soLuongMoi = $row['quantity'] + $soLuong;
        $db->update("UPDATE `cart` SET `quantity`='$soLuongMoi' WHERE `user_name` = '$userName' AND `book_id` = '$maSanPham'");
    } else {
        $db->insert("INSERT INTO `cart`(`user_name`, `book_id`, `quantity`) VALUES ('$userName','$maSanPham','$soLuong')");
    }

  
    $tonKhoMoi = $tonKhoHienTai - $soLuong;
    $db->update("UPDATE books SET available = '$tonKhoMoi' WHERE book_id = '$maSanPham'");

    header('location: cart.php');
?>