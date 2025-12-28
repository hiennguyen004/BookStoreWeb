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
    /* Cải thiện kiểu bảng thanh toán và đơn hàng */
    .payment-table, .order-summary {
        width: 80%;
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
    }

    .payment-table th, .payment-table td, .order-summary th, .order-summary td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .payment-table caption, .order-summary caption {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
    }

    .payment-table input, .order-summary input {
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        font-size: 16px;
    }

    .order-summary th, .order-summary td {
        text-align: right;  /* Căn phải cho phần tổng tiền */
    }

    .sub {
        padding: 12px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .sub:hover {
        background-color: #45a049;
    }

    /* Định dạng form thông tin thanh toán */
    .delivery--content {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .delivery--content--left, .delivery--content--right {
        width: 48%; /* Chia đều không gian cho hai phần */
    }

    .delivery--content--left table, .delivery--content--right table {
        width: 100%;
    }

    /* Cải thiện kiểu các trường nhập liệu */
    input[type="text"], input[type="tel"] {
        padding: 8px;
        font-size: 16px;
        width: 100%;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    input[type="text"]:focus, input[type="tel"]:focus {
        border-color: #4CAF50;
    }
</style>

<!-- Form Thanh toán -->
<form action="xulydonhang.php" class="delivery--content" method="post">
    <table class="payment-table">
        <caption>Thông tin thanh toán</caption>
        <tr>
            <td colspan="2">
                <label for="fullName">Họ và tên*</label><br>
                <input type="text" name="fullName" id="fullName" placeholder="Nhập họ và tên" style="width: 100%;" included>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="telephoneNumber">Số điện thoại*</label><br>
                <input type="tel" name="telephoneNumber" id="telephoneNumber" placeholder="Nhập số điện thoại" style="width: 100%;" included pattern="[0]{1}[39]{1}[0-9]{8}">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="address">Địa chỉ*</label><br>
                <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" included style="width: 100%;">
            </td>
        </tr>
    </table>

    <table class="order-summary">
        <caption>Đơn hàng của bạn</caption>
        <tr>
            <th>Sản phẩm</th>
            <th>Tạm tính</th>
        </tr>
        <?php
            $db = new Database;
            $username = $_SESSION["tendangnhap"];
            $sql = "SELECT * FROM `cart` JOIN books ON cart.book_id = books.book_id WHERE user_name = '$username' ";
            $res = $db ->select($sql);
            $tongTienHang = 0;
            if ($res !== false) {
                while ($row = mysqli_fetch_array($res)) {
                    $tienhang = (int)$row['quantity'] * (int)$row['price'];
                    $tongTienHang += $tienhang;
        ?>
        <tr>
            <td><?php echo $row['title']." x ".$row['quantity']; ?></td>
            <td><?php echo number_format($tienhang, 0, ",", ".")."vnđ"; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th>Tạm tính</th>
            <th><?php echo number_format($tongTienHang, 0, ",", ".")."vnđ"; ?></th>
        </tr>
        <tr>
            <th>Tổng</th>
            <th><?php echo number_format($tongTienHang, 0, ",", ".")."vnđ"; ?></th>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="sub" value="Đặt hàng"></td>
        </tr>
        <tr>
            <td colspan="2"><i>Lưu ý: Đây chỉ là giá sản phẩm tạm tính chưa bao gồm chi phí ship.</i></td>
        </tr>
        <?php } ?>
    </table>
</form>
<?php
    include("footer.php");
?>
