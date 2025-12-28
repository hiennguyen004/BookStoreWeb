<?php
    include("header_admin.php");
    include("nav_admin.php");
	session_start();
    // Kiểm tra nếu session tên đăng nhập không tồn tại hoặc không phải là admin
    if (!isset($_SESSION["tendangnhap"]) || $_SESSION["tendangnhap"] != 'admin') {
        // Chuyển hướng ngay lập tức về trang đăng nhập của người dùng
        header('location: ../user/login.php');
        exit(); // Dừng thực thi các mã bên dưới
    }
?>
    <form action="xulythemsach.php" method="post" enctype="multipart/form-data">
        <label for="">Nhập mã sách</label><br>
        <input type="text" name="ma_sach" id=""> <br>

        <label for="">Nhập tên sách</label><br>
        <input type="text" name="ten_sach" id=""> <br>

        <label for="">Nhập vào giá</label><br>
        <input type="number" name="gia_sach" min = "5"> <br>

        <label for="">Nhập số lượng</label><br>
        <input type="text" name="so_luong"> <br>

        <label for="">Mô tả</label><br>
        <textarea name="mo_ta" id="" style ="min-width: 400px;min-height : 100px"></textarea>
        <br>
        <label>Bìa sách</label> <br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <input type="submit" value="Thêm sản phẩm vào" class="submit">
    </form>
<?php
    include("footer_admin.php");
?>