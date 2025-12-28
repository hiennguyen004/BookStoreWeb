
<?php
    include("header.php");
    include("nav.php");
	include("../database/config.php");
	include("../database/db.php");
?>
<?php
    session_start();
    if(!isset($_SESSION["tendangnhap"])){
        header('location: login.php');
    }  
?>
	 <style>
		/* Căn giữa toàn bộ trang */
		body {
			display: flex;
			justify-content: center; /* Căn giữa theo chiều ngang */
			align-items: flex-start; /* Căn giữa theo chiều dọc */
			min-height: 100vh;
			padding: 20px;
			background-color: #f4f4f4;
		}

		/* Căn giữa phần nội dung của trang */
		.content--form,
		.taikhoan--donhang,
		.content--space,
		table {
			width: 50%; /* Giảm chiều rộng */
			margin: 0 auto; /* Căn giữa */
			background-color: white;
			padding: 15px; /* Giảm padding */
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		/* Căn giữa các phần tử Đơn hàng của bạn, Lịch sử mua hàng */
		.taikhoan--donhang, .content--space {
			display: flex;
			flex-direction: column; /* Sắp xếp các phần tử theo chiều dọc */
			align-items: center; /* Căn giữa các phần tử theo chiều ngang */
			justify-content: center; /* Căn giữa theo chiều dọc */
			width: 100%; /* Chiếm hết chiều rộng có sẵn */
			background-color: #f4f4f4; /* Màu nền */
			padding: 15px; /* Padding */
			border-radius: 10px; /* Viền cong */
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
		}

		/* Định dạng tiêu đề Thay đổi mật khẩu - Loại bỏ phần highlight dưới */
		.content--space {
			padding: 0; /* Giảm padding */
			border: none; /* Loại bỏ border nếu có */
			text-align: center; /* Căn giữa nội dung */
			font-size: 18px; /* Giảm kích thước chữ */
		}

		/* Định dạng bảng */
		table {
			width: 100%; /* Đảm bảo bảng chiếm toàn bộ chiều rộng */
			border-collapse: collapse;
			margin-top: 20px;
			text-align: center; /* Căn giữa nội dung bảng */
		}

		table th, table td {
			padding: 8px; /* Giảm padding */
			border: 1px solid #ddd;
		}

		/* Tiêu đề "Xin chào" */
		.taikhoan--account h3 {
			text-align: center;
			font-size: 22px; /* Giảm kích thước chữ tiêu đề */
			margin-bottom: 20px;
		}

		/* Định dạng ô nhập mật khẩu */
		.taikhoan--pass input[type="password"] {
			width: 100%; /* Chiều rộng đầy đủ */
			padding: 8px;
			margin: 5px 0 10px;
			font-size: 14px; /* Giảm kích thước chữ */
			border: 1px solid #ddd;
			border-radius: 4px;
		}

		/* Định dạng nút submit */
		input[type="submit"] {
			display: block;
			width: 100%; /* Nút chiếm toàn bộ chiều rộng */
			padding: 10px; /* Giảm padding */
			font-size: 14px; /* Giảm kích thước chữ */
			margin-top: 15px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			text-align: center;
		}

		/* Hiệu ứng hover cho nút submit */
		input[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
	<div class="taikhoan--account">
		<h3>Xin chào: <?php echo $_SESSION["tendangnhap"];?></h3>
	</div>

	<!-- Form thay đổi mật khẩu -->
	<form action="doimatkhau.php" class="content--form" method="post">
		<div class="content hightlight-content">
			<div class="content--space">
				Thay đổi mật khẩu
			</div>
		</div>
		<div class="taikhoan--pass">
			<div>
				<label for="">Mật khẩu cũ:</label> <br>
				<input type="password" name="oldpass" id="" included>
			</div>
			<div>
				<label for="">Mật khẩu mới:</label> <br>
				<input type="password" name="newpass" id="" included>
			</div>
		</div>
		<div class="taikhoan--submit">
			<input type="submit" value="Đổi mật khẩu">
		</div>
	</form>

	<!-- Đơn hàng của bạn -->
	<div class="content hightlight-content">
		<div class="content--space">
			Đơn hàng của bạn
		</div>
	</div>

	<div class="taikhoan--donhang">
		<table>
			<caption>Danh sách đơn hàng</caption>
			<tr>
				<th>Mã đơn</th>
				<th>Mã hàng</th>
				<th>Tên hàng</th>
				<th>Số lượng</th>
				<th>Tình trạng</th>
				<th>Ngày đặt hàng</th>
				<th>Xác nhận</th>
			</tr>
			<?php
				$userName = $_SESSION["tendangnhap"];
				$db = new Database;
				
				$sql = "SELECT `order`.*, order_detail.*, books.title 
						FROM `order` 
						JOIN `order_detail` ON order.order_id = order_detail.order_id 
						JOIN `books` ON order_detail.book_id = books.book_id 
						WHERE order.user_name = '$userName' AND order.status != 'Đã nhận' 
						ORDER BY order.order_id DESC";
						
				$res = $db->select($sql);
				if ($res !== false) {
					while($row = mysqli_fetch_array($res)) {
			?>
			<tr>
				<td><?php echo $row['order_id']; ?></td>
				<td><?php echo $row['book_id']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td>
					<?php
						$date = date_create($row["orderdate"]);
						echo date_format($date ,"d-m-Y");
					?>
				</td>
				<td>
					<?php if($row['status'] == 'Đang vận chuyển') { ?>
						<a href="xulynhandonhang.php?id=<?php echo $row['order_id'];?>">Xác nhận đã nhận</a>
					<?php } ?>
				</td>
			</tr>
			<?php }} ?>
		</table>
	</div>

	<!-- Lịch sử mua hàng -->
	<div class="content hightlight-content">
		<div class="content--space">
			Lịch sử mua hàng
		</div>
	</div>

	<div class="taikhoan--donhang">
		<table>
			<caption>Lịch sử mua hàng</caption>
			<tr>
				<th>Mã hàng</th>
				<th>Tên hàng</th>
				<th>Số lượng</th>
				<th>Ngày đặt hàng</th>
				<th>Ngày nhận hàng</th>
			</tr>
			<?php
				
				$sql_history = "SELECT `order`.*, order_detail.*, books.title 
								FROM `order` 
								JOIN `order_detail` ON order.order_id = order_detail.order_id 
								JOIN `books` ON order_detail.book_id = books.book_id 
								WHERE order.user_name = '$userName' AND order.status = 'Đã nhận'";
								
				$res_history = $db->select($sql_history);
				if ($res_history !== false) {
					while($row = mysqli_fetch_array($res_history)) {
			?>
			<tr>
				<td><?php echo $row['book_id']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td>
					<?php
						$date = date_create($row["orderdate"]);
						echo date_format($date ,"d-m-Y");
					?>
				</td>
				<td>
					<?php
						
						$date = date_create($row["rcdate"]);
						echo date_format($date ,"d-m-Y");
					?>
				</td>
			</tr>
			<?php }} ?>
		</table>
	</div>

	<?php
		include("footer.php");
	?>