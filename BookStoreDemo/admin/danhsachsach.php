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
<p>Sắp xếp theo</p>
<ul>
    <li><a href="danhsachsach.php?id=0">Mặc định</a></li>
    <li><a href="danhsachsach.php?id=1">Bé đến lớn</a></li>
    <li><a href="danhsachsach.php?id=2">Lớn đến bé</a></li>
    <li><a href="danhsachsach.php?id=3">A-z</a></li>
    <li><a href="danhsachsach.php?id=4">Z-a</a></li>
	<li><a href = "danhsachsach.php?id=5">Tăng dần theo mô tả</a></li>
	
</ul>
    <tr>
        <th>Mã sách</th>
        <th>Hình ảnh</th>
        <th>Tên sách</th>
        <th>Giá bán</th>
        <th>Số lượng</th>
        <th>Mô tả</th>
    </tr>
    <?php
        if(isset($_GET['id'])){
            switch ($_GET["id"]) {
                case '1':
                    $sql = "SELECT * FROM `books` ORDER BY `price` ASC;";
                    break;
                case '2':
                    $sql = "SELECT * FROM `books` ORDER BY `price` DESC;";
                    break;
                case '3':
                    $sql = "SELECT * FROM `books` ORDER BY `title` ASC;";
                    break;
                case '4':
                    $sql = "SELECT * FROM `books` ORDER BY `title` DESC;";
                    break;
				case '5': 
					$sql = "SELECT * FROM `books` ORDER BY `descri` ASC;";
					break;
                default:
                    $sql = 'SELECT * FROM `books`';
                    break;
            }
        }
        else{
            $sql = 'SELECT * FROM `books`';
        }
		$db = new Database();
		$res = $db->select($sql);
        
        while($row = mysqli_fetch_array($res)){
    ?>
    <tr>
        <td>
            <?php
                echo $row["book_id"]; 
            ?>
        </td>
        <td><img src="<?php echo $row['book_cover']?>" alt=""></td>
        
        <td>
            <?php
                echo $row["title"];
            ?>
        </td>

        <td>
            <?php
                echo $row["price"];
            ?>
        </td>

        <td>
            <?php
                echo $row["available"];
            ?>
        </td>
        <td>
            <?php
                echo $row["descri"];
            ?>
        </td>
        <td>
            <a  href="suasach.php?id=<?php echo $row["book_id"]; ?>">Sửa</a> <br>
            <a  href="xulyxoasach.php?id=<?php echo $row["book_id"]; ?>"onclick="return confirm('Bạn có chắc chắn muốn XÓA cuốn sách này không? Thao tác này không thể hoàn tác!');">Xóa</a> <br>
        </td>
    </tr>
    <?php }?>
<?php
    include("footer_admin.php");
?>