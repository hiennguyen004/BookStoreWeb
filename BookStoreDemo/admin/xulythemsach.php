<?php
    if(
        !empty($_POST['ma_sach']) and
        !empty($_POST['ten_sach']) and
        !empty($_POST['gia_sach']) and
        !empty($_POST['so_luong']) and
        !empty($_POST['mo_ta'])
    ){
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file ảnh có hợp lệ không
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File này không phải là ảnh! <br>";
                $uploadOk = 0;
            }
        }

        // Kiểm tra kích thước file
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "File quá lớn <br>";
            $uploadOk = 0;
        }

        // Cho phép các định dạng file ảnh nhất định
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận. <br>";
            $uploadOk = 0;
        }
        

        #Trường hợp không thành công
        if($uploadOk == 0){
            echo "Upload ảnh không thành công!";
        }
        else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                include("../connect.php");
				include("../database/config.php");
				include("../database/db.php");
                $maSach=$_POST['ma_sach'];
                $tenSach=$_POST['ten_sach'];
                $giaSach=(int)$_POST['gia_sach'];
                $soLuong=$_POST['so_luong'];
                $moTa=$_POST['mo_ta'];
                $image_path = $target_file;
                $sql = "INSERT INTO `books`
                (`book_id`, `title`, `price`, `available`, `descri`, `book_cover`) VALUES 
                ('$maSach','$tenSach',$giaSach,'$soLuong','$moTa', '$image_path')";
                $db = new Database;
				$res = $db ->insert($sql);
                header('location: danhsachsach.php');
            }
        }
    }
    else{
        echo "vui nhập lại thông tin sản phẩm";
    }


?>