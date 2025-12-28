<?php
    include("header.php");
    include("nav.php");
    include("../database/config.php");
    include("../database/db.php");

    $db = new Database;
    session_start();

    
    $tenDangNhap = $_SESSION["tendangnhap"];
    $hoVaTen = $_POST['fullName'];
    $soDienthoai = $_POST['telephoneNumber'];
    $diaChiChiTiet = $_POST['address'];

    
    $sql_cart = "SELECT * FROM `cart` WHERE user_name = '$tenDangNhap'";
    $res_cart = $db->select($sql_cart);

    if($res_cart !== false && $res_cart->num_rows > 0){
       
       
        $sql_order_header = "INSERT INTO `order` 
                            (`user_name`, `orderdate`, `status`, `phone_number`, `name`, `address`)
                            VALUES 
                            ('$tenDangNhap', CURRENT_DATE, 'Đang gói hàng', '$soDienthoai', '$hoVaTen', '$diaChiChiTiet')";
        
        $insert_header = $db->insert($sql_order_header);

        if($insert_header) {
            
            $new_order_id = $new_order_id = mysqli_insert_id($db->link); 
            $tongTienDonHang = 0;

           
            mysqli_data_seek($res_cart, 0); 
            
            while($row = mysqli_fetch_array($res_cart)){
                $masach = $row['book_id'];
                $soLuong = (int)$row['quantity'];
                
                
                $query_book = $db->select("SELECT price FROM books WHERE book_id = '$masach'");
                $book_data = mysqli_fetch_assoc($query_book);
                $giaHienTai = $book_data['price'];
                
                $thanhTien = $giaHienTai * $soLuong;
                $tongTienDonHang += $thanhTien;

                $sql_item = "INSERT INTO `order_detail` 
                            (`order_id`, `book_id`, `quantity`, `purchase_price`)
                            VALUES 
                            ('$new_order_id', '$masach', '$soLuong', '$giaHienTai')";
                $db->insert($sql_item);
            }

            
            $db->update("UPDATE `order` SET total_price = '$tongTienDonHang' WHERE order_id = '$new_order_id'");
            $db->delete("DELETE FROM `cart` WHERE user_name = '$tenDangNhap'");
        }
    } 
?>

<style>
.xylydonhang--content {
    text-align: center; 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;  
    margin-top: 50px; 
}
.xylydonhang--content img {
    max-width: 100%;
    height: auto;
}
</style>

<h2 class="xylydonhang--content">
    <img width="500" height="500" src="../img/thanks.jpg" alt="Thank you">
    <p>Đơn hàng sẽ được gửi trong vòng từ 2-10 ngày tùy thuộc vào nơi giao hàng.</p>
    <p>Nếu trong vòng trên 10 ngày chưa nhận được hàng vui lòng liên hệ với chúng tôi qua số điện thoại 095 832 9653.</p>
</h2>

<?php
    include("footer.php");
?>