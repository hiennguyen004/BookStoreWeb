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
	/* Định dạng bảng giỏ hàng */
	table {
		width: 100%;
		border-collapse: collapse; /* Gộp các viền bảng */
		margin-bottom: 20px;
	}

	table th, table td {
		padding: 10px;
		border: 1px solid #ddd;
		text-align: center; /* Căn giữa các ô trong bảng */
	}

	table th {
		background-color: #f1f1f1;
		font-weight: bold;
	}

	/* Định dạng bảng tổng tiền */
	.cart--content--right table {
		margin-top: 20px;
	}

	.cart--content--right th, .cart--content--right td {
		text-align: center; /* Căn giữa nội dung */
		padding: 8px;
	}

	.cart--content--right td {
		font-weight: normal;
	}

	/* Định dạng cho các nút tiếp tục mua sắm và thanh toán */
	.cart--content--right--button a {
		display: inline-block;
		padding: 10px 20px;
		margin-top: 15px;
		background-color: #4CAF50;
		color: white;
		text-decoration: none;
		border-radius: 5px;
		margin-right: 10px;
	}

	.cart--content--right--button a:hover {
		background-color: #45a049;
	}
</style>

    <h1 class="cart">THANH TOÁN SẢN PHẨM</h1>
    <h2 class="cart--content--space">Giỏ hàng của bạn</h2>
    <section class="cart--content">
        <h3 class="cart--content--left">Thông tin giỏ hàng</h3>
        <table>
            <tr>
                <th>Sản phẩm</th>
                <th>Tên Sách</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            <?php
                $username = $_SESSION["tendangnhap"];
                $sql = "SELECT * FROM `cart` JOIN books ON cart.book_id = books.book_id WHERE user_name ='$username';";
                $db = new Database;
                $res = $db ->select($sql);
                $tongSanPham = 0;
                $tongTienSach = 0;
                if ($res !== false) {
                    while($row = mysqli_fetch_array($res)){
                        $tiensach = (int)$row['quantity'] * (int)$row['price'];
                        $tongTienSach += $tiensach;
                        $tongSanPham+=$row['quantity'];
            ?>
            <tr>
                <td><img width="100" height="150" src="../img/<?php echo $row['book_cover'];?>" alt=""></td>
                <td><a href="product2.php?id=<?php echo $row["book_id"]; ?>"><?php echo $row['title'];?></a></td>
                <td><?php echo $row['quantity'];?></td>
                <td><p><?php echo number_format("$tiensach",0,",",".")."vnđ";?></p></td>
                <td><a href="xulyxoadonhang.php?id=<?php echo $row["book_id"]; ?>">X</a></td>
            </tr>
            <?php } ?>
            <?php } ?>
        </table>

        <h3 class="cart--content--right">Tổng tiền giỏ hàng</h3>
        <table>
            <tr>
                <th colspan="2">Tổng tiền giỏ hàng</th>
            </tr>
            <tr>
                <td>Tổng sản phẩm</td>
                <td><?php echo $tongSanPham?></td>
            </tr>
            <tr>
                <td>Tổng tiền sách</td>
                <td><?php echo number_format("$tongTienSach",0,",",".")."vnđ";?></td>
            </tr>
            <tr>
                <td>Tạm tính</td>
                <td><p style="color: black; font-weight: bold;"><?php echo number_format("$tongTienSach",0,",",".")."vnđ";?></p></td>
            </tr>
        </table>

        <h3 class="cart--content--right--button">
            <a href="index.php">Tiếp tục mua sắm</a>
            <a href="delivery.php">Thanh toán</a>
        </h3>
    </section>

<?php
    include("footer.php");
?>
