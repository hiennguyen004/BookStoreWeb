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
    <tr>
		<th>Mã người dùng</th>
        <th>Tên</th>
		<th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Email</th>
        <th>Số điện thoại</th>
		<th>Xóa người dùng</th>
		
    </tr>
    <?php
		$db = new Database();
        $sql = 'SELECT * FROM `users`';
        $res = $db->select($sql);
        while($row = mysqli_fetch_array($res)){
    ?>
    <tr>
        <td>
            <?php
                echo $row["user_id"];
            ?>
        </td>
        
        <td>
            <?php
                echo $row["name"];
            ?>
        </td>

        <td>
            <?php
                echo $row["username"];
            ?>
        </td>

        <td>
            <?php
                echo $row["password"];
            ?>
        </td>
		
		<td>
			<?php
				echo $row["email"];
			?>
		</td>
		
        <td>
            <?php
                echo $row["phone_number"];
            ?>
        </td>
        <td>
            <a href="xulyxoauser.php?id=<?php echo $row["user_id"]; ?>">Xóa</a>
        </td>
    </tr>
    <?php }?>
<?php
    include("footer_admin.php");
?>

