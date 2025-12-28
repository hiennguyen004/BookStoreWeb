<?php
    include("header_admin.php");
    include("nav_admin.php");
	include("../database/db.php");
	include("../database/config.php");
	session_start();
    // Kiểm tra nếu session tên đăng nhập không tồn tại hoặc không phải là admin
    if (!isset($_SESSION["tendangnhap"]) || $_SESSION["tendangnhap"] != 'admin') {
        // Chuyển hướng ngay lập tức về trang đăng nhập của người dùng
        header('location: ../user/login.php');
        exit(); // Dừng thực thi các mã bên dưới
    }
?>
    <?php
		$db = new Database();
        $maSach = $_GET['id'];
        $sql="select * from books where book_id='$maSach';";
		$result = $db->select($sql);
        $sanPham = mysqli_fetch_assoc($result);
    ?>
    <form action="xulysuasach.php" method="post" enctype="multipart/form-data>
        <label for="">Nhập mã sách</label><br>
        <input type="text" name="ma_sach" id=""  value="<?php echo $sanPham['book_id'];?>"  > <br>

        <label for="">Nhập tên sách</label><br>
        <input type="text" name="ten_sach" id=""  value="<?php echo $sanPham['title'];?>"> <br>

        <label for="">Nhập vào giá</label><br>
        <input type="number" name="gia_sach" value="<?php echo $sanPham['price'];?>" min ="5"> <br>

        <label for="">Nhập số lượng</label><br>
        <input type="text" name="so_luong" value="<?php echo $sanPham['available'];?>"> <br>
		
        <label for="">Mô tả</label><br>
        <textarea name="mo_ta" id=""   style ="min-width: 400px;min-height : 100px"><?php echo $sanPham['descri'];?></textarea>
        <br>
        <img width ="200" height = "300" src="<?php echo $sanPham['book_cover']?>" alt="" width='50%'>
        <br>
        <br>
        <input type="submit" value="Sửa thông tin sản phẩm" class="submit">
    </form>
<?php
    include("footer_admin.php");
?>