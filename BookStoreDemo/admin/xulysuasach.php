<?php
    if(
        !empty($_POST['ten_sach']) and
        !empty($_POST['gia_sach']) and
        !empty($_POST['so_luong']) and
        !empty($_POST['mo_ta'])
    ){
        include("../connect.php");
		include("../database/db.php");
		include("../database/config.php");
		$db = new Database();
        $maSach=$_POST['ma_sach'];
        $tenSach=$_POST['ten_sach'];
        $giaSach=(int)$_POST['gia_sach'];
        $soLuong=$_POST['so_luong'];
        $moTa=$_POST['mo_ta'];
		
        $sql="UPDATE `books` SET `title`=' $tenSach',`price`=' $giaSach',`available`=' $soLuong',`descri`=' $moTa' WHERE `book_id` =' $maSach';";
		$result = $db->update($sql);
        header('location: danhsachsach.php');
		 }

    else{
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
	
	
?>