<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'thuvien_db';

// Kết nối tới cơ sở dữ liệu
$con = mysqli_connect($servername, $username, $password, $db);

// Kiểm tra kết nối
if (mysqli_connect_error()) {
    die("Kết nối thất bại: " . mysqli_connect_error()); // Dừng script và hiển thị lỗi nếu kết nối không thành công
} else {
   // echo "Kết nối thành công đến cơ sở dữ liệu '$db'"; //
}
mysqli_set_charset($con, "utf8");
?>
