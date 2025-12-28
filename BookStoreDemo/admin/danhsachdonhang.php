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
        <th>Mã đơn hàng</th>
        <th>Ngày đặt hàng</th>
        <th>Ngày nhận hàng</th>
        <th>Tên đăng nhập</th>
        <th>Số điện thoại</th>
        <th>Tên sách</th>
		<th>Số lượng</th>
		<th>Tổng giá đơn hàng</th>
        <th>Tình trạng đơn hàng</th>
        <th>Địa chỉ</th>
	</tr>
	<?php
    // Truy vấn JOIN 3 bảng để lấy thông tin chi tiết từng sản phẩm
    $sql = "SELECT `order`.*, `order_detail`.*, books.title 
            FROM `order` 
            JOIN `order_detail` ON `order`.order_id = `order_detail`.order_id 
            JOIN `books` ON `order_detail`.book_id = books.book_id 
            ORDER BY `order`.order_id DESC";
            
    $db = new Database();
    $res = $db->select($sql);
    
    if ($res !== false) {
        while($row = mysqli_fetch_array($res)){
?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td>
            <?php 
                $date = date_create($row['orderdate']);
                echo date_format($date, "d-m-Y"); 
            ?>
        </td>
        <td>
            <?php 
                echo $row['rcdate'] ? date_format(date_create($row['rcdate']), "d-m-Y") : '---'; 
            ?>
        </td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['phone_number']; ?></td>
        
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        
        <td><?php echo number_format($row['total_price'], 0, ',', '.'); ?>đ</td>
        
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['address']; ?></td>
        
        <td>
            <a href="xulyxoadonhang.php?id=<?php echo $row['order_id'];?>" 
               onclick="return confirm('Bạn có chắc muốn xóa toàn bộ đơn hàng này?')">Xóa</a>

            <?php if($row['status'] == "Đang gói hàng"){ ?>
                <br><a href="xulyguidonhang.php?id=<?php echo $row['order_id'];?>">Giao hàng</a>
            
            <?php } ?>
        </td>
    </tr>
<?php 
        }
    } 
?>